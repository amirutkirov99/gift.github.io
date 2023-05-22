<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: sign.php');
}

else {
  $sessid = $_SESSION['id'];
}
 require 'includes/header.php';
 require 'includes/navconnected.php';?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Магазин</a>
            <a href="editprofile.php" class="breadcrumb">Изменить профиль</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container editprofile">
  <div class="container">
    <div class="card">
      <div class="row">

   <form class="col s12" method="POST" >
     <div class="row">
       <div class="input-field col s12">
         <i class="material-icons prefix">email</i>
         <input id="icon_prefix" type="text" name="email" class="validate" required>
         <label for="icon_prefix">Почта</label>
       </div>

       <div class="input-field col s12">
         <i class="material-icons prefix">lock</i>
         <input id="icon_prefix" type="password" name="password" class="validate value1" required>
         <label for="icon_prefix">Новый пароль</label>
       </div>

       <div class="input-field col s12 meh">
         <i class="material-icons prefix">lock</i>
         <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
         <label for="icon_prefix">Введите пароль повторно</label>
       </div>
            <?php

             if (isset($_POST['update'])) {

               $newemail = $_POST['email'];
               $newpassword = md5($_POST['password']);

              include 'db.php';
              // update info on users Toble
              $queryupdate = "UPDATE users SET email ='$newemail', password ='$newpassword' WHERE id='$sessid'";
              $result = $connection->query($queryupdate);

              echo "<meta http-equiv='refresh' content='0'; url='editprofile' />";

             }

             ?>
           <div class="center-align">
               <button type="submit" id="confirmed" name="update" class="btn meh button-rounded waves-effect waves-light ">Подтвердить</button>
           </div>

     </div>
   </form>
 </div>
    </div>
  </div>
</div>
    <?php require 'includes/footer.php'; ?>