<?php
class Order{
    public static function save($userName, $userEmail, $userPhone, $userAddress, $userComment, $userId, $products, $userTotalPrice, $delivery_status, $userTotalProfit, $userTotalProcent, $ip){
        $db = Db::getConnection();
        $sql = 'INSERT INTO product_order (user_name, user_email, user_phone, user_address, user_comment, user_id, products, user_total_price,'
                . ' delivery_status, userTotalProfit, userTotalProcent, ip) '
                . 'VALUES (:user_name, :user_email, :user_phone, :user_address, :user_comment, :user_id, :products, :user_total_price,'
                . ' :delivery_status, :userTotalProfit, :userTotalProcent, :ip)';
        $products = json_encode($products);
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);        
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_address', $userAddress, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        $result->bindParam(':user_total_price', $userTotalPrice, PDO::PARAM_STR);
        $result->bindParam(':delivery_status', $delivery_status, PDO::PARAM_STR);
        $result->bindParam(':userTotalProfit', $userTotalProfit, PDO::PARAM_STR);
        $result->bindParam(':userTotalProcent', $userTotalProcent, PDO::PARAM_STR);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function getOrdersList(){
        $db = Db::getConnection();
        $result = $db->query('SELECT id, user_name, user_email, user_phone, user_address, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_email'] = $row['user_email'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['user_address'] = $row['user_address'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }
    public static function getStatusText($status){
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Доставлен';
                break;
            case '5':
                return 'Возврат товара';
                break;
            case '6':
                return 'Спам';
                break;
            case '7':
                return 'Закрыт';
                break;
        }
    }
    public static function getOrderById($id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM product_order WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    public static function deleteOrderById($id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM product_order WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function updateOrderById($id, $userName, $userEmail, $userPhone, $userAddress, $userComment, $date, $status){
        $db = Db::getConnection();
        $sql = "UPDATE product_order SET user_name = :user_name,user_email = :user_email,user_phone = :user_phone,user_address = :user_address, user_comment = :user_comment,date = :date,status = :status WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_address', $userAddress, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}