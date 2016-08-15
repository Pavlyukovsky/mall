<?php include ROOT . '/views/layouts/header_contacts.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2 class="h-n-login">Обратная связь</h2>
                        <p style="text-align: center;">Есть вопрос? Напишите нам.</p>
                        <br/>
                        <form action="#" method="post">
                            <p>Ваш email</p>
                            <input class="cart-input" type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
                            <p>Ваше сообщение</p>
                            <input class="cart-comment" type="text" name="userText" placeholder="Сообщение" value="<?php echo $userText; ?>"/>
                            <input type="submit" name="submit" class="btn btn-default btn-blue" value="Отправить" />
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>