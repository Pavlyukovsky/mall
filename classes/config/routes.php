<?php
return array(
    // Корзина:
    'cart/checkout' => 'cart/checkout', // actionAdd в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController    
    //'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart/addAjax/([0-9]+)/([0-9]+)' => 'cart/addAjax/$1/$2', // actionAddAjax в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    
    // Управление товарами:    
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',    
    'admin/product/page-([0-9]+)' => 'adminProduct/index/$1',
    'admin/product' => 'adminProduct/index',
    
    // Управление статьями:    
    'admin/article/create' => 'adminArticle/create',
    'admin/article/update/([0-9]+)' => 'adminArticle/update/$1',
    'admin/article/delete/([0-9]+)' => 'adminArticle/delete/$1',    
    'admin/article/page-([0-9]+)' => 'adminArticle/index/$1',
    'admin/article' => 'adminArticle/index',
    
    // Управление категориями:    
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    
    // Управление заказами:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    
    // Админпанель:
    'admin' => 'admin/index',
    
    // Статьи
    'article/([a-z-0-9]+)' => 'article/view/$1',
    // Блог
    'blog/page-([0-9]+)' => 'blog/index/$1',
    'blog' => 'blog/index',
    
    // О магазине
    'delivery-about' => 'site/delivery_about',
    //'delivery-point' => 'site/delivery_point',
    'contacts' => 'site/contact',
    'about' => 'site/about',
    'error' => 'site/404',
    
    // Товар:
    'product/([a-z-0-9]+)' => 'product/view/$1', // actionView в ProductController

    // Каталог:
    'catalog/page-([0-9]+)' => 'catalog/index/$1', // actionIndex в CatalogController   
    //'catalog' => 'catalog/index', // actionIndex в CatalogController
    
    
    // Поиск
    'search/page-([0-9]+)' => 'search/search/$1',  // actionSearch в SearchController
    'search' => 'search/search', // actionSearch в SearchController
    
    
    // Категория товаров:    
    'category/([a-z-0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
    'category/([a-z-0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController  // [a-z-0-9]+
    
    // Главная страница
    'page-([0-9]+)' => 'site/index/$1', // actionCategory в CatalogController   
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
    
);