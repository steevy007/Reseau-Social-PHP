<?php require('./File/fonction.php'); ?>
<nav class="navbar navbar-expand-sm fixed-top navbar-dark unique-color-dark">
    
    <a class="navbar-brand" href="./index.php">Social Media All</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav navbar-nav ml-auto">
            <?php if(is_not_connect()){ ?>
            <li class="nav-item <?= is_active('register') ?>">
                <a class="nav-link waves-effect waves-light" href="./register.php">Inscription</a>
            </li>
            <li class="nav-item <?= is_active('login') ?>">
                <a class="nav-link waves-effect waves-light" href="./login.php">Connexion</a>
            </li> 
            <?php }?>
            &nbsp&nbsp&nbsp&nbsp
            <?php if(is_connect()){ ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle" style="width:20%" src="<?=add_gravatar($_SESSION['identifiant']['email'])?>" alt="" srcset=""> <?= get_session_user_info('pseudo') ?>
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="./profil.php?id=<?=get_session_user_info('id')?>"><i class="far fa-user-circle"></i> Profil</a>
                <a class="dropdown-item" href="./edit_profil.php?id=<?=get_session_user_info('id')?>"><i class="far fa-user-circle"></i> Editer Profil</a>
                <a class="dropdown-item" href="./share_code.php"><i class="fas fa-code"></i> Share code</a>
                <a class="dropdown-item" href="./logout.php"><i class="fas fa-sign-out-alt"></i> Deconnexion</a>
                </div>
            </li>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <?php }?>


        </ul>
    </div>
</nav>