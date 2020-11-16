<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TurnApp</title>
    <link rel="icon" type="image/png" href="../assets/icons/favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Font Lato -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Header styles -->
    <link rel="stylesheet" href="../assets/css/header.css">
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-dark px-lg-5 py-1">
        <a class="navbar-brand" href="/turnapp/controllers/Home.php">
            <img src="../assets/icons/logo.png" width="80" class="d-inline-block align-top" alt="TurnApp">
        </a>
        <button class="navbar-toggler collapsed ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>				
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Ver turnos</a>
                </li>
                <li class="nav-item ml-lg-3">
                    <a class="nav-link text-white" href="/turnapp/controllers/Profile.php">Perfil</a>
                </li>
                <li class="nav-item ml-lg-3">
                    <a class="nav-link text-white" href="#">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
