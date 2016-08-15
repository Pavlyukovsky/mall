<?php
class User{
    public static function register($name, $email, $password, $phone, $ip, $user_key){
        $db = Db::getConnection();
        $sql = 'INSERT INTO user (name, email, password, phone, ip, user_key) VALUES (:name, :email, :password, :phone, :ip, :user_key)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);
        $result->bindParam(':user_key', $user_key, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function edit($id, $name, $password){
        $db = Db::getConnection();
        $sql = "UPDATE user SET name = :name, password = :password WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function checkUserData($email, $password){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }
    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }
    public static function checkLogged(){
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }
    public static function isGuest(){
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    public static function checkName($name){
        if (strlen($name) >= 4) {
            return true;
        }
        return false;
    }
    public static function checkPhone($phone){
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }
    public static function checkPassword($password){
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    public static function checkPasswordAgain($password, $password_again){
        if ($password == $password_again) {
            return true;
        }
        return false;
    }
    public static function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public static function checkRadioButton($delivery_status){
        if (!empty($delivery_status)) {
            return true;
        }
        return false;
    }
    public static function checkEmailExists($email){  
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }
    public static function getUserById($id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
}