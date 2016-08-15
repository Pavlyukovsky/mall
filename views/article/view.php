<?php include ROOT . '/views/layouts/header_article.php'; ?>

<div class="container">
    <a article="title" href="/article/<?= $article['name_key'] ?>"><?php echo $article['name']; ?></a>
        <div article="image">
            <a href="/article/<?= $article['name_key'] ?>"><img src="<?= Article::getImage($article['id']) ?>" alt="<?= $article['name'] ?>"></a>
        </div>
        <div article="recipe">
            <div article="tab"><div>Ингредиенты</div></div>

            <div article="tab-info"><?= $article['ingredients_article'] ?></div>
        </div>
        
        <div article="desc">
            <div article="tab"><div>Приготовление</div></div>

            <div article="tab-info"><?php echo $article['description_article']; ?></div>
        </div>
</div>

<script>
  $(function () {
    $('#myTab a:last').tab('show');
  })
</script>
<?php include ROOT . '/views/layouts/footer.php'; ?>
