<?php

require('Model/conexion.php');

$con = new Conexion();

$empleados = $con->consultaEmpleados();
$areas     = $con->consultaAreas();
$roles     = $con->consultaRoles();

require('Views/administrador.php');

?>