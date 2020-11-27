<?php 
require '../framework/fw.php'; 
require '../views/ReservationsList.php'; 
require '../models/Reservations.php'; 

if(!isset($_SESSION)) session_start();

if( isset($_SESSION['userId']) ) { 
    $reservationsModel = new Reservations(); 

    $pastReservations = $reservationsModel->getPastReservations($_SESSION['userId']);
    $nextReservations = $reservationsModel->getNextReservations($_SESSION['userId']); 

    $reservationsView = new ReservationsList();
    $reservationsView->pastReservations = $pastReservations;
    $reservationsView->nextReservations = $nextReservations; 
    $reservationsView->render();
}