<?php
    session_start();
    
    if(!isset($_SESSION['loged'])) {
        header('Location: Login.php');
        exit;
    }
?>

<link rel="stylesheet" href="../assets/css/home.css">

<section id="home" class="text-center pt-4">
    <h1>TUS RESERVAS</h1>
    <div class="container mt-4">
        <?php foreach($this->reservations as $reservation): ?>
            <div class="swiper-slide company-item">
                <div class="card">
                    <img class="card-img-top" src="<?= $reservation['url_image']?>" alt="<?= $reservation['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $reservation['name'] ?></h5>
                        <p class="card-text">Fecha: <?= $reservation['date_time'] ?></p>
                        <p class="card-text">Dirección: <?= $reservation['address'] ?></p>
                        <p class="card-text">Precio: <?= $reservation['price'] ?></p>

                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</section>

