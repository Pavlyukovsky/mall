<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Редактировать заказ</li>
                </ol>
            </div>


            <h4>Редактировать заказ #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4 col-lg-offset-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p class="admin_order">Имя клиента</p>
                        <h2 class="admin_orger_p"><?php echo $order['user_name']; ?></h2>
                        <input type="hidden" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>" >
                        
                        <p class="admin_order">Email клиента</p>
                        <h2 class="admin_orger_p"><?php echo $order['user_email']; ?></h2>
                        <input type="hidden" name="userEmail" placeholder="" value="<?php echo $order['user_email']; ?>">
                        
                        <p class="admin_order">Телефон клиента</p>
                        <h2 class="admin_orger_p"><?php echo $order['user_phone']; ?></h2>
                        <input type="hidden" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">
                        
                        <p class="admin_order">Адрес клиента</p>
                        <input class="admin-order-in" type="text" name="userAddress" placeholder="" value="<?php echo $order['user_address']; ?>"  style="width: 100%;">

                        <p class="admin_order">Комментарий клиента</p>
                        <h2 class="admin_orger_p"><?php echo $order['user_comment']; ?></h2>
                        <input type="hidden" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>">

                        <p class="admin_order">Дата оформления заказа</p>
                        <h2 class="admin_orger_p"><?php echo $order['date']; ?></h2>
                        <input type="hidden" name="date" placeholder="" value="<?php echo $order['date']; ?>">
                        
                        <p>Статус</p>
                        <select name="status" class="admin-order-sel" style="width: 100%;">
                            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Доставлен</option>
                            <option value="5" <?php if ($order['status'] == 5) echo ' selected="selected"'; ?>>Возврат товара</option>
                            <option value="6" <?php if ($order['status'] == 6) echo ' selected="selected"'; ?>>Спам</option>
                            <?php if (AdminBase::isSuperAdmin()): ?>
                            <option value="7" <?php if ($order['status'] == 7) echo ' selected="selected"'; ?>>Закрыт</option>
                            <?php endif; ?>
                        </select>
                        <br>
                        <br>
                        <input type="submit" name="submit" class="btn btn-bread" value="Сохранить" style="width:100%;">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

