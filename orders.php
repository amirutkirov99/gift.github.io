<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}
else {
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];
}


require 'includes/header.php';
require $nav; ?>

<div class="container-fluid product-page">
    <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb">Магазин</a>
                    <a href="orders.php" class="breadcrumb">заказы</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container scroll">
    <table class="highlight striped">
        <thead>
        <tr>
            <th data-field="name">Товар</th>
            <th data-field="quantity">Количество</th>
            <th data-field="date">Дата</th>
            <th data-field="status">Статус</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'db.php';
        //получить заказы
        $queryorder = "SELECT command.id as id, name, quantity, dat, statut FROM command, product WHERE product.id = command.id_product and command.statut='paid' and id_user=".$_SESSION['id'];
        $resultorder = $connection->query($queryorder);
        if ($resultorder->num_rows > 0) {
            // выходные данные каждой строки
            while($roworder = $resultorder->fetch_assoc()) {
                $id = $roworder['id'];
                $productname = $roworder['name'];
                $quantity = $roworder['quantity'];
                $dat = $roworder['dat'];
                $statu = $roworder['statut'];
                ?>
                <tr>
                    <td><?= $productname; ?></td>
                    <td><?= $quantity; ?></td>
                    <td><?= $dat; ?></td>
                    <td><?= $statu; ?></td>
                </tr>
            <?php }}  ?>
        </tbody>
    </table>
    
</div>

<?php require 'includes/footer.php'; ?>
