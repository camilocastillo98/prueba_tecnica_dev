<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Public/js/controles.js"></script>
    <!-- <script src="Public/css/alertify.css"></script>  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8"/>
    <!-- Bootstrap CSS -->
</head>
<body>
    <diV class="container">
        <div class="col-12">
            <br>
            <ul class="nav nav-tabs" id="myTabEmpleados" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="listadoEmp-tab" onclick="consListadoUsuarios()" data-toggle="tab" href="#listadoEmpleados" role="tab" aria-controls="empledos" aria-selected="true">Lista de empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="liNuevoEmpleado" data-toggle="tab" href="#crearEmpleado" role="tab" aria-controls="nuevoEmpleado" aria-selected="true">Crear Empleado</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show" id="listadoEmpleados" role="tabpanel" aria-labelledby="home-tab">
                    
                </div>
                <div class="tab-pane fade show" id="crearEmpleado" role="tabpanel" aria-labelledby="home-tab"><br>
                <form nme="formCreacionEmpleado" id="formCreacionEmpleado" method="POST">
                    <div class="alert alert-primary" role="alert">
                        Los campos con asteriscos (*) son obligatorios
                    </div>
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Nombre Completo *</label>
                        </div>
                        <div class="col-7">
                            <input type="text" placeholder="Nombre complero del empleado" class="form-control" name="nombreNuevoEmpleado" id="nombreNuevoEmpleado">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Correo Electronico *</label>
                        </div>
                        <div class="col-7">
                            <input type="text" onblur="validarEmail(1)" placeholder="Correo Electronico" class="form-control" name="correoNuevoEmpleado" id="correoNuevoEmpleado">
                            <div id="mensajeValEmail"></div>
                            <input type="hidden" id ="validaEmail" value="0">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Sexo *</label>
                        </div>
                        <div class="col-7">
                            <input type="radio" class="rdSexo" name="sexoNuevoEmpleado" value="M" id="sexoNuevoEmpleadoM"> Masculino<br>
                            <input type="radio" class="rdSexo" name="sexoNuevoEmpleado" value="F" id="sexoNuevoEmpleadoF"> Femenino<br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Area *</label>
                        </div>
                        <div class="col-7">
                            <select name="areaNuevoEmpleado" id="areaNuevoEmpleado" class="form-control">
                                <option value="">--SELECCIONE--</option>
                <?php foreach($areas as $ar): ?>
                                <option value="<?= $ar['id'] ?>"><?= $ar['nombre']?></option>';
                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Descripcion *</label>
                        </div>
                        <div class="col-7">
                            <textarea placeholder="Descripcion de la experiencia del empleado" class="form-control" name="descripcionNuevoEmpleado" id="descripcionNuevoEmpleado"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Roles *</label>
                        </div>
                        <div class="col-7" id="descRoles">
                    <?php foreach($roles as $rl): ?>
                            <input type="checkbox" class="seleccionRoles" value="<?= $rl['id'] ?>" name="rolSel[]">&nbsp;<?= $rl['nombre']?><br>
                    <?php endforeach?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label></label>
                        </div>
                        <div class="col-7">
                            <button type="button" onclick="guardaNuevoEmpleado()" style="width:25%" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                    <br><br><br>
                </form>
                </div>
            </div>
        </div>
    </diV>
    
</div>
</body>    
</html>
