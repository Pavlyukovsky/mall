<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section style="height: 140%;">
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-add breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <div class="title-add">Добавить новый товар</div>

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
                        <p>Название товара</p>
                        <input class="admin_input" type="text" name="name" placeholder="" value="">

                        <p>Артикул</p>
                        <input class="admin_input" type="text" name="code" placeholder="" value="">

                        <p>Стоимость, $</p>
                        <input class="admin_input" type="text" name="price" placeholder="" value="">

                        <p>Категория</p>
                        <select name="category_id" class="admin-categ" style="width: 879px;">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Производитель</p>
                        <input class="admin_input" type="text" name="brand" placeholder="" value="">

                        <p class="img-product-a">Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p style="margin-top: 10px;">Детальное описание</p>
                        <textarea name="description" style="min-width: 250px;width: 879px;"></textarea>
                        </td>
                        <td id="check-right-a">

                        <p>Наличие на складе</p>
                        <select name="availability" class="admin-categ" style="    padding: 7px 100px;">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>


                        <p>Новинка</p>
                        <select name="is_new" style="padding: 7px 100px;">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>



                        <p>Рекомендуемые</p>
                        <select name="is_recommended" style="padding: 7px 100px;">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>



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

