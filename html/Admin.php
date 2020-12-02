<link rel="stylesheet" href="../assets/css/admin.css">

<section id="admin">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 offset-md-3 col-md-2 text-center text-md-right">
                <img class="profile-picture" src="<?= $_SESSION['companyImg'] ?>" alt="<?= $_SESSION['companyName'] ?>">
            </div>
            <div class="col-12 col-md-6 text-center text-md-left pt-3 pt-lg-0 profile-info">
                <h2><?= $_SESSION['companyName'] ?></h2>
                <p class="subtitle">Panel de administrador</p>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Reservas</a>
                <a class="nav-item nav-link" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab" aria-controls="nav-admin" aria-selected="false">Turnos disponibles</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php if(count($this->reservationsBusy) > 0): ?>
                    <div class="table-responsive">   
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
            <div class="tab-pane fade" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
                <?php if(count($this->reservationsAvailable) > 0): ?>
                    <div class="table-responsive">   
                        <table class="table">
                            <tr>
                                <th scope="col">Día</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Precio</th>
                            </tr>
                            <tbody>
                                <?php foreach($this->reservationsAvailable as $reservation): ?>
                                    <tr>
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
        </div>
    </div>  
</section>

<section id="new-shift" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 offset-md-4">
                <h2 class="text-center pb-2">Nuevo turno</h2>
                <form class="pt-3" action="../controllers/CreateShift.php" method="post">
                    <div class="form-content">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" class="form-control" name="date" placeholder="Ingrese fecha">
                        </div>
                        <div class="form-group">
                            <label for="time">Hora</label>
                            <select class="form-control" name="time">
                                <?php foreach($this->schedules as $schedule): ?>
                                    <option value="<?= $schedule ?>"><?= $schedule ?></option> 
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="price" class="form-control" name="price" placeholder="Ingrese precio">
                    </div> -->
                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-success mt-3">Crear turno</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>