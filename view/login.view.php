
<?php 
    require('./Filter/d_user.php');
       require('./Action/Login_Traitement.php');
        require('./partials/_head.php') ;
        
?>
    <!--NAVBAR-->
    <?php require('./partials/_navbar.php') ?>
    <div class="container0">
    <div class="contenue">
       <div class="row">
           <div class="col col-md-4 offset-md-4">
            <!-- Default form login -->
<form class="text-center border border-light p-5" action="#!" id="form" method="POST">

<p class="h4 mb-4"><i class="fas fa-sign-in-alt fa-3x"></i></p>

<!-- Email -->
<input type="text" data-parsley-trigger="keypress" value="<?= get_data('identifiant') ?>" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail Or Pseudo" required name="identifiant">

<!-- Password -->
<input type="password" data-parsley-trigger="keypress" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" required name="password">

<div class="d-flex justify-content-around">
    <div>
        <!-- Remember me -->
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
            <label class="custom-control-label mb-4" for="defaultLoginFormRemember">Remember me</label>
        </div>
    </div>
    <div>
        <!-- Forgot password -->
        <a href="">Forgot password?</a>
    </div>
</div>
<?php include('./partials/_errors.php') ?>
<!-- Sign in button -->
<button class="btn btn-info btn-block my-4" type="submit" name="sign">Sign in</button>




</form>
<!-- Default form login -->
           </div>
       </div>
    </div>
    </div>
      <!--FOOTER-->
      <?php require('./partials/_footer.php') ?>
</body>
</html>