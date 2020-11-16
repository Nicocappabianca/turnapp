<?php 
require '../framework/fw.php'; 
require '../views/Reservations.php'; 
require '../models/Reservations.php'; 

$reservationsModel = new Reservations(); 
$reservations = $reservationsModel->getAll(); 

$reservationsView = new Reservations();
$reservationsView->reservations = $reservations; 
$reservationsView->render();
