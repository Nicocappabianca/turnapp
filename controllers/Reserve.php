<?php 
require '../framework/fw.php';  
require '../models/Reservations.php';
require '../models/Shifts.php';

$reservationsModel = new Reservations(); 

if( !empty($_POST['userId']) && !empty($_POST['shiftId']) && !empty($_POST['companyId']) ) { 
    $userId = $_POST['userId']; 
    $shiftId = $_POST['shiftId'];
    $companyId = $_POST['companyId'];

    $reservationsModel->postReservation($userId, $shiftId); 

    $shiftsModel = new Shifts(); 
    $shiftsModel->disableShift($companyId, $shiftId); 
} 