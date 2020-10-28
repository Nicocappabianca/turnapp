<?php

// controller/empresa

require '../framework/fw.php'
require '../models/empresas.php'
require '../views/listadoEmpresas.php'

$e = new Empresa();
$all = $e->getAll();

$v = new ListadoEmpresas();
$v->empresa = $all;
$v->render()