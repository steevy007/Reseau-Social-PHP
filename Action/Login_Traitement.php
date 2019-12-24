<?php
require ('./Config/database.php');
require ('./File/fonction.php');
$error=[];
if(isset($_POST['sign'])){
    if(!empty($_POST['identifiant'] && !empty($_POST['password']))){
        extract($_POST);

        if(strlen(var_protect($password))>8){
            $error[]="Mot de passe trop long";
        }

        if(count($error)==0){
            if(connecter(var_protect($identifiant),var_protect(sha1($password)))){

                redirect_unload('./profil.php?id='.$_SESSION['identifiant']['id']);
                //header('Location:./profil.php?id='.$_SESSION['identifiant']['id']);
            }else{
                save_data();
                $error[]="Donnee Incorrect";
            }
        }else{
            save_data();
        }

    }else{
        $error[]="Veuillez remplir tout les champs";
    }
}else{
    clear_data();
}