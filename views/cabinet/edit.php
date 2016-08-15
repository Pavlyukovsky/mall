<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <span class="title-add" style="margin-top:25px;">Данные отредактированы</span>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Редактирование данных</h2>
                        <form action="#" method="post">
                            <p>Имя:</p>
                            <input class="cart-input-cabinet" type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                            
                            <p>Пароль:</p>
                            <input class="cart-input-cabinet" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-add-in btn-blue" value="Сохранить" style="padding: 8px 143px;" />
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>