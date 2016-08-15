<?php include ROOT . '/views/layouts/header_main.php'; ?>
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
                            <li class="sidebar-group"><span>Каталог товаров</span>
                                <ul class="sidebar-group-menu">
                                    <?php foreach ($categories as $categoryItem): ?>
                                    <li class="sidebar-item"><a href="/category/<?= $categoryItem['name_key'] ?>"><?= $categoryItem['name'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- Slider -->
                <div class="container">
                    <div class="row slider-wrap">
                        <div class="col-lg-12 col-md-12">
                            <div id="carousel-example-generic" class="carousel carousel-top slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="/template/img/slider.png" alt="">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="/template/img/slider2.png" alt="">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div> 
                        </div>
                    </div>
                </div>


        <div class="container">
          <div class="rwo">
            <div class="col-lg-12 content">
              <div class="row product-wrapper">
              <?php foreach ($latestProducts as $product): ?>
                <div class="col-md-4 col-sm-6 product">
                  <div class="product-img">
                    <a href="/product/<?= $product['name_key'] ?>"><img src="<?= Product::getImage($product['id']) ?>" alt="<?= $product['name'] ?>"></a>
                  </div>
                    <div class="product-footer">
                      <h5><a href="/product/<?= $product['name_key'] ?>"><?= $product['name'] ?> ( Цена за <?= $product['description'] ?> )</a></h5>
                      <span class="but"><?= $product['brand'] ?></span>
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
              </div>
              <?php echo $pagination->get(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>








