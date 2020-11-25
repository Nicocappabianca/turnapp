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
                            <span onclick="loadSchedules('<?= $day['date']; ?>');">
                                <div class="day-item <?= !$day['available'] ? 'not-available' : '' ?>">
                                    <h4><?= explode('.' , $day['date'])[0] ?></h4>
                                    <p><?= toMonth(explode('.' , $day['date'])[1]) ?></p>
                                </div>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="schedules-container">
                <table class="schedules-table table">
                    <tbody id="table-body"></tbody>
                </table>
            </div>
        <?php else: ?>
            <h5 class="text-center pt-4"><div class="mb-2">😰</div>Parece que esta empresa aún no ha cargado sus turnos</h5>
            <p class="text-center">Te recomendamos que vuelvas más tarde.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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

const loadSchedules = (date) => {
    date = date.split(".").reverse().join("."); 
    $('#table-body').empty(); 
    $('#table-body').append('<p style="color: #0773BD; text-align: center; padding-top: 40px;">Cargando horarios disponibles...</p>');
    $.ajax({
        type:'GET', 
        url: '../controllers/Schedules.php', 
        data: { 
            companyId: <?= $this->companyId; ?>, 
            date: date
        }, 
        success: function(res){
            $('#table-body').empty(); 
            let schedulesList = JSON.parse(res);
            let newSchedules = '';

            schedulesList.schedules.forEach(element => {
                newSchedules += `<tr>
                    <td>
                        <b class="mr-1">${(element.time).split(':')[0]}:${(element.time).split(':')[1]}</b> hs.
                        <button class="btn btn-success ml-auto">Reservar</button>
                    </td>
                </tr>`; 
            });

            $('#table-body').append(newSchedules);

        }, 
        error: function() {
            $('#table-body').empty(); 
            $('#table-body').append('<p style="color: #DF2E25; text-align: center; padding-top: 40px;">¡Error! No fue posible cargar los horarios.</p>');
        },
    });
}
</script>