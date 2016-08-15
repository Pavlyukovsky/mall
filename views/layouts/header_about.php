<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>О компании - MALL24.com.ua</title>
        <meta name="keywords" content="Доставка фруктов, доставка овощей, купить фрукты, купить овощи">
        <meta name="description" content="Качественная и быстрая доставка свежих фруктов и овощей на дом в Кривом Роге. Купить овощи и фрукты у нас выгодно чем сходить в супер маркет.">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="/template/css/bootstrap.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/sidebar.css" rel="stylesheet">
        <link href="/template/css/sidebar-bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
        <header id="header">
          <div class="container">
            <div class="row">
              <div class="h-panel clearfix">
                <nav class="h-nav h-nav-tabs">
                  <a href="/about"><i class="ic-about"></i><span class="h-nav-xxs">О Магазине</span></a>
                  <a href="/delivery-about"><i class="ic-payment"></i><span class="h-nav-xxs">Доставка и Оплата</span></a>
                  <a href="/contacts"><i class="ic-delivery"></i><span>Связаться с нами</span></a>
                </nav>
                <?php if (User::isGuest()): ?>
                <nav class="h-nav-right pull-right">
                  <a href="/user/login"><i class="ic-panel"></i><span>Войти в кабинет</span></a>
                  <a href="/user/register"><i class="ic-panel"></i><span>Регистрация</span></a>
                </nav>
                <?php else: ?>
                <nav class="h-nav-right pull-right">
                  <a href="/cabinet"><i class="ic-profile"></i><span>Мой Кабинет</span></a>
                  <a href="/user/logout"><i class="ic-panel"></i><span>Выйти</span></a>
                </nav>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <!-- Header Bottom -->
            <div class="header-bottom">
            <div class="container">
              <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                  <div class="logo">
                    <a href="/"><img src="/template/img/logo.png"  height="70" width="150"  alt=""></a>
                  </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-3">
                  <form method="POST" action="/search" id="h-search">
                      <input type="text" id="searchInput" name="q" placeholder="Что вы хотите купить?" value="<?php if(isset($_POST['q']))echo $_POST['q'];?>"/>
                    <input type="submit" value="Поиск" />
                  </form>
                  <div class="example">
                    <span class="popul">Популярные запросы</span>
                      <ul>
                        <li class="search_best">Сахар</li> 
                        <li class="search_best">Крупа</li> 
                        <li class="search_best">Капуста</li>
                      </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                  <div class="dropdown h-phone  h-nav-xxs">
                    <a data-toggle="dropdown" href="#">
                      <span>+380 97 229 57 66 <i class="ic-arrow-down"></i></span>
                      <small>Бесплатно по всей Украине</small>
                    </a>
                      <ul class="dropdown-menu arrow" role="menu" aria-labelledby="dLabel">
                          <li><a href="/contacts">Форма обратной связи</a></li>
                      </ul>
                    </div>                  
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                  <ul class="shop">
                    <li><a href="/cart" id="cart"><span class="badge badge-shop" id="cart-count">
                        <?php echo Cart::countItems(); ?>
                    </span><i class="ic-shop"></i><div id="sh_title">Корзина</div></a></li>
                  </ul>
                </div>
              </div>
              </div>
            </div>
        </header>