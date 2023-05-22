<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}

elseif($_SESSION['logged_in'] == 'True') {
    header('Location: index.php');
}

else{
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];
}
error_reporting(0);

require 'includes/header.php';
require $nav; ?>



<style>
    @media (max-width: 992px) {


        
        .input-field.col.s6 {
            width: 100%;
        }
    }
    .sign{
        padding-left: 0px;
        padding-right: 0px; 
    }
    

</style>
<div class="container-fluid center-align sign" >
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#test1">Войти</a></li>
                    <li class="tab col s3"><a class="active" href="#test2">Регистрация</a></li>
                </ul>
            </div>

            <div class="container forms">
                <div class="row">

                    <div id="test2" class="col s12 left-align active">
                        <div class="card">
                            <div class="row">

                                <form class="col s12" method="POST" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">email</i>
                                            <input id="icon_prefix" type="text" name="email" class="validate" required>
                                            <label for="icon_prefix">Email</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <select class="icons" name="country">
                                                <option value=""  disabled selected>Выберите вашу страну</option>
                                                <option value="Uzbekistan">Узбекистан</option>
                                                <option value="Russia">Россия</option>
                                                <option value="Kazahstan">Казахстан</option>
                                                <option value="Ukraina">Украина</option>
                                            </select>
                                            <label>Страна</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="icon_prefix" type="text" name="firstname" class="validate" required>
                                            <label for="icon_prefix">Имя</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input id="icon_prefix" type="text" name="lastname" class="validate" required>
                                            <label for="icon_prefix">Фамилия</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="icon_prefix" type="password" name="password" class="validate value1" required>
                                            <label for="icon_prefix">Пароль</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
                                            <label for="icon_prefix">Подтвердите пароль</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">business</i>
                                            <input id="icon_prefix" type="text" name="city" class="validate" required>
                                            <label for="icon_prefix">Город</label>
                                        </div>

                                        <div class="input-field col s6 meh">
                                            <i class="material-icons prefix">location_on</i>
                                            <input id="icon_prefix" type="text" name="address" class="validate" required>
                                            <label for="icon_prefix">Адрес</label>
                                        </div>


                                        <?php require 'includes/signupconfirmation.php'; ?>
                                        <div class="center-align">
                                            <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Зарегистрироваться</button>
                                        </div>

                                        <p>Регистрируясь, вы подтверждаете, что прочитали и приняли наше <a href="">пользовательское соглашение</a>,
                                            вам исполнилось 18 лет, и вы соглашаетесь с нашим <a href="">примечанием о конфиденциальности и получением</a>
                                            маркетинговые сообщения от нас.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="test1" class="col s12 left-align">

                        <div class="card">
                            <div class="row">
                                <form class="col s12" method="POST">

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input id="icon_prefix" type="text" name="emaillog" class="validate">
                                        <label for="icon_prefix">Почта</label>
                                    </div>
                                    <div class="input-field col s12 meh">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" type="password" name="passworddb" class="validate">
                                        <label for="icon_prefix">Пароль</label>
                                    </div>

                                    <?php require 'includes/loginconfirmation.php';?>
                                    <div class="center-align">
                                        <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Войти</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
