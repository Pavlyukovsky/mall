<?php
class CartController{
    /*public function actionAdd($id){
        Cart::addProduct($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }*/
    public function actionAddAjax($id, $quantity){
        echo Cart::addProduct($id, $quantity);
        return true;
    }
    public function actionDelete($id){
        Cart::deleteProduct($id);
        header("Location: /cart");
    }
    public function actionIndex(){
        $categories = Category::getCategoriesList();
        $productsInCart = Cart::getProducts();

        if ($productsInCart){
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT.'/views/cart/index.php');
        return true;
    }
    public function actionCheckout(){   
        $productsInCart = Cart::getProducts();
        if ($productsInCart == false) {
            header("Location: /");
        }
        $categories = Category::getCategoriesList();
        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);
        $totalProfit = Cart::getTotalProfit($products);
        $totalProcent = (Cart::getTotalProfit($products) * 0.15);
        $totalQuantity = Cart::countItems();
        $userName = false;
        $userEmail = false;
        $userPhone = false;
        $userAddress = false;
        $userComment = false;
        $delivery = false;
        $result = false;
        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userEmail = $user['email'];
        } else {
            $userId = false;
        }
        if(isset($_POST['submit'])){
            $userName = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $userPhone = $_POST['userPhone'];
            $userAddress = $_POST['userAddress'];
            $userComment = $_POST['userComment'];
            $delivery_status = $_POST['radioButton'];
            $userTotalPrice = $totalPrice;
            $userTotalProfit = $totalProfit;
            $userTotalProcent = $totalProcent;
                    
            $ip = $_SERVER['REMOTE_ADDR'];
            $errors = false;
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }
            if(!User::checkRadioButton($delivery_status)){
                $errors[] = 'Не выбран способ доставки';
            }
            switch ($delivery_status){
                case 'selfButton': $delivery_status = 1;
                                        break;
                case 'preButton': $delivery_status = 2;
                                        break;
                case 'hourButton': $delivery_status = 3;
                                        break;
                default : $delivery_status = 3;
            }
            if ($errors == false) {
                $result = Order::save($userName,$userEmail, $userPhone, $userAddress, $userComment, $userId, $productsInCart, $userTotalPrice, $delivery_status, $userTotalProfit, $userTotalProcent, $ip);
                if ($result) {             
                    $adminEmail = 'Pro10097Sasha@gmail.com';
                    $message = '<a href="http://shop2.ss/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);
                    Cart::clear();
                }
            }
        }
        require_once(ROOT.'/views/cart/checkout.php');
        return true;
    }
}