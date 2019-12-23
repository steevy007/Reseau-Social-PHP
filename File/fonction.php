<?php
if(!function_exists('is_used')){
    function is_used($table,$cle,$champ){
        global $BDD;
        $req=$BDD->prepare("select $champ from $table where $champ=? ");
        $req->execute(array($cle));

        $value=$req->rowCount();

        if($value==0){
            return false;
        }else{
            return true;
        }

    }
}

if(!function_exists('save_data')){
    function save_data(){
        foreach($_POST as $key=>$value){
            if(strpos($key,'password')===false){
                $_SESSION['input'][$key]=$value;
            }
        }
    }
}

if(!function_exists('get_data')){
    function get_data($key){
        return !empty($_SESSION['input'][$key])
                        ?$_SESSION['input'][$key]
                        :null;
    }
}

if(!function_exists('clear_data')){
    function clear_data(){
        if(isset($_SESSION['input'])){
            $_SESSION['input']=[];
        }
    }
}

if(!function_exists('is_active')){
    function is_active($value){
        $path=$_SERVER['PHP_SELF'];
        $page=basename($path);
        if($page==$value.'.php'){
            return  'active';
        }else{
            return  '';
        }
       
    }
}

if(!function_exists('flash_message')){
  function flash_message($message,$type='info'){
    $_SESSION['notification']['message']=$message;
    $_SESSION['notification']['type']=$type;
  }
}

if(!function_exists('var_protect')){
    function var_protect($value){
        return trim(htmlspecialchars($value));
    }
}

if(!function_exists('Add_users')){
    function Add_users($nom,$prenom,$pseudo,$email,$password){
        global $BDD;
        $req=$BDD->prepare("insert into users(nom,prenom,pseudo,email,password) values(?,?,?,?,?)");
        $req->execute(array($nom,$prenom,$pseudo,$email,sha1($password)));
    }
}

if(!function_exists('Activation_Mail')){
    function Activation_Mail($to,$subject,$pseudo,$email){
        $token=sha1($pseudo.$email);

        ob_start();
        require ('./templates/mail/Activate_mail.tmpl.php');

        $content=ob_get_clean();

        $headers='MINE-Version:1.0' . "\r\n"; 
        $headers.='Content-type: text/html ; charset=iso-8859-1' . "\r\n";

        mail($to,$subject,$content,$headers);
    }
}

if(!function_exists('connecter')){
    function connecter($identifiant,$password){
       global $BDD;

       $req=$BDD->prepare("select * from users where(email=? or pseudo=?) and password=?");
       $req->execute(array($identifiant,$identifiant,$password));
       $data=$req->fetch(PDO::FETCH_OBJ);
       $value=$req->rowCount();

       if($value!=0){
           $_SESSION['identifiant']['pseudo']=$data->pseudo;
           $_SESSION['identifiant']['id']=$data->id;
           $_SESSION['identifiant']['email']=$data->email;
           return true;
       }else{
           return false;
       }
    }
}

if(!function_exists('get_session_user_info')){
    function get_session_user_info($key){
        return $_SESSION['identifiant'][$key];
    }
}

if(!function_exists('is_connect')){
    function is_connect(){
        if(isset($_SESSION['identifiant']['id'])){
            return true;
        }
    }
}


if(!function_exists('is_not_connect')){
    function is_not_connect(){
        if(!isset($_SESSION['identifiant']['id'])){
            return true;
        }
    }
}

if(!function_exists('add_gravatar')){
    function add_gravatar($email){
       return  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) ;
    }
}

if(!function_exists('get_user_infos_by_id')){
    function get_user_infos_by_id($id){
        global $BDD;
        $req=$BDD->prepare("SELECT * FROM users WHERE id=? ");
        $req->execute([$id]);
        if($req AND $req->rowCount()!=0){
            return $req;
        }else{
            return false;
        }
    }
}

if(!function_exists('update_users_info')){
    function update_users_info($id,$nom,$prenom,$ville,$pays,$github,$twitter,$date_n,$sexe,$description){
        global $BDD;
        $req=$BDD->prepare("UPDATE users set nom=?,prenom=?,ville=?,pays=?,github=?,twitter=?,date_n=?,sexe=?,description=? WHERE id=?");
        $req->execute(array($nom,$prenom,$ville,$pays,$github,$twitter,$date_n,$sexe,$description,$id));
        if($req){
            return true;
        }else{
            return false;
        }
    }
}

if(!function_exists('add_Code')){
    function add_Code($code,$id_user){
       global $BDD;
       $req=$BDD->prepare("INSERT into code(code,id_user) VALUES(?,?)");
       $req->execute([$code,$id_user]);
       $req->closeCursor();
       if($req){
           return true;
       }else{
           return false;
       }
    }
}


if(!function_exists('get_last_code_by_id_user')){
    function get_last_code_by_id_user($id_user){
       global $BDD;
       $req=$BDD->prepare("SELECT * FROM code WHERE id_user=? AND add_at=(SELECT max(add_at) FROM code)");
       $req->execute([$id_user]);
       if($req){
           return $req->fetch(PDO::FETCH_OBJ);
       }
}
}

if(!function_exists('get_code_by_id')){
    function get_code_by_id($id){
       global $BDD;
       $req=$BDD->prepare("SELECT * FROM code WHERE id=?");
       $req->execute([$id]);
       $data=$req->fetch(PDO::FETCH_OBJ);
       if($req){
           return $data->code;
       }
}
}

if(!function_exists('lister_user')){
    function lister_user(){
       global $BDD;
       $req=$BDD->query("SELECT * FROM  users");
       $data=$req->fetchAll(PDO::FETCH_OBJ);
       //$req->execute();
       if($req){
           return $data;
       }
}
}