<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-add breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление статьями</li>
                </ol>
            </div>

            <a href="/admin/article/create" class="btn btn-add-in btn-bread"><i class="fa fa-plus"></i> Добавить статью</a><br/>
            
            <div class="title-add">Список статей</div>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th style="color:#767d94;">ID товара</th>
                    <th style="color:#767d94;">Название товара</th>
                    <th style="color:#767d94;"></th>
                    <th style="color:#767d94;"></th>
                </tr>
                <?php foreach ($articleList as $article): ?>
                    <tr>
                        <td><?php echo $article['id']; ?></td>
                        <td><?php echo $article['name']; ?></td>
                        <td style="width:35px;">
                        <a href="/admin/article/update/<?php echo $article['id']; ?>" title="Редактировать"><i class="ica-red"></i></a></td>
                        <td style="width:30px;"><a href="/admin/article/delete/<?php echo $article['id']; ?>" title="Удалить"><i class="ica-del"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <!-- Постраничная навигация -->
            <?php echo $pagination->get(); ?>

        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

