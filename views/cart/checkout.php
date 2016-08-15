<?php include ROOT . '/views/layouts/header.php'; ?>

<?php
echo "<script>var totalPrice = ".$totalPrice.";</script>";
if( isset($_POST["select"]) AND ($_POST["radioButton"]) ){
	$s = $_POST["select"];
	$r = $_POST["radioButton"];
	if( $r ==  "selfButton"){
		$totalPrice = $totalPrice;
	}else if( $r ==  "preButton"){
		$totalPrice = $totalPrice+25;
	}else if( $r ==  "hourButton"){
		switch($s){
			case 1: $totalPrice = $totalPrice + 25; break;
			case 2: $totalPrice = $totalPrice + 35; break;
			case 3: $totalPrice = $totalPrice + 45; break;
			case 4: $totalPrice = $totalPrice + 60; break;
			case 5: $totalPrice = $totalPrice + 90; break;
		}
	}
}
?>
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
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center cart-title">Корзина</h2>


                    <?php if ($result): ?>
                        <p>Заказ оформлен. Мы Вам перезвоним.</p>
                    <?php else: ?>
                        
                        

                        <?php if (!$result): ?>                        

                            <div class="col-sm-12">
                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul class="ul-cart-danger">
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <p class="cart-opow">Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>
                                
                                <div class="login-form">
                                    <form action="#" method="post">
                                        

                                        <table>
                                        <tr>
                                        <td>
                                        <p style="text-align: center;">Ваша имя</p>
                                        <input class="cart-input" type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>
                                       
                                        <p style="text-align: center;">Ваш email</p>
                                        <input class="cart-input" type="email" name="userEmail" placeholder="" value="<?php echo $userEmail;?>"/>
                                        
                                        <p style="text-align: center;">Номер телефона</p> 
                                        <input class="cart-input" type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/>  
                                        
                                        <p style="text-align: center;">Адрес</p>
                                        <input class="cart-input" type="text" name="userAddress" placeholder="" value="Кривой Рог, " title="Кривой Рог, ул. Ленина, 11/3"/>
                                        
                                        <p>Адрес</p>
                                        <select id="select" name="select" onchange="updatePriceSelect()" style="width: 256px;margin-bottom: 5px;">
                                            <option value="1" selected>Центрально городской район</option>
                                            <option value="2">Дзержинский, Долгинцевский, Ингулецкий район</option>
                                            <option value="3">Жовтневый, Саксаганский район</option> 
                                            <option value="4">Терновской район</option>                         
                                            <option value="5">Даманский, Севгок</option>                                                          
                                        </select>

                                        <p>Комментарий к заказу</p>
                                        <input class="cart-comment" type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>
                                       
                                            </td>
                                            <td id="check-right">
                                            <p><b>Выберите способ доставки:</b></p>
                                            <p><input name="radioButton" onchange="updatePrice(this)" type="radio" value="selfButton" style="margin-right: 5px;">Сам (Бесплатно)</p>
                                            <?php if(1 == 3): ?>
                                                <p><input name="radioButton" onchange="updatePrice(this)" type="radio" value="preButton">Пред заказ (Доставка в любую точку города за 25грн.)</p>
                                            <?php endif;?>
                                            <p><input name="radioButton" onchange="updatePrice(this)" type="radio" value="hourButton" checked style="margin-right: 5px;">За 1 час (До Центрально городского района - 25 грн. До Дзержинского, Долгинсковского, Ингулецкого районов - 35 грн. Жовтневый, Саксаганский - 45 грн. Терновской - 60грн. Даманский, Севког - 90 грн.)</p>

                                            <br/>
                                            <br/>
                                            <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн.</p><br/>
                                            <p id="pashka">Общая сумма: <?php echo $totalPrice; ?>, грн.</p><br/>
                                            <br/>
                                            <br/>
                                            <input type="submit" name="submit" class="btn btn-default btn-cart" value="Оформить" />
                                            </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>





<?php include ROOT . '/views/layouts/footer.php'; ?>