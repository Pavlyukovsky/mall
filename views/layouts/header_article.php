<!DOCTYPE html>
<html lang="ru">
    <head>
        <title><?php echo $article['title'];?></title>
        <meta name="keywords" content="<?php echo $article['name'];?>">
        <meta name="description" content="<?php echo $article['title'];?> Быстрая доставка по городу. Выгодные цены.">
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
                  <div style="padding-left:0;" class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                      <div class="logo">
                          <a href="/">
                              <img src="http://www.mall24.com.ua/template/img/logo.png"  height="70" width="150"  alt="" />
                          </a>
                      </div>
                  </div>
                  <h1 class="blog_title">Блог</h1>
                </div>
              </div>
            </div>
        </header>