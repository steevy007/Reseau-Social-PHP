
<?php 

  require('./Config/database.php');
  require('./File/fonction.php');
  require('./Filter/c_user.php');
  require('./partials/_head.php') ;
  require('./Action/Profil_Affich_User_info.php');
  require('./Action/Post_traitement.php');
?>
    <!--NAVBAR-->
    <?php require('./partials/_navbar.php') ?>
    <div class="container0">
      
    <div class="contenue">
        <div class="row">
          <div class="col-sm-6 ">

          <div class="card border-light mb-3 ">
            <div class="card-header"><h4>Profil de <?=$data->pseudo?></h4></div>
            <div class="card-body ">
              <div class="row">
                <div class="col col-md-12 ">
                    <img class="rounded-circle" src="<?= add_gravatar($data->email) ?>" alt="" style="width:25%">
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
          
          <div class="col-md-6 col-sm-12">
        <?php if($_SESSION['identifiant']['id']==$_GET['id']) :?>
          <form id="code"  method="GET" data-parsley-validate>
          
            <div class="satus-bar">
              <div class="row">

                <div class="col-md-12">
                  
                  <textarea data-parsley-trigger="keypress" data-parsley-minlength="3" minlenght="3" maxlength="150" data-parsley-maxlength="150" class="hoverable z-depth-1" id="area" required placeholder="Ajouter votre Status" name="post"></textarea>
               
                </div>

              </div>

              <div class="row">
                <div class="col-md-12 col-sm-12 text-right">
                <button type="submit" class="btn btn-elegant" name="sub"><i class="fas fa-paper-plane pr-2" aria-hidden="true"></i>User</button>
                </div>
              </div>
            </div>
            </form>
        <?php endif;?>
            <div class="row mt-4 pan">
            <div class="col-md-12 col-sm-12">
            <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title"><img class="rounded-circle" src="<?= add_gravatar($data->email) ?>" alt="" style="width:5%"> <?= $data->pseudo ?></h5>
              <p class="card-text">Message</p>
              <p class="card-text"><small class="text-muted">Date</small></p>
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