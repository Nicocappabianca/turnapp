<?php
    if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['loged'])) {
        header('Location: Login.php');
        exit;
    }
?>

<link rel="stylesheet" href="../assets/css/shifts.css">

<!-- Swiper JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<?php 
    function toMonth($monthNumber) { 
        switch($monthNumber) { 
            case 1: return 'Enero'; 
            case 2: return 'Febrero'; 
            case 3: return 'Marzo'; 
            case 4: return 'Abril'; 
            case 5: return 'Mayo'; 
            case 6: return 'Junio'; 
            case 7: return 'Julio'; 
            case 8: return 'Agosto'; 
            case 9: return 'Septiembre'; 
            case 10: return 'Octubre'; 
            case 11: return 'Noviembre'; 
            case 12: return 'Diciembre';  
        }
    }
?>

<section id="shifts">
    <div class="container">
        <?php if( count($this->days) > 0 ): ?>
            <h4 class="title text-center mb-4">¡Reserva tu turno en <b><?= $this->companyName ?></b>!</h4>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($this->days as $day): ?>
                        <div class="swiper-slide">
                            <a href="#">
                                <div class="day-item <?= !$day['available'] ? 'not-available' : '' ?>">
                                    <h4><?= explode('.' , $day['date'])[0] ?></h4>
                                    <p><?= toMonth(explode('.' , $day['date'])[1]) ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <h5 class="text-center pt-4"><div class="mb-2">😰</div>Parece que esta empresa aún no ha cargado sus turnos</h5>
            <p class="text-center">Te recomendamos que vuelvas más tarde.</p>
        <?php endif; ?>
    </div>
</section>

<script>
const shiftsSwiper = new Swiper('.swiper-container', {
    slidesPerView: 3.4,
    breakpoints: {
        768: {
            slidesPerView: 7.3,
        }, 
        992: {
            slidesPerView: 9.3,
        }, 
        1200: {
            slidesPerView: 11.3,
        }
    }, 
});
</script>