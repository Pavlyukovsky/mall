<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/article">Управление статьями</a></li>
                    <li class="active">Редактировать статью</li>
                </ol>
            </div>


            <div class="title-add">Редактировать статью #<?php echo $id; ?></div>

            <br/>
            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <table>
                        <tr>
                        <td>
                        <p>Название статьи</p>
                        <input class="admin_input" type="text" name="name" placeholder="" value="<?php echo $article['name']; ?>">
                        
                        <p>Ключ назвнание статьи</p>
                        <input class="admin_input" type="text" name="name_key" placeholder="" value="<?php echo $article['name_key']; ?>">
                        
                        <p style="margin-top: 10px;">Описание</p>
                        <textarea name="description" style="min-width: 250px;width: 879px;"><?php echo $article['description']; ?></textarea>
                        
                        <p style="margin-top: 10px;">Детальное описание</p>
                        <textarea name="description_article" style="min-width: 250px;width: 879px;"><?php echo $article['description_article']; ?></textarea>
                        
                        <p style="margin-top: 10px;">Ингредиенты</p>
                        <textarea name="ingredients_article" style="min-width: 250px;width: 879px;"><?php echo $article['ingredients_article']; ?></textarea>
                        
                        <p class="img-product-a">Изображение товара</p>
                        <img src="<?php echo Article::getImage($article['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $article['image']; ?>">

                        
                        </td>
                        <td id="check-right-a">
                            
                        <p>Статус</p>
                        <select name="status" style="padding: 7px 58px;">
                            <option value="1" <?php if ($article['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($article['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
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

