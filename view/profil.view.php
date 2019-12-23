
<?php 

  require('./Config/database.php');
  require('./Filter/c_user.php');
  require('./partials/_head.php') ;
  require('./File/fonction.php');
  require('./Action/Profil_Affich_User_info.php');
?>
    <!--NAVBAR-->
    <?php require('./partials/_navbar.php') ?>
    <div class="container0">
      
    <div class="contenue">
        <div class="row">
          <div class="col-sm-5 ">

          <div class="card border-light mb-3 ">
            <div class="card-header"><h4>Profil de Nom</h4></div>
            <div class="card-body ">
              <div class="row">
                <div class="col col-md-12 ">
                    <img class="rounded-circle" src="<?= add_gravatar($_SESSION['identifiant']['email']) ?>" alt="" style="width:25%">
                    <div class="row mt-4">

                      <div class="col col-sm-6">
                        <h6><i class="fas fa-book-reader"></i> <?=$data->pseudo?></h6>
                        <h6><i class="fas fa-book-open"></i> <?=$data->nom." ".$data->prenom?></h6>
                        <h6><i class="fas fa-envelope"></i> <a href="mailto:<?=$data->email?>"><?=$data->email?></a></h6>
                        <?=$data->pays && $data->ville ? "<h6><i class='fas fa-map-marked-alt'></i> $data->pays - $data->ville</h6>" :''?>
                        <?=$data->pays ? "<h6><i class='fas fa-map-marker-alt'></i> $data->pays</h6>":'' ?>
                      </div>

                      <div class="col col-sm-6">
                        <?=$data->twitter ? "<h6><i class='fab fa-twitter'></i> <a href='//twitter/.$data->twitter' target='_blank'> $data->twitter</a> </h6>":'' ?>
                        <?=$data->github ? "<h6><i class='fab fa-github'></i><a href='//twitter/.$data->github' target='_blank'> $data->github</a></h6>":'' ?>
                        <i class="fas fa-briefcase"></i><?= $data->job==0 ?' Disponible pour Emploie':' Non Employable'?>
                        
                      </div>

                    </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class=" card card-body bg-light">
                <?=$data->description ?"<span><i>$data->description</i></span>":"<span><i>Description............</i></span>"?>
                </div>
              </div>
            </div>
          </div>
          </div>
          

          
        </div>
    </div>
    </div>
      <!--FOOTER-->
      <?php require('./partials/_footer.php') ?>
</body>
</html>