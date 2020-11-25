<?php 
require '../framework/fw.php';  
require '../models/Shifts.php';

$shiftsModel = new Shifts(); 
$schedules = $shiftsModel->getSchedules($_GET['companyId'], $_GET['date']);

$schedulesArray = []; 

foreach($schedules as $schedule) { 
    $scheduleObject = new stdClass(); 
    $scheduleObject->id = $schedule['id'];
    $scheduleObject->time = $schedule['time']; 
    array_push($schedulesArray, $scheduleObject); 
}

$schedulesObject = new stdClass(); 
$schedulesObject->schedules = $schedulesArray; 

echo json_encode($schedulesObject); 