
<?php 

require('./Config/database.php');
require('./Filter/c_user.php');
require('./partials/_head.php') ;
require('./File/fonction.php');
require('./Action/Profil_traitement.php');
require('./Action/Profil_Affich_User_info.php');
?>
  <!--NAVBAR-->
  <?php require('./partials/_navbar.php') ?>
  <div class="container0">
    
  <div class="contenue">
      <div class="row">

        <div class="col-sm-8 offset-sm-2 ">
                <div class="card border-light mb-3" >
        <div class="card-header"><h4>Completer mon profil</h4></div>
        <div class="card-body">
          <div class="row">
            <div class="col col-sm-12">
              <?php include('./partials/_errors.php')?>
            </div>
          </div>
        <form class="text-center" style="color: #757575;"  id="form" data-parsley-validate="" method="POST">

          <div class="row">
            <div class="col-md-6 col-sm-12">
               <!-- Name -->
              <div class="md-form mt-3">
                  <input type="text" value="<?=get_data('nom')?: $data->nom?>" data-parsley-trigger="keypress" id="materialSubscriptionFormPasswords" class="form-control" name="nom" required>
                  <label for="materialSubscriptionFormPasswords"><i class="fas fa-pen"></i> Nom</label >
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
             <!-- Name -->
              <div class="md-form mt-3">
                  <input type="text" value="<?=get_data('prenom')?:$data->prenom ?>" data-parsley-trigger="keypress" id="materialSubscriptionFormPasswords" class="form-control" name="prenom" required>
                  <label for="materialSubscriptionFormPasswords"><i class="fas fa-pen-alt"></i> Prenom</label>
              </div>
            </div>
          </div>
         

          <div class="row">
            <div class="col col-md-6">
               <!-- Name -->
              <div class="md-form mt-3">
                  <input type="text" value="<?=get_data('ville')?:$data->ville?>" data-parsley-trigger="keypress" id="materialSubscriptionFormPasswords" class="form-control" name="ville" required>
                  <label for="materialSubscriptionFormPasswords"><i class="fas fa-city"></i> Ville</label>
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
             <!-- Name -->
              <div class="md-form mt-3">
                  <input type="text" value="<?=get_data('pays')?:$data->pays?>" data-parsley-trigger="keypress" id="materialSubscriptionFormPasswords" class="form-control" name="pays" required>
                  <label for="materialSubscriptionFormPasswords"><i class="fas fa-globe"></i> Pays</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-6">
               <!-- Name -->
              <div class="md-form mt-3">
                  <input type="text" value="<?=get_data('github')?:$data->github?>" data-parsley-trigger="keypress" id="materialSubscriptionFormPasswords" name="github" class="form-control">
                  <label for="materialSubscriptionFormPasswords"><i class="fab fa-github"></i> Github</label>
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
             <!-- Name -->
              <div class="md-form mt-3">
                  <input type="text" value="<?=get_data('twitter')?:$data->twitter?>" data-parsley-trigger="keypress" id="materialSubscriptionFormPasswords" name="twitter" class="form-control">
                  <label for="materialSubscriptionFormPasswords"><i class="fab fa-twitter"></i> Twitter</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-6">
            <div class="md-form mt-3">
                  <input type="date" value="<?=get_data('date_n')?:$data->date_n?>"  id="materialSubscriptionFormPasswords" name="date_n" class="form-control" required>
                  <label for="materialSubscriptionFormPasswords"><i class="far fa-calendar-alt"></i> Date de Naissance</label>
              </div>
            </div>

            <div class="col col-md-6 ">
              <label for=""></label>
                              <!-- Group of default radios - option 1 -->
            <select class="custom-select custom-select-sm" name="sexe" required>
            <option value="H" <?= $data->sexe='H'?'selected':'' ?> >Homme</option>
            <option value="F" <?= $data->sexe='F'?'selected':'' ?> >Femme</option>
          </select>
            </div>
          </div>

          

          <div class="row mb-4 mt-4">
            <div class="col col-sm-12">
              <!-- Default unchecked -->
              <div class="custom-control custom-checkbox text-left">
                  <input type="checkbox"  class="custom-control-input" id="defaultUnchecked" name="boum">
                  
                  <label class="custom-control-label" for="defaultUnchecked"><i class="fas fa-briefcase"></i> Disponible pour Emploi</label>
              </div>
            </div>
          </div>

         


          <div class="row">
            <div class="col col-md-12">
            <div class="form-group shadow-textarea">
            <textarea data-parsley-trigger="keypress" name="message" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="10" placeholder="Votre Description..."><?=get_data('message')?:$data->description?></textarea>
          </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 text-right">
            <button class="btn btn-primary btn-rounded btn-lg z-depth-0 my-4 waves-effect" type="submit" name="submit">Sign in</button>
            </div>
          </div>

      </form>
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