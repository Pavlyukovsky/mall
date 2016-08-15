<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul class="ul-regist-danger">
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2 class="h-n-regist">Регистрация на сайте</h2>
                        <form action="#" method="post">
                            <input class="imp-bool-regist" type="text" name="name" placeholder="Введите имя" value="<?php echo $name; ?>"/>
                            <input class="imp-bool-regist" type="email" name="email" placeholder="Введите E-mail" value="<?php echo $email; ?>"/>
                            <input class="imp-bool-regist" type="password" name="password" placeholder="Введите пароль" value=""/>
                            <input class="imp-bool-regist" type="password" name="password_again" placeholder="Повторите пароль" value=""/>
                            <input class="imp-bool-regist" type="text" name="phone" placeholder="Введите свой телефон" value="<?php echo $phone; ?>"/><br />
                            
                            <input type="submit" name="submit" class="btn btn-default btn-regist" value="Регистрация" />
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