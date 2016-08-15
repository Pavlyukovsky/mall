<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <div class="title-add">Редактировать товар #<?php echo $id; ?></div>

            <br/>

            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <table>
                        <tr>
                        <td>
                        <p>Название товара</p>
                        <input class="admin_input" type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">
                        
                        <p>Ключ назвнание товара</p>
                        <input class="admin_input" type="text" name="name" placeholder="" value="<?php echo $product['name_key']; ?>">

                        <p>Артикул</p>
                        <input class="admin_input" type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

                        <p>Стоимость, $</p>
                        <input class="admin_input" type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

                        <p>Категория</p>
                        <select class="admin-categ" name="category_id" style="width:879px;">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Производитель</p>
                        <input class="admin_input" type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">

                        <p class="img-product-a">Изображение товара</p>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>">

                        <p style="margin-top: 10px;">Детальное описание</p>
                        <textarea name="description" style="min-width: 250px;width: 879px;"><?php echo $product['description']; ?></textarea>
                        </td>
                        <td id="check-right-a">                        

                        <p>Наличие на складе</p>
                        <select name="availability" style="padding: 7px 100px 8px;">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        
                        <p>Новинка</p>
                        <select name="is_new" style="padding: 7px 100px;">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        

                        <p>Рекомендуемые</p>
                        <select name="is_recommended" style="padding: 7px 100px;">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        

                        <p>Статус</p>
                        <select name="status" style="padding: 7px 58px;">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-add-in btn-bread" value="Сохранить" style="width: 253px;">
                        
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

