<?php
if(isset($_SESSION['identifiant']['pseudo']) || isset($_SESSION['identifiant']['id'])){
    header('Location:./profil.php?id='.$_SESSION['identifiant']['id']);
}