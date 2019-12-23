<?php
$code;
if(isset($_POST['submit'])){
    extract($_POST);
    if(add_Code(var_protect($code),get_session_user_info('id'))){
        header('Location:./show_code.php');
    }
}