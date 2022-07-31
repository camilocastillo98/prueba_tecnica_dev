<?php

require('../Model/conexion.php');
require('controlRutas.php');

$con = new Conexion();
$empleados = $con->consultaEmpleados();

$datos = array(
    "empleados" => $empleados
);

$html = render_view('listaEmpleados.php', $datos);

echo json_encode(array('html' => $html));

?>