<link rel="stylesheet" href="/turnapp/assets/css/admin.css">

<section id="admin">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 offset-lg-3 col-lg-2 text-center text-lg-right">
                <img class="profile-picture" src="<?= $_SESSION['companyImg'] ?>" alt="<?= $_SESSION['companyName'] ?>">
            </div>
            <div class="col-12 col-lg-6 text-center text-lg-left pt-3 pt-lg-0 profile-info">
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
                            </tr>
                            <tbody>
                                <?php foreach($this->reservationsBusy as $reservation): ?>
                                    <tr>
                                        <td><?= $reservation['name'] . ' ' .  $reservation['surname'] ?></td>
                                        <td><?= explode('-' , $reservation['date'])[2] ?>/<?= explode('-' , $reservation['date'])[1] ?>/<?= explode('-' , $reservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $reservation['time'])[0] ?>:<?= explode(':' , $reservation['time'])[1] ?> hs.</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="no-reservations">
                        <h5>Nada por aquí 🤷‍♂️</h5>
                        <p>Parece que no tenes turnos reservados</p>
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
                            </tr>
                            <tbody>
                                <?php foreach($this->reservationsAvailable as $reservation): ?>
                                    <tr>
                                        <td><?= explode('-' , $reservation['date'])[2] ?>/<?= explode('-' , $reservation['date'])[1] ?>/<?= explode('-' , $reservation['date'])[0] ?></td>
                                        <td><?= explode(':' , $reservation['time'])[0] ?>:<?= explode(':' , $reservation['time'])[1] ?> hs.</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="no-reservations">
                        <h5>Nada por aquí 🤷‍♂️</h5>
                        <p>Parece que no tenes turnos creados</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>  
</section>

<section id="new-shift" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 offset-lg-4">
                <h2 class="text-center pb-2">Nuevo turno</h2>
                <form class="pt-3" action="crear-turno" method="post">
                    <div class="form-content">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input onchange="handleChange(event);" type="date" class="form-control" name="date" placeholder="Ingrese fecha">
                            <p id="date-error" class="d-none">¡No puede ser anterior a hoy!</p>
                        </div>
                        <div class="form-group mt-4 mt-lg-0">
                            <label for="time">Hora</label>
                            <select class="form-control" name="time">
                                <?php foreach($this->schedules as $schedule): ?>
                                    <option value="<?= $schedule ?>"><?= $schedule ?></option> 
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <button id="btn-create" type="submit" class="btn btn-success mt-4">Crear turno</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    const isFutureDate = (idate) => { 
        const today = moment();  
        return(moment(idate).isSameOrAfter(today, 'day'));
    }

    const handleChange = (e) => { 
        const error = document.getElementById('date-error'); 
        const button = document.getElementById('btn-create');

        if( !isFutureDate(e.target.value) ) { 
            error.classList.add('d-block'); 
            error.classList.remove('d-none');

            button.classList.add('btn-disabled'); 
        }else {  
            error.classList.remove('d-block'); 
            error.classList.add('d-none');  
            
            button.classList.remove('btn-disabled'); 
        }
    }
</script>