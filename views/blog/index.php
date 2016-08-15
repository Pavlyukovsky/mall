<?php include ROOT . '/views/layouts/header_blog.php'; ?>

<div class="container blog_container">
    <?php foreach ($latestArticles as $article): ?>
        <div blog="cart">
                <div blog="cart-image">
                    <a href="/article/<?= $article['name_key'] ?>"><img src="<?= Article::getImage($article['id']) ?>" alt="<?= $article['name'] ?>"></a>
                </div>
                <div blog="cart-desc-wrap">
                    <div blog="cart-desc">
                            <span blog="cart-date"><?= $article['date']?></span>
                            <h1><a href="/article/<?= $article['name_key'] ?>"><?= $article['name'] ?></a></h1>
                            <p><?= $article['description'] ?></p>
                            <a href="/article/<?= $article['name_key'] ?>">Подробнее</a>
                    </div>
                </div>
        </div>
    <?php endforeach; ?>
    <?php echo $pagination->get(); ?>

</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>







