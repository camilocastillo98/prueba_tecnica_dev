<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/prueba_tecnica_dev_2/Public/js/controles.js"></script>
    <!-- <script src="Public/css/alertify.css"></script>  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8"/>
    <!-- Bootstrap CSS -->
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="col-12">
        <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa fa-user"></i> Nombre</th>
                        <th scope="col"><i class="fa fa-envelope"></i> Email</th>
                        <th scope="col"><i class="fa fa-venus-mars"></i> Sexo</th>
                        <th scope="col"><i class="fa fa-briefcase"></i> Area</th>
                        <th scope="col"><i class="fa fa-address-book"></i> Boletin</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
        <?php foreach($empleados as $e): 
                $sexo = $e['sexo_empleado'] == 'M' ? 'Masculino' : 'Femenino';
                $boletin = $e['boletin_empleado'] == '1' ? 'Si' : 'No'; 
        ?>
                    <tr>
                        <td><?= $e['nombre_empleado'] ?></td>
                        <td><?= $e['email_empleado'] ?></td>
                        <td><?= $sexo ?></td>
                        <td><?= $e['area_empleado'] ?></td>
                        <td><?= $boletin?></td>
                        <td onclick="modificarRegistroEmpleado('<?= $e['id_empleado'] ?>')" style="text-align:center;font-size:19px;cursor:pointer"><i class="fa fa-edit"></i></td>
                        <td onclick="eliminarRegistroEmpleado('<?= $e['id_empleado'] ?>')" style="text-align:center;font-size:19px;cursor:pointer"><i class="fa fa-trash"></i></td>
                    </tr>
        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="modalGeneral" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="width:110%">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <i class="fa fa-close modal-close" style="cursor: pointer;"></i>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
</body>    
</html>