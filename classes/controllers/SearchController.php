<?php
class SearchController{
    public function actionSearch($page = 1){
        $categories = Category::getCategoriesList();
        $SearchProducts = Product::getSearchProductsList($page);
        $total = Product::getTotalSearchProducts($page);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT.'/views/search/search.php');
        return true;        
    }
}