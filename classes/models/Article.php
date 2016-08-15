<?php
class Article{
    const SHOW_BY_DEFAULT = 3;
    const SHOW_BY_DEFAULT_ADMIN = 20;
    
    public static function getArticlesList($page = 1){
        $limit = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $sql = 'SELECT id, name, name_key, description, description_article, date FROM article WHERE status = 1 ORDER BY id DESC LIMIT :limit OFFSET :offset';
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['name_key'] = $row['name_key'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['description_article'] = $row['description_article'];
            $productsList[$i]['date'] = $row['date'];
            $i++;
        }        
        return $productsList;
    }
    
    public static function getArticlesListAdmin($page = 1){
        $limit = self::SHOW_BY_DEFAULT_ADMIN;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_ADMIN;
        $db = Db::getConnection();
        $sql = 'SELECT id, name FROM article ORDER BY id ASC LIMIT :limit OFFSET :offset';
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $i++;
        }
        return $productsList;
    }
    
    // Получает ид товара из ключа(транслита)
    public static function getArticleId($articleNameKey){
        $db = Db::getConnection();
        $a=$db->prepare('SELECT `id` FROM `article` WHERE `name_key` = ? LIMIT 1');
        $a->execute(array($articleNameKey));
        $categoryId=$a->fetchAll();
        return $categoryId[0]['id'];
    }
    public static function getArticleById($id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM article WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    public static function getTotalArticles(){
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM article';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getTotalArticlesAdmin(){
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM article';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
    public static function deleteArticleById($id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM article WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function updateArticleById($id, $options){
        $db = Db::getConnection();
        $sql = "UPDATE article SET name = :name, description = :description, description_article = :description_article, "
                . "ingredients_article = :ingredients_article, name_key = :name_key, status = :status WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':description_article', $options['description_article'], PDO::PARAM_STR);
        $result->bindParam(':ingredients_article', $options['ingredients_article'], PDO::PARAM_STR);
        $result->bindParam(':name_key', $options['name_key'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_STR);
        return $result->execute();
    }
    public static function createArticle($options){
        $db = Db::getConnection();
        $sql = 'INSERT INTO article ( name, name_key, description, description_article, ingredients_article, status )'
                         . ' VALUES ( :name, :name_key, :description, :description_article, :ingredients_article, :status )';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':name_key', $options['name_key'], PDO::PARAM_STR);     
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':description_article', $options['description_article'], PDO::PARAM_STR);
        $result->bindParam(':ingredients_article', $options['ingredients_article'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);   
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
    public static function getImage($id){
        $noImage = 'no-image.jpg';
        $path = '/upload/images/articles/';
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}