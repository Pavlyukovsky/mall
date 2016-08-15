<?php include ROOT . '/views/layouts/header_category.php'; ?>

<div class="container">
    <div class="row relative">
        <!-- SIDEBAR -->
        <div data-sidebar="true" data-force-toggle="true" data-locked="true"
             data-hammer-scrollbar="true" class="sidebar-trigger sidebar-force-open sidebar-locked">
            <a class="sidebar-toggle" href="#">
                <span class="sr-only">Sidebar toggle</span>
                <i class="fa fa-sidebar-toggle"></i>
            </a>

            <div class="sidebar-wrapper sidebar-default sidebar-open-init">
                <ul class="sidebar-menu">
                    <li class="sidebar-group"><span>Каталог товаров</span></a>
                        <ul class="sidebar-group-menu">
                            <?php foreach ($categories as $categoryItem): ?>
                                <li class="sidebar-item"><a href="/category/<?= $categoryItem['name_key'] ?>"><?= $categoryItem['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="rwo">
                <div class="col-lg-12 content">
                         <h1>
                             <?php echo Category::getCategoryParams("name"); //Возвращает имя категории?>
                         </h1>
                    <div class="row product-wrapper">
                        <?php foreach ($categoryProducts as $product): ?>
                            <div class="col-md-4 col-sm-6 product">
                                <div class="product-img">
                                    <a href="/product/<?= $product['name_key'] ?>"><img class="product-img-link" src="<?= Product::getImage($product['id']) ?>" alt="<?= $product['name'] ?>"></a>
                                </div>
                                <div class="product-footer">
                                    <h5><a href="/product/<?= $product['name_key'] ?>"><?= $product['name'] ?> ( Цена за <?= $product['description'] ?> )</a></h5>
                                    <span class="cat"><?= $product['brand'] ?></span>
                                </div>
                                <span class="price pull-right"><?= $product['price'] ?> грн</span>
                                <button class="item_quantity_minus" data-id="_<?= $product['id'] ?>" onclick="minus(this)">-</button>  
                                <input class="item_quantity_input" id="input_cart_<?= $product['id'] ?>" name="input_cart_<?= $product['id']; ?>" onchange="updateInput(this)" value="1"/>
                                <button class="item_quantity_plus" data-id="_<?= $product['id'] ?>" onclick="plus(this)">+</button>
                                <div class="col-md-12 btn-center">
                                    <div class="btn btn-buy add-to-cart" data-id="<?= $product['id'] ?>">В корзину</div>
                                </div>
                                <?php /*if ($product['is_new']): ?>
                                <img src="/template/images/home/new.png" class="new" alt="" />
                                <?php endif;*/?>
                            </div>
                        <?php endforeach; ?>
                        
                        <div class="col-md-12 col-sm-6">
                             <?php echo Category::getCategoryParams("description"); //Возвращает описание категории?>
                        </div>
                    </div>
                    <?php echo $pagination->get(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>