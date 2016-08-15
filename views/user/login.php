<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul class="ul-login-danger">
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2 class="h-n-login">Вход на сайт</h2>
                    <form action="#" method="post">
                        <input class="imp-bool" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                        <input class="imp-bool" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                        <input type="submit" name="submit" class="btn btn-default btn-blue" value="Вход" />
                    </form>
                </div><!--/sign up form-->


                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>