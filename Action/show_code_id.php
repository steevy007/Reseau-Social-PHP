<?php
$code;
if(isset($_GET['id_code'])){
$code=get_code_by_id($_GET['id_code']);
}else{
    $code='';
}