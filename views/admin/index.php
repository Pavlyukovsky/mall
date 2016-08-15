<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<style>
    body {
        background: #ebedf3;
    }
</style>

<section>
    <div class="container">
        <div class="row admin-col">           
            <br/>   
            <div class="col-md-8 col-md-offset-2">
                <h2 class="admin-h2">Добрый день, администратор!</h2>
            </div>                          
            <br/>
        </div>            
        <div class="row group-col">
            <div class="col-md-4">
                <div class="admin-block">
                    <a class="btn-admin" href="/admin/product">
                    <img src="template/images/icons/admin-ic-1.png" alt="">
                    Управление товарами
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-block">
                    <a class="btn-admin" href="/admin/category">
                    <img src="template/images/icons/admin-ic-2.png" alt="">
                    Управление категориями
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-block">
                    <a class="btn-admin" href="/admin/order">
                    <img src="template/images/icons/admin-ic-3.png" alt="">
                    Управление заказами
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-block">
                    <a class="btn-admin" href="/admin/article">
                    <img src="template/images/icons/article.png" alt="">
                    Управление статьями
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
