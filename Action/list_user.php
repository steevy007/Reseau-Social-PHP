<?php
$req=$BDD->query("SELECT * from users");

$nbre_total_articles = $req->rowCount();

$nbre_articles_par_page = 25;

$nbre_pages_max_gauche_et_droite = 4;

$last_page = ceil($nbre_total_articles / $nbre_articles_par_page);
$pagination = "<nav class='text-center' aria-label='Page navigation example'>
<ul class='pagination pg-blue'>";

if(isset($_GET['page']) && is_numeric($_GET['page'])){
    $page_num = $_GET['page'];
} else {
    $page_num = 1;
}

if($page_num < 1){
    $page_num = 1;
} else if($page_num > $last_page) {
    $page_num = $last_page;
}

$limit = 'LIMIT '.($page_num - 1) * $nbre_articles_par_page. ',' . $nbre_articles_par_page;

$sql =$BDD->query("SELECT * FROM users ORDER BY id DESC $limit");
$data=$sql->fetchAll(PDO::FETCH_OBJ);


if($last_page != 1){
    if($page_num > 1){
        $previous = $page_num - 1;
        $pagination .= '<a href="./list_user.php?page='.$previous.'">Précédent</a> &nbsp; &nbsp;';

        for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
            if($i > 0){
                //$pagination .= '<a href="./list_user.php?page='.$i.'">'.$i.'</a> &nbsp;';
                $pagination.="&nbsp<li class='page-item'> <a class='page-item' href='./list_user.php?page=$i'>$i</a></li>&nbsp";
            }
        }
    }

    $pagination .= '<span class="active">'.$page_num.'</span>&nbsp;';

    for($i = $page_num+1; $i <= $last_page; $i++){
        $pagination.="&nbsp<li class='page-item'> <a class='page-item' href='./list_user.php?page=$i'>$i</a></li>&nbsp";
        
        if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
            break;
        }
    }

    if($page_num != $last_page){
        $next = $page_num + 1;
        $pagination .= '<a href="./list_user.php?page='.$next.'">Suivant</a> &nbsp; &nbsp;';
    }
}
$pagination.="</ul>
</nav>";
