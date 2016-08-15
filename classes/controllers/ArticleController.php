<?php
class ArticleController{
    public function actionView($articleNameKey){
        $articleId = Article::getArticleId($articleNameKey); // Достаёт ид товара из ключа(транслита).
        $article = Article::getArticleById($articleId);
        require_once(ROOT . '/views/article/view.php');
        return true;
    }
}