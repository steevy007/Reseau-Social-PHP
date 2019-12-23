
<?php 

require('./Config/database.php');
require('./partials/_head.php') ;
require('./File/fonction.php');
require('./Action/list_user.php');
?>
  <!--NAVBAR-->
  <?php require('./partials/_navbar.php') ?>

  <div class="container0">
  <h1>Liste des utilisateurs</h1>
  <?php foreach(array_chunk($data,4) as $user_d) :?>
    <div class="row mb-4 text-center ">
        <?php foreach($user_d as $user) :?>
            <div class="col-md-3 col-sm-3 user-b ">
                <a href="./profil.php?id=<?= $user->id ?>" ><img src="<?=add_gravatar($user->email)?>" class="rounded-circle"   style="width:35%"></a>
                <h4 class="mt-2 text-center">
                    <a href="./profil.php?id=<?= $user->id ?>"><?=$user->sexe=='H'? "<i class='fas fa-male'></i> ":"<i class='fas fa-female'></i> "?><?=  $user->pseudo?></a>
                </h4>
            </div>
        <?php endforeach ;?>
     </div>
  <?php endforeach ;?>
            <div class="container"><?=$pagination?></div>
  </div>

  </div>

    <!--FOOTER-->
    <?php require('./partials/_footer.php') ?>
</body>
</html>