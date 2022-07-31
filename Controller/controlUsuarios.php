<?php

require('../Model/conexion.php');
$con = new Conexion();

if($_POST['accion'] == 'actualizar'){

    $id = $_POST['id'];
    $datos = $con->consultaEmpleados($id);
    $areas = $con->consultaAreas();

    $slcSi = ($datos[0]['boletin_empleado'] == '1') ? 'selected' : '';
    $slcNo = ($datos[0]['boletin_empleado'] == '0') ? 'selected' : '';

    $head = 'Actualizacion Usuario';
    $body = '
        <form id="formActualizacionDatos" name="formActualizacionDatos">
            <div class="col-sm-12">
                <label>NOMBRE</label>
                <input type="text"  name="nombreActualizar" id="nombreActualizar" class="form-control" value="'.$datos[0]['nombre_empleado'].'">
            </div>
            <br>
            <div class="col-sm-12">
                <label>EMAIL</label>
                <input type="text" name="emailActualizar" id="emailActualizar" onblur="validarEmail(2)" class="form-control" value="'.$datos[0]['email_empleado'].'">
                <div id="mensajeValEmailActu"></div>
                <input type="hidden" id ="validaEmailActu" value="1">
            </div>
            <br>
            <div class="col-sm-12">
                <label>AREA</label>
                <select class="form-control" name="areaActualizar" id="areaActualizar">';
        foreach($areas as $ar):
            $selected = ($datos[0]['area_id'] == $ar['id']) ? 'selected' : '';
            $body .= '<option '.$selected.' value="'.$ar['id'].'">'.$ar['nombre'].'</option>';
        endforeach;
    $body .= '
                </select>
            </div>
            <br>
            <div class="col-sm-12">
                <label>BOLETIN</label>
                <select class="form-control" name="boletinActualizar" id="boletinActualizar">
                    <option '.$slcSi.' value="1">SI</option>
                    <option '.$slcNo.' value="0">NO</option>
                </select>
            </div>
        </form>';
    $footer = '<button class="btn btn-success" type="button" onclick="actualizaDatos('.$id.')" type="button">Actualizar</button>';

    echo json_encode(array('head' => $head, 'body' => $body, 'footer' => $footer));
}

if($_POST['accion'] == 'nuevoRegistro'){

    $nombre = (isset($_POST['nombreNuevoEmpleado'])) ? $_POST['nombreNuevoEmpleado'] : ''; 
    $correo = (isset($_POST['correoNuevoEmpleado'])) ? $_POST['correoNuevoEmpleado'] : ''; 
    $sexo   = (isset($_POST['sexoNuevoEmpleado'])) ? $_POST['sexoNuevoEmpleado'] : ''; 
    $area   = (isset($_POST['areaNuevoEmpleado'])) ? $_POST['areaNuevoEmpleado'] : ''; 
    $descripcion = (isset($_POST['descripcionNuevoEmpleado'])) ? $_POST['descripcionNuevoEmpleado'] : ''; 
    $rol = (isset($_POST['rolSel'])) ? $_POST['rolSel'] : ''; 

    $datos = $con->guardaNuevoEmpleado($nombre, $correo, $sexo, $area, $descripcion, $rol);

    echo json_encode(array('cantidad' => $datos));
}

if($_POST['accion'] == 'eliminaReg'){

    $id = $_POST['id'];
    $datos = $con->eliminaEmpleado($id);

    echo json_encode(array('cantidad' => $datos));
}

if($_POST['accion'] == 'actuRegistro'){

    $id      = $_POST['id'];
    $nombre  = (isset($_POST['nombreActualizar'])) ? $_POST['nombreActualizar'] : '';
    $email   = (isset($_POST['emailActualizar'])) ? $_POST['emailActualizar'] : '';
    $area    = (isset($_POST['areaActualizar'])) ? $_POST['areaActualizar'] : '';
    $boletin = (isset($_POST['boletinActualizar'])) ? $_POST['boletinActualizar'] : '';

    $datos = $con->actualizaEmpleado($nombre, $email, $area, $boletin, $id);

    echo json_encode(array('cantidad' => $datos));

}

?>