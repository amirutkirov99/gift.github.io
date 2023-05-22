<?php
session_start();

if ($_SESSION['item'] < 1 OR !isset($_SESSION['logged_in'])) {
    header('Location: sign.php');
}

else {
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];
}



require 'includes/header.php';
require $nav;?>
<div class="container-fluid product-page">
    <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb">Главная</a>
                    <a href="cart.php" class="breadcrumb">Корзина</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container scroll info">
    <table class="highlight">
        <thead>
        <tr>
            <th data-field="name">Товар</th>
            <th data-field="category">Категория</th>
            <th data-field="price">Цена</th>
            <th data-field="quantity">Количество</th>
            <th data-field="sms">Общее</th>
            <th data-field="total">Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'db.php';
        //получение продуктов
        $queryproduct = "SELECT product.name as 'name',
          product.id as 'id', product.price as 'price',
          category.name as 'category', command.id_user, command.statut,
          command.quantity as 'quantity'
FROM category, product, command
WHERE command.id_product = product.id AND product.id_category = category.id AND command.statut = 'ordered' AND command.id_user = ".$_SESSION['id'];
        $result1 = $connection->query($queryproduct);
        if ($result1->num_rows > 0) {
            while($rowproduct = $result1->fetch_assoc()) {
                $id_productdb = $rowproduct['id'];
                $name_product = $rowproduct['name'];
                $category_product = $rowproduct['category'];
                $quantity_product = $rowproduct['quantity'];
                $price_product = $rowproduct['price'];

                ?>
                <tr>
                    <td><?= $name_product; ?></td>
                    <td><?= $category_product; ?></td>
                    <td><?= $price_product; ?></td>
                    <td><?= $quantity_product; ?></td>
                    <td><?= $price_product*$quantity_product; ?></td>
                    <td><a href="deletecommand.php?id=<?= $id_productdb; ?>"><i class="material-icons red-text">close</i></a></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
    <div class="right-align">
        <a href="checkout.php"
           class='btn-large button-rounded waves-effect waves-light'>
            Оплата <i class="material-icons right">payment</i></a>
    </div>
</div>
<?php
require 'includes/secondfooter.php';
require 'includes/footer.php'; ?>
