<?php include ROOT . '/views/layouts/header_product.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-3 sidebar">
            <div class="panel">
                <div class="panel-menu-wrap clearfix">
                    <div class="btn btn-menu"><i class="ic-list"></i>Категории товаров<i class="ic-arrow-down-list"></i></div>
                    <ul class="panel-menu arrow">
                        <?php foreach ($categories as $categoryItem): ?>
                            <li><a href="/category/<?= $categoryItem['name_key'] ?>"><?= $categoryItem['name'] ?><i class="ic-arrow-right"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>                 
        </div>

        <div class="col-lg-9 content">
            <div class="product-details"><!--product-details-->
                <div class="row">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?php echo Product::getImage($product['id']); ?>" alt="<?= $product['name'] ?>" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->

                            <?php /*if ($product['is_new']): ?>
                            <a href="/product/<?= $product['name_key'] ?>" style="text-decoration: none">
                                <img src="/template/images/product-details/new.jpg" class="newarrival" alt="<?= $product['name'] ?>" />
                            </a>
                            <?php endif;*/ ?>

                            <a href="/product/<?=$product['name_key'];?>" style="text-decoration: none">
                                <h1 class="prod_ui"><?php echo $product['name']; ?> ( Цена за <?= $product['description'] ?> )</h1>
                            </a>
                            <p class="prod_cod">Код товара: <b><?php echo $product['code']; ?></b></p>
                            <span>
                                <span class="prod_price"><?php echo $product['price']; ?> грн.</span>
                            <div class="prod_center_cart">
                                <button class="item_quantity_minus" data-id="_<?php echo $product['id']; ?>" onclick="minus(this)">-</button>  
                                <input class="item_quantity_input" id="input_cart_<?php echo $product['id']; ?>" name="input_cart_<?php echo $product['id']; ?>" onchange="updateInput(this)" value="1" style="width: 42px"/>
                                <button class="item_quantity_plus" data-id="_<?php echo $product['id']; ?>" onclick="plus(this)">+</button>
                            </div>
                            </span>
                        </div><!--/product-information-->
                        <div class="col-lg-12">
                            <div class="prod_avail">
                            <p><b>Наличие:</b> <?php echo Product::getAvailabilityText($product['availability']); ?></p>
                            <p><b>Производитель:</b> <?php echo $product['brand']; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="#" data-id="<?php echo $product['id']; ?>" class="btn btn-prod add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                        </div>
                    </div>
                </div>
                <div class="row">                                
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#home">Описание</a></li>
                        </ul>

                        <div class="tab-content tab-cont">
                            <div class="tab-pane active" id="home"><?php echo $product['description_product']; ?></div>
                        </div>
                    </div>
                </div>
            </div><!--/product-details-->

        </div>
    </div>
</div>

<script>
  $(function () {
    $('#myTab a:last').tab('show');
  })
</script>
<?php include ROOT . '/views/layouts/footer.php'; ?>
