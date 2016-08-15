<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-add breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn btn-add-in btn-bread"><i class="fa fa-plus"></i> Добавить товар</a><br/>
            
            <div class="title-add">Список товаров</div>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th style="color:#767d94;">ID товара</th>
                    <th style="color:#767d94;">Артикул</th>
                    <th style="color:#767d94;">Название товара</th>
                    <th style="color:#767d94;">Цена</th>
                    <th style="color:#767d94;"></th>
                    <th style="color:#767d94;"></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>  
                        <td style="width:35px;">
                        <a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="ica-red"></i></a></td>
                        <td style="width:30px;"><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="ica-del"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <!-- Постраничная навигация -->
            <?php echo $pagination->get(); ?>

        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

