<?php
class AdminOrderController extends AdminBase{
    public function actionIndex(){
        self::checkAdmin();
        $ordersList = Order::getOrdersList();
        require_once(ROOT.'/views/admin_order/index.php');
        return true;
    }
    public function actionUpdate($id){
        self::checkAdmin();
        $order = Order::getOrderById($id);
        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $userPhone = $_POST['userPhone'];
            $userAddress = $_POST['userAddress'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];
            Order::updateOrderById($id, $userName, $userEmail, $userPhone, $userAddress, $userComment, $date, $status);
            header("Location: /admin/order/view/$id");
        }
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }
    public function actionView($id){
        self::checkAdmin();
        $order = Order::getOrderById($id);
        $productsQuantity = json_decode($order['products'], true);
        $productsIds = array_keys($productsQuantity);
        $products = Product::getProdustsByIds($productsIds);
        require_once(ROOT.'/views/admin_order/view.php');
        return true;
    }
    public function actionDelete($id){
        self::checkSuperAdmin();
        if (isset($_POST['submit'])) {
            Order::deleteOrderById($id);
            header("Location: /admin/order");
        }
        require_once(ROOT.'/views/admin_order/delete.php');
        return true;
    }
}