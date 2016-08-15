<?php
class Category{
    // Получает ид категории из ключа(транслита)
    public static function getCategoriesId($categoryNameKey){
        $db = Db::getConnection();
        $a=$db->prepare('SELECT `id` FROM `category` WHERE `name_key` = ? LIMIT 1');
        $a->execute(array($categoryNameKey));
        $categoryId=$a->fetchAll();
        return $categoryId[0]['id'];
    }
    // Получает категорию по ид
    public static function getCategoryTitleById($id){
        $db = Db::getConnection();
        $a=$db->prepare('SELECT `title` FROM `category` WHERE `id` = ? LIMIT 1');
        $a->execute(array($id));
        $categoryId=$a->fetchAll();
        return $categoryId[0]['title'];
    }
    
    // Получает имя категории по ид
    public static function getCategoryNameById($id){
        $db = Db::getConnection();
        $a=$db->prepare('SELECT `name` FROM `category` WHERE `id` = ? LIMIT 1');
        $a->execute(array($id));
        $categoryId=$a->fetchAll();
        return $categoryId[0]['name'];
    }
    public static function getCategoriesList(){
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, name_key, title, description FROM category WHERE status = "1" ORDER BY sort_order, name ASC');
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['name_key'] = $row['name_key'];
            $categoryList[$i]['title'] = $row['title'];
            $categoryList[$i]['description'] = $row['description'];
            $i++;
        }
        return $categoryList;
    }
    public static function getCategoriesListAdmin(){
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, sort_order, status, name_key FROM category ORDER BY sort_order ASC');
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $categoryList[$i]['name_key'] = $row['name_key'];
            $i++;
        }
        return $categoryList;
    }
    public static function deleteCategoryById($id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function updateCategoryById($id, $name, $sortOrder, $status){
        $db = Db::getConnection();
        $sql = "UPDATE category SET name = :name,sort_order = :sort_order,status = :status WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getCategoryById($id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    public static function getStatusText($status){
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }
    public static function createCategory($name, $sortOrder, $status, $name_key){
        $db = Db::getConnection();
        $sql = 'INSERT INTO category (name, sort_order, status, name_key) VALUES (:name, :sort_order, :status, :name_key)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':name_key', $name_key, PDO::PARAM_INT);
        return $result->execute();
    }
    
    /*
     * Возвращает параметры категорий
     */
    public static function getCategoryParams($qqq = "name"){
        $url=$_SERVER["REQUEST_URI"];
        $url_check=substr($url,-1);
        if($url_check=="/")
        {
            $url=substr($url,0,-1);
        }
        $str=substr(strrchr($url,'/'),1);
        if($qqq == "name"){
            foreach (Category::getCategoriesList() as $categoryItem){
                if($categoryItem['name_key'] == $str){
                    return $categoryItem['name'];
                }
            }
        }
        if($qqq == "description"){
            foreach (Category::getCategoriesList() as $categoryItem){
                if($categoryItem['name_key'] == $str){
                    return $categoryItem['description'];
                }
            }
        }
        return false;
    }
}