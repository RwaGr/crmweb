//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();
 
    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })

    $("#imagenmuestra").hide();

    //mostrar permisos
 	$.post("../ajax/usuario.php?op=permisos&id=",function(r){
            $("#permisos").html(r);
    }); 
}
 
//Función limpiar
function limpiar()
{   
    $("#idusuario").val("");
    $("#nombre").val("");
    $("#cargo").val("");
    $("#rut").val("");
    $("#email").val("");
    $("#clave").val("");
    $("#imagen").val("");
	$("#imagenmuestra").attr("src","");
    $("#imagenactual").val("");
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

    $("#idusuario").prop("disabled",false);
    $("#nombre").prop("disabled",false);
    $("#cargo").prop("disabled",false);
    $("#rut").prop("disabled",false);
    $("#email").prop("disabled",false);
    $("#clave").prop("disabled",false);
    $("#imagen").prop("disabled",false);
}
 
//Función Listar
function listar()
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
                    url: '../ajax/usuario.php?op=listar',
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
        url: "../ajax/usuario.php?op=guardaryeditar",
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
 
function mostrar(idusuario)
{
    $.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
        
        $("#idusuario").val(data.idusuario);
        $("#nombre").val(data.nombre).prop("disabled",true);
        $("#cargo").val(data.cargo).prop("disabled",true);
	    $("#rut").val(data.rut).prop("disabled",true);
	    $("#email").val(data.email).prop("disabled",true);
	    $("#clave").val(data.clave).prop("disabled",true);
        $("#imagen").prop("disabled",true);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
	    $("#imagenactual").val(data.imagen);

        $("#btnGuardar").hide();
    });

    $.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
            $("#permisos").html(r);
    });
}

function mostraru(idusuario)
{
    $.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
        
        $("#idusuario").val(data.idusuario);
        $("#nombre").val(data.nombre);
        $("#cargo").val(data.cargo);
        $("#rut").val(data.rut);
        $("#email").val(data.email);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
        $("#imagenactual").val(data.imagen);
    });

    $.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
            $("#permisos").html(r);
    });
}
 
//Función para desactivar registros
function desactivar(idusuario)
{
    bootbox.confirm("¿Está Seguro de desactivar el Usuario?", function(result){
        if(result)
        {
            $.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}
 
//Función para activar registros
function activar(idusuario)
{
    bootbox.confirm("¿Está Seguro de activar el Usuario?", function(result){
        if(result)
        {
            $.post("../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}
 
init();