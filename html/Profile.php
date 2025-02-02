<?php
    if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['loged'])) {
        header('Location: iniciar-sesion');
        exit;
    }
?>

<link rel="stylesheet" href="<?= $base_url ?>/assets/css/profile.css">

<section id="profile">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-lg-3 col-lg-2 text-center text-lg-right">
                <img class="profile-picture" src="https://www.gravatar.com/avatar/<?= $this->gravatar ?>?d=https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="<?= $this->userName .' '. $this->userSurname ?>">
            </div>
            <div class="col-12 col-lg-6 text-center text-lg-left pt-3 pt-lg-0 profile-info">
                <h2><?= $this->userName ?> <?= $this->userSurname?></h2>
                <p class="profile-email"><?= $this->userEmail ?></p>
            </div>
        </div>
    </div>
</section>
