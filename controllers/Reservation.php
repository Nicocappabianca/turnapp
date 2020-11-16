<?php 
require '../framework/fw.php'; 
require '../views/ReservationsList.php'; 
require '../models/Reservations.php'; 

$reservationsModel = new Reservations(); 
$reservations = $reservationsModel->getAll(); 

$reservationsView = new ReservationsList();
$reservationsView->reservations = $reservations; 
$reservationsView->render();
