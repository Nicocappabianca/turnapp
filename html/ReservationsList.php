<?php
    if(!isset($_SESSION['loged'])) {
        header('Location: Login.php');
        exit;
    }
?>

<link rel="stylesheet" href="../assets/css/reservations.css">

<section id="reservations" class="text-center">
    <h1>Mis reservas</h1>
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Próximas</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pasadas</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php if(count($this->nextReservations) > 0): ?>
                    <div class="table-responsive">   
                        <table class="table">
                            <tr>
                                <th scope="col">Empresa</th>
                                <th scope="col">Día</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Dirección</th>
                            </tr>
                            <tbody>
                                <?php foreach($this->nextReservations as $nextReservation): ?>
                                    <tr>
                                        <td><?= $nextReservation['name'] ?></td>
                                        <td><?= explode('-' , $nextReservation['date'])[2] ?>/<?= explode('-' , $nextReservation['date'])[1] ?>/<?= explode('-' , $nextReservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $nextReservation['time'])[0] ?>:<?= explode(':' , $nextReservation['time'])[1] ?> hs.</td>
                                        <td><?= $nextReservation['address'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach($this->nextReservations as $nextReservation): ?>
                                    <tr>
                                        <td><?= $nextReservation['name'] ?></td>
                                        <td><?= explode('-' , $nextReservation['date'])[2] ?>/<?= explode('-' , $nextReservation['date'])[1] ?>/<?= explode('-' , $nextReservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $nextReservation['time'])[0] ?>:<?= explode(':' , $nextReservation['time'])[1] ?> hs.</td>
                                        <td><?= $nextReservation['address'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach($this->nextReservations as $nextReservation): ?>
                                    <tr>
                                        <td><?= $nextReservation['name'] ?></td>
                                        <td><?= explode('-' , $nextReservation['date'])[2] ?>/<?= explode('-' , $nextReservation['date'])[1] ?>/<?= explode('-' , $nextReservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $nextReservation['time'])[0] ?>:<?= explode(':' , $nextReservation['time'])[1] ?> hs.</td>
                                        <td><?= $nextReservation['address'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="no-reservations">
                        <h5>Nada por aquí 🤷‍♂️</h5>
                        <p>Parece que no tenes reservas ¡Hace una!</p>
                        <a href="../controllers/Home.php">Ir al inicio</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php if(count($this->pastReservations) > 0): ?>
                    <div class="table-responsive">   
                        <table class="table">
                            <tr>
                                <th scope="col">Empresa</th>
                                <th scope="col">Día</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Dirección</th>
                            </tr>
                            <tbody>
                                <?php foreach($this->pastReservations as $pastReservation): ?>
                                    <tr>
                                        <td><?= $pastReservation['name'] ?></td>
                                        <td><?= explode('-' , $pastReservation['date'])[2] ?>/<?= explode('-' , $pastReservation['date'])[1] ?>/<?= explode('-' , $pastReservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $pastReservation['time'])[0] ?>:<?= explode(':' , $pastReservation['time'])[1] ?> hs.</td>
                                        <td><?= $pastReservation['address'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="no-reservations">
                        <h5>Nada por aquí 🤷‍♂️</h5>
                        <p>Por el momento no tenes reservas pasadas.</p>
                        <a href="../controllers/Home.php">Ir al inicio</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>  
</section>

