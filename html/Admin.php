<link rel="stylesheet" href="../assets/css/home.css">

<div class="container">
    <h1>Panel administrador de <?= $_SESSION['companyName'] ?></h1>
    <img src="<?= $_SESSION['companyImg'] ?>" alt="Company image">
</div>

<section id="reservations" class="text-center">
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Próximas</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pasadas</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php if(count($this->reservationsBusy) > 0): ?>
                    <div class="table-responsive">   
                        <h1>Turnos reservados</h1>
                        <table class="table">
                            <tr>
                                <th scope="col">Nombre y apellido</th>
                                <th scope="col">Día</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Precio</th>
                            </tr>
                            <tbody>
                                <?php foreach($this->reservationsBusy as $reservation): ?>
                                    <tr>
                                        <td><?= $reservation['name'] . ' ' .  $reservation['surname'] ?></td>
                                        <td><?= explode('-' , $reservation['date'])[2] ?>/<?= explode('-' , $reservation['date'])[1] ?>/<?= explode('-' , $reservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $reservation['time'])[0] ?>:<?= explode(':' , $reservation['time'])[1] ?> hs.</td>
                                        <td><?= $reservation['price'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="no-reservations">
                        <h5>Nada por aquí 🤷‍♂️</h5>
                        <p>Parece que no tenes turnos reservados</p>
                        <a href="../controllers/Home.php">Ir a crear turnos</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php if(count($this->reservationsAvailable) > 0): ?>
                    <div class="table-responsive">   
                        <h1>Turnos libres</h1>
                        <table class="table">
                            <tr>
                                <th scope="col">Nombre y apellido</th>
                                <th scope="col">Día</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Precio</th>
                            </tr>
                            <tbody>
                                <?php foreach($this->reservationsAvailable as $reservation): ?>
                                    <tr>
                                        <td><?= $reservation['name'] . ' ' .  $reservation['surname'] ?></td>
                                        <td><?= explode('-' , $reservation['date'])[2] ?>/<?= explode('-' , $reservation['date'])[1] ?>/<?= explode('-' , $reservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $reservation['time'])[0] ?>:<?= explode(':' , $reservation['time'])[1] ?> hs.</td>
                                        <td><?= $reservation['price'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="no-reservations">
                        <h5>Nada por aquí 🤷‍♂️</h5>
                        <p>Parece que no tenes turnos reservados</p>
                        <a href="../controllers/Home.php">Ir a crear turnos</a>
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

<section>
    <div class="container">
        <button class="btn btn-primary">Agregar turno</button>
    </div>
</section>