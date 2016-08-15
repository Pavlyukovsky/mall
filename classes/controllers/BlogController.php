<?php
class BlogController{
    public function actionIndex($page = 1){
        $latestArticles = Article::getArticlesList($page);
        $total = Article::getTotalArticles();
        if(!($total < Article::SHOW_BY_DEFAULT+1))
            $pagination = new Pagination($total, $page, Article::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT.'/views/blog/index.php');
        return true;
    }
}