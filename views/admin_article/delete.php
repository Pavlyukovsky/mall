<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/article">Управление статьями</a></li>
                    <li class="active">Удалить статью</li>
                </ol>
            </div>


            <h4>Удалить товар #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить эту статью?</p>

            <form method="post">
                <input class="btn btn-bread" type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

