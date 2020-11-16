<section id="shifts">
    <?php foreach($this->shifts as $shift): ?>
        <div class="d-block border my-1">
            <?php 
                $dateTime = new DateTime($shift['date_time']); 
                $date = $dateTime->format('n.j.Y'); 
                $time = $dateTime->format('H:i'); 
            ?>
            <p>Dia: <?= $date ?></p>
            <p>Hora: <?= $time ?> hs.</p>
            <p>Precio: <?= $shift['price'] ?></p>
        </div>
    <?php endforeach; ?>
</section>