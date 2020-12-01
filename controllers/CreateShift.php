<?php 
require '../framework/fw.php'; 
require '../models/Shifts.php'; 

if(!isset($_SESSION)) session_start();

if( (!empty($_POST['date'])) && (!empty($_POST['time'])) && (!empty($_POST['price']))) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $price = $_POST['price'];
    
    $shiftsModel = new Shifts(); 
    $shiftsModel->createShift($_SESSION['companyId'], $date, $time, $price); 

    header('Location: Admin.php');
}