<?php
$error=[];
if(!empty(get_session_user_info('id'))){
    if(isset($_POST['submit'])){
        
        extract($_POST);

        

        //die($job);
        if(!empty($nom) && !empty($prenom) && !empty($ville) && !empty($pays) && !empty($sexe) && !empty($date_n)){
            
            $newformat = date( "Y-m-d", strtotime( $date_n ) );
            $checkbox=0;
            if(strlen(var_protect(var_protect($nom)))<3){
                $error[]="Nom trop Court";
            }

            if(strlen(var_protect(var_protect($prenom)))<3){
                $error[]="Prenom trop court";
            }

            if(strlen(var_protect(var_protect($ville)))<5){
                $error[]="Nom de la ville trop court";
            }

            if(strlen(var_protect(var_protect($pays)))<3){
                $error[]="Nom du pays trop court";
            }

            if(date('Y-m-d')<$newformat){
                $error[]="Date de Naissance Invalide";
            }

            if(isset($job)){
                $checkbox=1;
                
            }else{
                $checkbox=0;
                
            }

            if(count($error)==0){

                if(update_users_info($_SESSION['identifiant']['id'],$nom,$prenom,$ville,$pays,$github,$twitter,$date_n,$sexe,$message)){
                    $_SESSION['notification']=[];
                    
                    flash_message("Votre Profil a ete mise a jour!!!!!!!",'success');
                    header("Location:./profil.php?id=".$_SESSION['identifiant']['id']);
                    exit();
                }else{

                }
                
            }else{
                
            }


        }else{
            $error[]="Veuillez remplir tout les champs";
            save_data();
            
        }
    }else{
        clear_data();
        //$_SESSION=[];
    }
}