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
    </div>
</section>

<script>
const shiftsSwiper = new Swiper('.swiper-container', {
    slidesPerView: 4,
    breakpoints: {
        768: {
            slidesPerView: 6,
        }, 
        992: {
            slidesPerView: 8,
        }
    }, 
});
</script>