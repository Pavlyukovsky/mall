<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="img-cab">
                <img src="/template/images/people.png" alt="">
            </div>
            <div class="top-cab">
            <h3>Кабинет пользователя</h3>
            
            <h4>Привет, <?php echo $user['name'];?>!</h4>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
            </ul>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>