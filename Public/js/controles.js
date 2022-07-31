function consListadoUsuarios(){

    $.ajax({
        url:'/prueba_tecnica_dev_2/Controller/listadoUsuarios.php',
        type: 'POST',
        dataType:'json',
        data: $("#formLogueo").serialize(),
        success: function(datos){
            if(datos.html != ''){
                console.log(datos.html)
                $("#listadoEmpleados").html(datos.html);
            }
        }
    })
    
}

function modificarRegistroEmpleado(id){

    $.ajax({
        url:'/prueba_tecnica_dev_2/Controller/controlUsuarios.php',
        type: 'POST',
        dataType:'json',
        data: 'accion=actualizar&id='+id,
        success: function(datos){
            abrirModal(datos.head, datos.body, datos.footer);
        }
    })
}

function abrirModal(head = '', body = '', footer = '')
{
    $("#modalGeneral").find('.modal-title').html(head);
    $("#modalGeneral").find('.modal-body').html(body);
    $("#modalGeneral").find('.modal-footer').html(footer);
    
    $("#modalGeneral .modal-close").off().on("click", function(){
        $(this).closest('.modal').modal('hide');
    });

    $("#modalGeneral").modal('show');
}

function actualizaDatos(id){

    var nombre = $("#nombreActualizar").val()
    var email  = $("#validaEmailActu").val()
    var error  = '';

    if(nombre == ''){
        alert('Ingrese el nombre')
        error ++
    }
    
    if(email == '0'){
        alert('Ingrese un email valido')
        error ++
    }

    if(error == ''){
        $.ajax({
            url:'/prueba_tecnica_dev_2/Controller/controlUsuarios.php',
            type: 'POST',
            dataType:'json',
            data: 'accion=actuRegistro&id='+id+'&'+$("#formActualizacionDatos").serialize(),
            success: function(datos){
                if(datos.cantidad > 0){
                    alert('Se actualizo la información correctamente');
                    location.reload();
                }
            }
        })
    }
}   

function guardaNuevoEmpleado(){

    var nombre = $("#nombreNuevoEmpleado").val()
    var email  = $("#validaEmail").val() 
    var area   = $("#areaNuevoEmpleado").val()
    var descrp = $("#descripcionNuevoEmpleado").val()
    var error  = '';

    if(nombre == ''){
        alert('Digite el nombre')
        error ++
    }

    if(email == '0'){
        alert('Ingrese un email valido')
        error ++
    }
    
    if(area == ''){
        alert('Seleccione el area')
        error ++
    }

    if(descrp == ''){
        alert('Ingrese una descripcion')
        error ++
    }
    
    if($(".seleccionRoles").is(":checked") == false){
        alert('Seleccione minimo un rol')
        error ++
    }

    if($(".rdSexo").is(":checked") == false){
        alert('Seleccione el sexo')
        error ++
    }

    if(error == ''){

        $.ajax({
            url:'/prueba_tecnica_dev_2/Controller/controlUsuarios.php',
            type: 'POST',
            dataType:'json',
            data: 'accion=nuevoRegistro&'+$("#formCreacionEmpleado").serialize(),
            success: function(datos){
                if(datos.cantidad > 0){
                    alert('Se actualizo la información correctamente');
                    location.reload();
                }
            }
        })
    }
}

function validarEmail(dato){

    var email = '';

    if(dato == '1'){
        email = $("#correoNuevoEmpleado").val()
    }else if(dato == '2'){
        email = $("#emailActualizar").val()
    }

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(email)) {
        if(dato == '1'){
            $("#mensajeValEmail").html('<u style="color:green">Correo Valido</u>');
            $("#validaEmail").val('1');
        }else if(dato == '2'){
            $("#mensajeValEmailActu").html('<u style="color:green">Correo Valido</u>');
            $("#validaEmailActu").val('1');
        }
    } else {
        if(dato == '1'){
            $("#mensajeValEmail").html('<u   style="color:red">Correo Invalido</u>');
        }else if(dato == '2'){
            $("#mensajeValEmailActu").html('<u   style="color:red">Correo Invalido</u>');
            $("#validaEmailActu").val('1');
        }
    }
}

function eliminarRegistroEmpleado(id){

    if(window.confirm("Seguro que desea eliminar este registro?")) {
        $.ajax({
            url:'/prueba_tecnica_dev_2/Controller/controlUsuarios.php',
            type: 'POST',
            dataType:'json',
            data: 'accion=eliminaReg&id='+id+'&'+$("#formActualizacionDatos").serialize(),
            success: function(datos){
                if(datos.cantidad > 0){
                    alert('Se elimino el empleado correctamente');
                    location.reload();
                }
            }
        })
    }
}