<?php
$req=get_user_infos_by_id($_GET['id']);
if($req==false){
    header('Location:../profil.php?id='.$_SESSION['identifiant']['id']);
}else{
    $req=get_user_infos_by_id($_GET['id']);
    $data=$req->fetch(PDO::FETCH_OBJ);
}
