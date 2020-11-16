<link rel="stylesheet" href="../assets/css/home.css">

<section id="home" class="text-center pt-4">
    <h1>HACE TUS RESERVAS MÁS FÁCIL</h1>
    <h3>Elegí la empresa, el día, el horario ¡y listo!</h3>
    <div class="container mt-4">
        <?php foreach($this->reservations as $reservation): ?>
            <div class="swiper-slide company-item">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $reservation['id_user'] ?></h5>
                        <p class="card-text"><?= $reservation['id_turn'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</section>

