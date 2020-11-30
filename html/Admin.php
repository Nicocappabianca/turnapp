<link rel="stylesheet" href="../assets/css/home.css">

<div class="container">
    <h1>Panel administrador de <?= $_SESSION['companyName'] ?> </h1>
</div>

<div class="container mt-4">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($this->reservations as $reservation): ?>
                    <div class="swiper-slide company-item">
                        <div class="card">
                            <img class="card-img-top" src="<?= $reservation['url_image']?>" alt="<?= $reservation['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $reservation['name'] ?></h5>
                                <p class="card-text"><?= $reservation['description'] ?></p>
                                <a href="../controllers/Shifts.php?companyId=<?= $reservation['id'] ?>" class="btn btn-success btn-reserve">Reservar ahora</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</div>