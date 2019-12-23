<?php
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DBNAME','sma');

try{
    $BDD=new PDO('mysql:host='.HOST.';dbname=sma;charset=utf8',USER,PASSWORD);
    $BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    die('Error -> '.$e->getMessage());
}
