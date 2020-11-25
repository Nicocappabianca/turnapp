<?php 
require '../framework/fw.php';  
require '../models/Shifts.php';

$shiftsModel = new Shifts(); 
$schedules = $shiftsModel->getSchedules(1, '2020-11-15');

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