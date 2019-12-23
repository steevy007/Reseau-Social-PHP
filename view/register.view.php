<?php
    require('./Filter/d_user.php');
    require ('./Action/Form_Traitement.php');
?>
<?php require('./partials/_head.php') ?>
<?php require('./partials/_navbar.php') ?>

<div class="container0">

    <div class="contenue">
    
        <div class="row">
            <div class="col col-md-6 offset-md-3">
            <form class="text-center border border-light p-5" action="#!" method="POST" id="form" data-parsley-validate="">

<p class="h4 mb-4"><i class="fas fa-user-plus fa-3x "></i></p>

<div class="form-row mb-4">

    <div class="col">
        <!-- First name -->
        <input type="text"  data-parsley-trigger="keypress" id="defaultRegisterFormFirstName" class="form-control" value="<?= get_data('nom') ?>" placeholder="First name" name="nom" required>
    </div>
    <div class="col">
        <!-- Last name -->
        <input type="text"  data-parsley-trigger="keypress" id="defaultRegisterFormLastName" class="form-control"  value="<?= get_data('prenom') ?>" placeholder="Last name" name="prenom" required>
    </div>
</div>
<input type="text"  data-parsley-trigger="keypress" id="defaultRegisterFormLastName" class="form-control mb-4" value="<?= get_data('pseudo') ?>" placeholder="Pseudo" name="pseudo" required>
<!-- E-mail -->
<input type="email" data-parsley-trigger="keypress" id="defaultRegisterFormEmail" class="form-control mb-4"  value="<?= get_data('email') ?>" placeholder="E-mail" name="email" required>

<!-- Password -->
<input type="password" data-parsley-trigger="keypress" id="Password" class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password" required>

<input type="password" data-parsley-trigger="keypress" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="Cpassword" >


<?php include('./partials/_errors.php') ?>


<!-- Sign up button -->
<button class="btn btn-info my-4 btn-block" type="submit" name="sign">Sign in</button>


<hr>

<!-- Terms of service -->
<p>By clicking
    <em>Sign up</em> you agree to our
    <a href="" target="_blank">terms of service</a>

</form>
<!-- Default form register -->

            </div>
        </div>
    </div>
</div>
<!--FOOTER-->
<?php require('./partials/_footer.php') ?>

</body>
</html>