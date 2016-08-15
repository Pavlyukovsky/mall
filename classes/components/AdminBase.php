<?php
abstract class AdminBase{
    /*
     * Проверка на первый уровень админа
     */
    public static function checkAdmin(){
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if ($user['role'] > 0) {
            return true;
        }
        die('Access denied');
    }
    /*
     * Проверка на супер админа
     */
    public static function checkSuperAdmin(){
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if ($user['role'] > 1) {
            return true;
        }
        die('Access denied');
    }
    /*
     * Проверка на супер админа
     */
    public static function isSuperAdmin(){
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if ($user['role'] > 1) {
            return true;
        }
        return false;
    }
}