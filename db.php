<?php

$connection = mysqli_connect('localhost', 'root', '', 'bd');    
// $connection = mysqli_connect('sql7.freemysqlhosting.net', 'sql7619974', 'hD29H3aK8P', 'sql7619974');
if(!$connection) {
    die("Database connection failed");
}
$q = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'";
$connection -> query($q);

?>
