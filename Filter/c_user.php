<?php
if(!isset($_SESSION['identifiant']['pseudo']) || !isset($_SESSION['identifiant']['id'])){
    $_SESSION['last_url']=$_SERVER['REQUEST_URI'];
    flash_message("Vous devez dabord vous connectez",'warning');
    header('Location:./login.php');
    exit();
}