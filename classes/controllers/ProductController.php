<?php
class ProductController{
    public function actionView($productNameKey){
        $categories = Category::getCategoriesList();
        $productId = Product::getProductId($productNameKey); // Достаёт ид товара из ключа(транслита).
        $product = Product::getProductById($productId);
        require_once(ROOT . '/views/product/view.php');
        return true;
    }
}