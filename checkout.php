<?php
session_start();

if (!isset($_SESSION['logged_in']) && !isset($_SESSION['item'])) {
    header('Location: sign.php');
}

elseif($_SESSION['item'] < 1){
    header('Location: index.php');
}
else {
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];

    $email_sess = $_SESSION['email'];
    $country_sess = $_SESSION['country'];
    $firstname_sess = $_SESSION['firstname'];
    $lastname_sess = $_SESSION['lastname'];
    $city_sess = $_SESSION['city'];
    $address_sess = $_SESSION['address'];
}

require 'includes/header.php';
require $nav;?>
<div class="container-fluid product-page">
    <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb">Главаня</a>
                    <a href="cart.php" class="breadcrumb">Корзина</a>
                    <a href="checkout.php" class="breadcrumb">Проверка</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container checkout">
    <div class="card pay">
        <form method="post" action="final.php">
            <div class="row">

                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="text" name="email" value='<?= $email_sess; ?>' class="validate" required>
                    <label for="icon_prefix">Почта</label>
                </div>

                <div class="input-field col s6">
                    <select class="icons" name="country" value="<?= $country_sess; ?>" required>
                        <option value="" disabled selected>Выберите свою страну</option>
                        <option value="Uzbekistan">Узбекистан</option>
                        <option value="Russia">Россия</option>
                        <option value="Kazahstan">Казахстан</option>
                        <option value="Ukraina">Украина</option>
                    </select>
                    <label>Страна</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" name="firstname" value='<?= $firstname_sess; ?>' class="validate" required>
                    <label for="icon_prefix">First Name</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="icon_prefix" type="text" name="lastname" value='<?= $lastname_sess; ?>' class="validate" required>
                    <label for="icon_prefix">Фамилия</label>
                </div>


                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input id="icon_prefix" type="text" value='<?= $city_sess; ?>' name="city" class="validate" required>
                    <label for="icon_prefix">Город</label>
                </div>

                <div class="input-field col s6 meh">
                    <i class="material-icons prefix">location_on</i>
                    <input id="icon_prefix" type="text" value='<?= $address_sess; ?>' name="address" class="validate" required>
                    <label for="icon_prefix">Адрес</label>
                </div>

                <div class="center-align">
                    <button type="submit" id="confirmed" name="pay" class="btn meh button-rounded waves-effect waves-light ">Оплатить</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
