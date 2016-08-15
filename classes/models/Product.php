<?php
class Product{
    const SHOW_BY_DEFAULT = 15;
    const SHOW_BY_DEFAULT_ADMIN = 50;
    
    public static function getProductsList($page = 1){
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $sql = 'SELECT id, name, name_key, price, brand, description, is_new FROM product WHERE status = 1 ORDER BY id DESC LIMIT :limit OFFSET :offset';
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
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['brand'] = $row['brand'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }        
        return $productsList;
    }
    public static $qqqq;

    public static function getSearchProductsList($page = 1){
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        // Начало. Отладка база с переходом по навигации.
        $querys = "";
        if(!empty($_POST['q']))
        {
            $querys = $_POST['q'];
        }
        if($page == 1)
            $_SESSION['q'] = $querys;
        else
            $querys = $_SESSION['q'];
        // Конец. Отладка база с переходом по навигации.
        $sql = 'SELECT id, name, name_key, price, brand, description, is_new FROM product WHERE status = 1 AND name LIKE "%' . $querys . '%" OR status = 1 AND brand LIKE "%' . $querys . '%" OR status = 1 AND description LIKE "%' . $querys . '%" ORDER BY id DESC LIMIT :limit OFFSET :offset';
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
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['brand'] = $row['brand'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        
        return $productsList;
    }
    public static function getProductsListAdmin($page = 1){
        $limit = Product::SHOW_BY_DEFAULT_ADMIN;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_ADMIN;
        $db = Db::getConnection();
        $sql = 'SELECT id, name, price, code FROM product ORDER BY id ASC LIMIT :limit OFFSET :offset';
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
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }
    public static function getProductsListByCategory($categoryId, $page = 1){
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $sql='SELECT id, name, name_key, price, brand, description, is_new FROM product WHERE status = 1 AND category_id = :category_id ORDER BY id ASC LIMIT :limit OFFSET :offset';
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['name_key'] = $row['name_key'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['brand'] = $row['brand'];
            $products[$i]['description'] = $row['description'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $products;
    }
    // Получает ид товара из ключа(транслита)
    public static function getProductId($productNameKey){
        $db = Db::getConnection();
        $a=$db->prepare('SELECT `id` FROM `product` WHERE `name_key` = ? LIMIT 1');
        $a->execute(array($productNameKey));
        $categoryId=$a->fetchAll();
        return $categoryId[0]['id'];
    }
    public static function getProductById($id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM product WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    public static function getTotalProductsInCategory($categoryId){
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getTotalSearchProducts($page = 1){
        $db = Db::getConnection();
        // Начало. Отладка база с переходом по навигации.
        $querys = "";
        if(!empty($_POST['q']))
        {
            $querys = $_POST['q'];
        }
        if($page == 1)
            $_SESSION['q_total'] = $querys;
        else
            $querys = $_SESSION['q_total'];
        // Конец. Отладка база с переходом по навигации.
        $sql = 'SELECT count(id) AS count FROM product WHERE status = 1 AND name LIKE "%'.$querys.'%" OR status = 1 AND brand LIKE "%'.$querys.'%" OR status = 1 AND description LIKE "%'.$querys.'%" ';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getTotalProducts(){
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1"';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getTotalProductsAdmin(){
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM product';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getProdustsByIds($idsArray){
        $db = Db::getConnection();
        $idsString = implode(',', $idsArray);
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['start_price'] = $row['start_price'];
            $i++;
        }
        return $products;
    }
    public static function getRecommendedProducts(){
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, name_key, price, is_new FROM product WHERE status = "1" AND is_recommended = "1" ORDER BY id DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['name_key'] = $row['name_key'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }
    public static function deleteProductById($id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM product WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function updateProductById($id, $options){
        $db = Db::getConnection();
        $sql = "UPDATE product SET name = :name,code = :code,price = :price,category_id = :category_id,brand = :brand,availability = :availability, description = :description,is_new = :is_new,is_recommended = :is_recommended,status = :status, name_key = :name_key WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':name_key', $options['name_key'], PDO::PARAM_STR);
        return $result->execute();
    }
    public static function createProduct($options){
        $db = Db::getConnection();
        $sql = 'INSERT INTO product (name, code, price, category_id, brand, availability,description, is_new, is_recommended, status, name_key) VALUES (:name, :code, :price, :category_id, :brand, :availability,:description, :is_new, :is_recommended, :status, :name_key)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':name_key', $options['name_key'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
    public static function getAvailabilityText($availability){
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }
    public static function getImage($id){
        $noImage = 'no-image.jpg';
        $path = '/upload/images/products/';
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}