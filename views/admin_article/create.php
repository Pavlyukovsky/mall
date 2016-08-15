<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section style="height: 140%;">
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-add breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление статьями</a></li>
                    <li class="active">Редактировать статью</li>
                </ol>
            </div>


            <div class="title-add">Добавить новый статью</div>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <table>
                        <tr>
                        <td>
                        <p>Название статьи</p>
                        <input class="admin_input" type="text" name="name" placeholder="" value="">
                        <p style="margin-top: 10px;">Описание</p>
                        <textarea name="description" style="min-width: 250px;width: 879px;"></textarea>
                        
                        <p style="margin-top: 10px;">Детальное описание</p>
                        <textarea name="description_article" style="min-width: 250px;width: 879px;"></textarea>
                        
                        <p style="margin-top: 10px;">Ингредиенты</p>
                        <textarea name="ingredients_article" style="min-width: 250px;width: 879px;"></textarea>
                        
                        <br/><br/>
                        
                        <p class="img-product-a">Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">
                        
                        </td>
                        <td id="check-right-a">
                            
                        <p>Статус</p>
                        <select name="status" style="padding:7px 59px 8px;margin-bottom: 10px;">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>



                        <input type="submit" name="submit" class="btn btn-add-in btn-bread" value="Сохранить" style="width: 250px;">

                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

