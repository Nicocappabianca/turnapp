<?php 
require '../framework/fw.php'; 
require '../views/Admin.php'; 
require '../models/Reservations.php'; 
require '../models/Companies.php'; 

if(!isset($_SESSION)) session_start();
    
if(!isset($_SESSION['loged'])) {
    header('Location: Login.php');
    exit;
}
if(!isset($_SESSION['isAdmin'])) {
    header('Location: Home.php');
    exit;
}

$reservationsModel = new Reservations(); 
$reservationsAvailable = $reservationsModel->getAllByCompanyAvailable($_SESSION['companyId']); 
$reservationsBusy = $reservationsModel->getAllByCompanyBusy($_SESSION['companyId']); 

$adminView = new Admin();
$adminView->schedules = [
    '00:00',
    '01:00',
    '02:00', 
    '03:00',
    '04:00',
    '05:00',
    '06:00',
    '07:00',
    '08:00', 
    '09:00',
    '10:00',
    '11:00',
    '12:00',
    '13:00',
    '14:00', 
    '15:00',
    '16:00',
    '17:00',
    '18:00',
    '19:00',
    '20:00', 
    '21:00',
    '22:00',
    '23:00',
];
$adminView->reservationsAvailable = $reservationsAvailable; 
$adminView->reservationsBusy = $reservationsBusy; 
$adminView->render();
