<?php 
require '../framework/fw.php'; 
require '../models/Shifts.php'; 

if(!isset($_SESSION)) session_start();

if( (!empty($_POST['date'])) && (!empty($_POST['time'])) ) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    $shiftsModel = new Shifts(); 
    $shiftsModel->createShift($_SESSION['companyId'], $date, $time); 

    header('Location: Admin.php');
}