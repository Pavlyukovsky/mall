<?php
class AdminArticleController extends AdminBase{
    public function actionIndex($page = 1){
        self::checkAdmin();
        $articleList = Article::getArticlesListAdmin($page);
        $total = Article::getTotalArticlesAdmin();
        $pagination = new Pagination($total, $page, Article::SHOW_BY_DEFAULT_ADMIN, 'page-');
        require_once(ROOT.'/views/admin_article/index.php');
        return true;
    }
    public function actionCreate(){
        self::checkAdmin();
        if (isset($_POST['submit'])){
            $options['name'] = $_POST['name'];  
            $options['name_key'] = "";
            $options['description'] = $_POST['description'];
            $options['description_article'] = $_POST['description_article'];
            $options['ingredients_article'] = $_POST['ingredients_article'];
            $options['status'] = $_POST['status'];
            $errors = false;
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false){
                $options['name_key'] = Translit::returnToHash($options['name'], 0);
                $id = Article::createArticle($options);
                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
                    }
                };
                header("Location: /admin/article");
            }
        }
        require_once(ROOT.'/views/admin_article/create.php');
        return true;
    }
    public function actionUpdate($id){
        self::checkAdmin();
        $article = Article::getArticleById($id);
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['description'] = $_POST['description'];
            $options['description_article'] = $_POST['description_article'];
            $options['status'] = $_POST['status'];
            $options['name_key'] = $_POST['name_key'];
            if (Article::updateArticleById($id, $options)) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
                }
            }
            header("Location: /admin/article");
        }
        require_once(ROOT . '/views/admin_article/update.php');
        return true;
    }
    public function actionDelete($id){
        self::checkAdmin();
        if (isset($_POST['submit'])){
            Article::deleteArticleById($id);
            header("Location: /admin/article");
        }
        require_once(ROOT.'/views/admin_article/delete.php');
        return true;
    }
}