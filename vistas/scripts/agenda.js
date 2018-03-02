//Función que se ejecuta al inicio
function init(){
    fechaPerdida();
    mostrarform(false);
    listarpendientes();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })

    //Cargamos los items al select contacto
    $.post("../ajax/agenda.php?op=selectContacto", function(r){
                $("#idcontacto").html(r);
                $('#idcontacto').selectpicker('refresh');
    }); 

    //Cargamos los items al select Responsable
    $.post("../ajax/agenda.php?op=selectUsuario", function(r){
                $("#idusuario").html(r);
                $('#idusuario').selectpicker('refresh');
    });

    $(function() {
        $("#fec_evento").datepicker({ minDate: 0 });

        $("#hora_evento").timepicker({
            'scrollDefault': 'now'
        })

    });

}
function fechaPerdida()
{
    $.post("../ajax/agenda.php?op=compararfec", function(e){
        tabla.ajax.reload();
    });
}

function mostrarPen()
{
    $("#listadoregistros").hide('fast');
    $("#listadoregistros").show('slow');
    listarpendientes();
}
function mostrarDes()
{
    $("#listadoregistros").hide('fast');
    $("#listadoregistros").show('slow');
    listardescartado();
}
function mostrarCom()
{
    $("#listadoregistros").hide('fast');
    $("#listadoregistros").show('slow');
    listarcompletado();
}
 
//Función limpiar
function limpiar()
{
    $("#idagenda").val("");
    $("#idusuario").val("");
    $('#idcontacto').val("");
    $("#tipo_evento").val("");
    $("#asunto").val("");
    $("#descripcion").val("");
    $("#fec_evento").val(""); 
    $("#hora_evento").val("");
    $("#duracion").val("");
}
 
//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnGuardar").show();
        $("#btnagregar").hide();
        $
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();

    }
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);

    $("#idarticulo").prop("disabled",false);
    $("#idagenda").prop("disabled",false);
    $("#idusuario").prop("disabled",false);
    $('#idcontacto').prop("disabled",false);
    $("#tipo_evento").prop("disabled",false);
    $("#asunto").prop("disabled",false);
    $("#descripcion").prop("disabled",false);
    $("#fec_evento").prop("disabled",false); 
    $("#hora_evento").prop("disabled",false);
    $("#duracion").prop("disabled",false);
}
 
//Función Listar
function listarpendientes()
{
    tabla=$('#tbllistado').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [                
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "ajax":
                {
                    url: '../ajax/agenda.php?op=listarpendientes',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 12,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

function listardescartado()
{
    tabla=$('#tbllistado').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [                
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "ajax":
                {
                    url: '../ajax/agenda.php?op=listardescartado',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 12,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

function listarcompletado()
{
    tabla=$('#tbllistado').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [                
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "ajax":
                {
                    url: '../ajax/agenda.php?op=listarcompletado',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 12,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

//Función para guardar o editar 
function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
 
    $.ajax({
        url: "../ajax/agenda.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
 
        success: function(datos)
        {                    
              bootbox.alert({message:datos, size:'small', backdrop:true});           
              mostrarform(false);
              tabla.ajax.reload();
        }
 
    });
    limpiar();
}

//Funcion para posponer 
function posponer(idagenda)
{
    bootbox.confirm("¿Está seguro de posponer el evento?", function(result){
        if (result) 
        {
            $.post("../ajax/agenda.php?op=posponer", {idagenda: idagenda}, function(e){
                bootbox.alert({message: e, size:'small', backdrop: true});
                tabla.ajax.reload();
            });
        }
    })
}

//Funcion para completar 
function completar(idagenda)
{
    bootbox.confirm("¿Está seguro que desea completar este evento?", function(result){
        if (result) 
        {
            $.post("../ajax/agenda.php?op=completar", {idagenda: idagenda}, function(e){
                bootbox.alert({message: e, size:'small', backdrop: true});
                tabla.ajax.reload();
            });
        }
    })
}
 
function mostrar(idagenda)
{
    $.post("../ajax/agenda.php?op=mostrar",{idagenda : idagenda}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
        
        $("#idcontacto").val(data.idcontacto).prop("disabled",true);
        $("#idcontacto").selectpicker('refresh');
        $("#idusuario").val(data.idusuario).prop("disabled",true);
        $("#idusuario").selectpicker('refresh');
        $("#idagenda").val(data.idagenda).prop("disabled",true);
        $("#asunto").val(data.asunto).prop("disabled",true);
        $("#tipo_evento").val(data.tipo_evento).prop("disabled",true);
        $("#descripcion").val(data.descripcion).prop("disabled",true);
        $("#fec_evento").val(data.fec_evento).prop("disabled",true);
        $("#hora_evento").val(data.hora_evento).prop("disabled",true);
        $("#duracion").val(data.duracion).prop("disabled",true);
        $("#btnGuardar").hide();
    })
}

function reagendar(idagenda)
{
    $.post("../ajax/agenda.php?op=mostrar",{idagenda : idagenda}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
        
        $("#idcontacto").val(data.idcontacto).prop("disabled",true);
        $("#idcontacto").selectpicker('refresh');
        $("#idusuario").val(data.idusuario);
        $("#idusuario").selectpicker('refresh');
        $("#idagenda").val(data.idagenda);
        $("#asunto").val(data.asunto).prop("disabled",true);
        $("#tipo_evento").val(data.tipo_evento).prop("disabled",true);
        $("#descripcion").val(data.descripcion).prop("disabled",true);
        $("#fec_evento").val(data.fec_evento);
        $("#hora_evento").val(data.hora_evento);
        $("#duracion").val(data.duracion);
    })    
}
 
//Función para desactivar registros
function descartar(idagenda)
{
    bootbox.confirm("¿Está seguro de descartar el Evento?", function(result){
        if(result)
        {
            $.post("../ajax/agenda.php?op=descartar", {idagenda : idagenda}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}
 
//Función para activar registros
function activar(idagenda)
{
    bootbox.confirm("¿Está seguro de activar el Evento?", function(result){
        if(result)
        {
            $.post("../ajax/idagenda.php?op=activar", {idagenda : idagenda}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}

init();