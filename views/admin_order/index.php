<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
                        
            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-add breadcrumb-new">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление заказами</li>
                </ol>
            </div>
            <br>
            <div class="title-add">Список заказов</div>

            <br/>

            
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID заказа</th>
                    <th>Имя покупателя</th>
                    <th>Email покупателя</th>
                    <th>Телефон покупателя</th>
                    <th>Адрес покупателя</th>
                    <th>Дата оформления</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                    <?php if (AdminBase::isSuperAdmin()): ?> 
                    <th></th>
                    <?php endif; ?>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <?php $bg = "";
                          $color = "";
                    switch (Order::getStatusText($order['status'])){
                        /*
                        case 'Новый заказ': $bg = "#6aff6a";break;
                        case 'В обработке': $bg = "#7a51f3";break;
                        case 'Доставляется': $bg = "#fffb67";break;
                        case 'Доставлен': $bg = "#2196F3";break;
                        case 'Возврат товара': $bg = "f9f9f9";break;
                        case 'Спам': $bg = "#dd3535";break;
                        case 'Закрыт': $bg = "#686868";break;
                         */
                        case 'Новый заказ': $bg = "#ff4141"; $color="white";break;
                        case 'В обработке': $bg = "#377aff"; $color="white";break;
                        case 'Доставляется': $bg = "#fbff48"; $color="white";break;
                        case 'Доставлен': $bg = "#24f154"; $color="white";break;
                        case 'Возврат товара': $bg = "f9f9f9"; $color="white";break;
                        case 'Спам': $bg = "#d43cef"; $color="white";break;
                        case 'Закрыт': $bg = "#938282"; $color="white";break;
                    }?>
                    <tr style="background: <?=$bg?>;"> 
                        <td>
                            <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_email']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['user_address']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>    
                        <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="ica-vis"></i></a></td>
                        <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="ica-red"></i></a></td>
                        <?php if (AdminBase::isSuperAdmin()): ?>  
                        <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="ica-del"></i></a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

