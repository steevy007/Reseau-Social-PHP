<?php
require ('./Config/database.php');
require ('./File/fonction.php');
    $error=[];
    if(isset($_POST['sign'])){
        if(! empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['Cpassword'])){
            extract($_POST);
            
            if(strlen(var_protect($nom))<3){
                $error[]="Nom trop Court";
            }

            if(strlen(var_protect($prenom))<3){
                $error[]="Prenom trop court";
            }

            if(strlen(var_protect($pseudo))>10){
                $error[]="Nom trop long";
            }else if(is_used('users',var_protect($pseudo),'pseudo')){
                $error[]="Pseudo deja utilise";
            }

            if(!filter_var(var_protect($email),FILTER_VALIDATE_EMAIL)){
                $error[]="Mail Incorrect";
            }elseif(is_used('users',var_protect($email),'email')){
                $error[]="Mail deja utilise";
            }

            if(strlen(var_protect($password))>8){
                $error[]="Mot de passe trop long";
            }elseif(var_protect($password)!=var_protect($Cpassword)){
                $error[]="Mot de passe non identique";
            }
            $nb_err=count($error);
            if($nb_err==0){
                //header('Location:./login.php');

                //inscription
                Add_users($nom,$prenom,$pseudo,$email,$password);
                //envoie Mail
                Activation_Mail('steevesanon6@gmail.com','Mail-Activation',$pseudo,$email);

                header('Location:./register.php');
                $_SESSION=[];
                flash_message("Mail activation envoye avec succes Verifier votre boite Mail!!!!!",'success');
                header('Location:./index.php');
                exit();
            }else{
               save_data();
            }
            
        }else{
            $error="Veuillez remplir tout les champs";
            
        }
    }else{
        clear_data();
    }
?>