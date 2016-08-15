<?php include ROOT . '/views/layouts/header.php'; ?>
<!-- Panel Menu -->
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
            <!-- .# Panel Menu -->
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>
                    
                    <?php if ($productsInCart): ?>
                        <p class="cart-oll">Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость,  грн.</th>
                                <th>Количество, кг</th>
                                <th>Общая стоимость, грн</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['code'];?></td>
                                    <td><?php echo $product['name'];?></td>
                                    <td><?php echo $product['price'];?> грн.</td>
                                    <td><?php echo $productsInCart[$product['id']];?></td>
                                    <td><?php echo $product['price'] * $productsInCart[$product['id']];?> грн.</td>
                                    <td>
                                        <a href="/cart/delete/<?php echo $product['id'];?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Общая стоимость:</td>
                                    <td><?php echo $totalPrice;?> грн.</td>
                                    <td></td>
                                </tr>
                            
                        </table>
                        
                        <a class="btn btn-add-in btn-cart-blue checkout" href="/cart/checkout" style="margin-bottom:15px;"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                    <?php else: ?>
                        <p class="cart-null">Корзина пуста</p>
                        
                        <a class="btn btn-add-in btn-cart-blue checkout" href="/" style="margin-top:5px;"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                    <?php endif; ?>

                </div>

                
                
            </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>