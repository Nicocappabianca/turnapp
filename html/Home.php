<link rel="stylesheet" href="../assets/css/home.css">

<!-- Swiper JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<section id="home" class="text-center pt-4">
    <h1>HACE TUS RESERVAS MÁS FÁCIL</h1>
    <h3>Elegí la empresa, el día, el horario ¡y listo!</h3>
    <div class="container mt-4">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($this->companies as $company): ?>
                    <div class="swiper-slide company-item">
                        <div class="card">
                            <img class="card-img-top" src="<?= $company['url_image']?>" alt="<?= $company['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $company['name'] ?></h5>
                                <p class="card-text"><?= $company['description'] ?></p>
                                <a href="#" class="btn btn-success btn-reserve">Reservar ahora</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script>
const homeSwiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30, 
    loop: true, 
    pagination: {
        el: '.swiper-pagination',
    },
});
</script>