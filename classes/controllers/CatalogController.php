<?php
class CatalogController{
    public function actionIndex($page = 1){
        $categories = Category::getCategoriesList();                                    // Выбирает все котегории (для навигации).
        $latestProducts = Product::getProductsList($page);                              // Выбирает все продукты с конца.
        $total = Product::getTotalProducts();                                           // Полное количество продуктов
        if(!($total < Product::SHOW_BY_DEFAULT+1))
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-'); // Рисует постраничную навигацию.
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }
    public function actionCategory($categoryNameKey, $page = 1){
        $categoryId = Category::getCategoriesId($categoryNameKey);                      // Достаёт ид категории из ключа(транслита).
        $categories = Category::getCategoriesList();                                    // Выбирает все котегории (для навигации).
        $categoryTitleById = Category::getCategoryTitleById($categoryId);
        $categoryNameById = Category::getCategoryNameById($categoryId);
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);     // Выбирает все продукты данной категории по ид.
        $total = Product::getTotalProductsInCategory($categoryId);                      // Полное количество продуктов.
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-'); // Рисует постраничную навигацию.
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}