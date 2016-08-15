<?php

class Translit
{
    /*
    * Рандомный проствикс
    */
   protected static function random($length)
    {
        $characters='0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength=strlen($characters);
        $randomString='';
        for($i=0;$i<$length;$i++)
        {
            $randomString.=$characters[rand(0,$charactersLength-1)];
        }
        return$randomString;
    }
    /*
    * Возвращает хеш-имени(name_key).
    */
    public static function returnToHash($Name, $NumRandom = 0)
    {
        $text=$Name;//Получаем текст
        $text=preg_replace("/[^a-z а-ё-я]+/ui","",$text); // Обрезает всё кроме букв
        $textlength=strlen($text); // Количество символов в тексте
        if($textlength>60)  // Обрезает если длина больше 60 символов
        {
                $text=mb_substr($text,0,60,'UTF-8');
        }
        $text=mb_strtolower($text,'UTF-8');  // Переводит в Нижний индекс
        // Замена букв
        $plugin_translit = array("а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"yo","ж"=>"sh","з"=>"z","и"=>"i","й"=>"i","к"=>"k","л"=>"l","м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"x","ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"sh","ъ"=>"","ы"=>"i","ь"=>"","э"=>"e","ю"=>"u","я"=>"ya"," "=>"-"); 
        foreach($plugin_translit as$arr=>$val)
        {
                $text=str_replace($arr,$val,$text);
        } 
        if($NumRandom == 0)
            return $text;
        return $text."-".self::random($NumRandom);
    }
    /*
    * Возвращает, все продукты из Product.
    */
    protected static function getProducts()
    {  
        $db = Db::getConnection();
        $sql = 'SELECT id, name, name_key FROM product WHERE status = "1" ORDER BY id';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $i = 0;
        $productName = array();
        while ($row = $result->fetch()) {
            $productName[$i]['id'] = $row['id'];
            $productName[$i]['name'] = $row['name'];
            $productName[$i]['name_key'] = $row['name_key'];
            $i++;
        }
        return $productName;
    }
    /*
    * Функция заменяет данные в базе данных.
    */
    protected static function updateProductById($id, $name_key)
    {  
        $db = Db::getConnection();  // Подключение к БД.
        $sql = "UPDATE product SET name_key = :name_key WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name_key', $name_key, PDO::PARAM_STR);
        return $result->execute();
    }
    /*
    * Изменяет данные в Product. Поле (name_key)
    */
    public static function ChangeDate($HashCount = 0)
    {	
        $productNames =  array();
        $productNames = self::getProducts();   // Получаем масив данных из Product.
        foreach ($productNames as $key => $value) {
                $name_key = self::returnToHash($value["name"], $HashCount);   // Вызываем функцию хеширования. C хешом в 3 символа.
                self::updateProductById($value["id"], $name_key); // Вызывает функцию по замене данных.
        }
    }
}