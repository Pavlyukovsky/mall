<?php
class SiteController{
    public function actionIndex($page = 1){
        $sliderProducts = Product::getRecommendedProducts();
        $categories = Category::getCategoriesList();
        $latestProducts = Product::getProductsList($page);
        $total = Product::getTotalProducts();
        if(!($total < Product::SHOW_BY_DEFAULT+1))
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT.'/views/site/index.php');
        return true;
    }
    public function actionContact(){
        $userEmail = false;
        $userText = false;
        $result = false;
        if (isset($_POST['submit'])){
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            $errors = false;
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false){
                $adminEmail = 'php.start@mail.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
    public function actionAbout(){
        require_once(ROOT.'/views/site/about.php');
        return true;
    }
    public function actionDelivery_about(){
        require_once(ROOT.'/views/site/delivery_about.php');
        return true;
    }
    public function actionDelivery_point(){
        require_once(ROOT.'/views/site/delivery_point.php');
        return true;
    }
    
    public function action404(){
        require_once(ROOT.'/views/site/404.php');
        return true;
    }
}