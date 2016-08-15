<?php
class UserController{
    public function actionRegister(){
        $name = false;
        $email = false;
        $password = false;
        $password_again = false;
        $phone = false;
        $ip = false;
        $result = false;
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_again = $_POST['password_again'];
            $phone = $_POST['phone'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $user_key = md5( date('dmYhis') . $name . $password );
            $errors = false;
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 4-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (!User::checkPasswordAgain($password, $password_again)) {
                $errors[] = 'Пароли не совпадаю';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if ($errors == false){
                $result = User::register($name, $email, md5(md5(trim($password))), $phone, $ip, $user_key);
                if($result == 1){
                    // $info = array('username' => $name,'email' => $email,'key' => $user_key);
                    // if(send_email($info)){
                    //     $result = TRUE;
                    // }
                }
            }
        }
        require_once(ROOT.'/views/user/register.php');
        return true;
    }
    public function actionLogin(){
        $email = false;
        $password = false;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            $userId = User::checkUserData($email, md5(md5(trim($password))));
            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);
                header("Location: /cabinet");
            }
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }
    public function actionLogout(){
        unset($_SESSION["user"]);
        header("Location: /");
    }
}