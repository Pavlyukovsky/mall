<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-add breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>


            <div class="title-add">Добавить новую категорию</div>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul class="admin-demage">
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4 col-lg-offset-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input class="admin_input" type="text" name="name" placeholder="" value="" style="width: 100%;">

                        <p>Порядковый номер</p>
                        <input class="admin_input" type="text" name="sort_order" placeholder="" value="" style="width: 100%;">

                        <p>Статус</p>
                        <select name="status" class="admin-categ" style="width: 100%;">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-add-in btn-bread" value="Сохранить" style="width: 100%">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

