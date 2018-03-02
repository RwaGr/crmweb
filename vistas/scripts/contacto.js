//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();

 
    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })

    $("#imagenmuestra").hide();
}
 
//Función limpiar
function limpiar()
{
    $("#idcontacto").val("");
    $("#razonsocial").val("");
    $("#rut").val("");
    $("#giro").val("");
    $("#contacto").val("");
    $("#cargo").val("");
    $("#tlf_1").val("");
    $("#tlf_2").val("");
    $("#correo").val("");
    $("#region").val("");
    $("#ciudad").val("");
    $("#comuna").val("");
    $("#direccion").val("");
    $("#canal").val("");
    $("#filtro").val("");
    $("#enlace").val("");
    $("#codigopostal").val("");
    $("#imagen").val("");
    $("#sitioweb").val("");
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

    $("#razonsocial").prop("disabled",false);
    $("#rut").prop("disabled",false);
    $("#giro").prop("disabled",false);
    $("#contacto").prop("disabled",false);
    $("#cargo").prop("disabled",false);
    $("#tlf_1").prop("disabled",false);
    $("#tlf_2").prop("disabled",false);
    $("#correo").prop("disabled",false);
    $("#region").prop("disabled",false);
    $("#ciudad").prop("disabled",false);
    $("#comuna").prop("disabled",false);
    $("#direccion").prop("disabled",false);
    $("#canal_deingreso").prop("disabled",false);
    $("#filtro").prop("disabled",false);
    $("#enlace").prop("disabled",false);
    $("#codigopostal").prop("disabled",false);
    $("#imagen").prop("disabled",false);
    $("#sitioweb").prop("disabled",false);
}
 
//Función Listar contactos
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
                    url: '../ajax/contacto.php?op=listar',
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
        url: "../ajax/contacto.php?op=guardaryeditar",
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

//Funcion para eliminar contactos
function eliminar(idcontacto)
{
    bootbox.confirm("¿Está seguro de eliminar el contacto?", function(result){
        if (result) 
        {
            $.post("../ajax/contacto.php?op=eliminar", {idcontacto: idcontacto}, function(e){
                bootbox.alert({message: e, size:'small', backdrop: true});
                tabla.ajax.reload();
            });
        }
    })
}
 
//Funcion para mostrar datos de contactos y luego editar
function mostrarc(idcontacto)
{
    $.post("../ajax/contacto.php?op=mostrar",{idcontacto : idcontacto}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
 
        $("#idcontacto").val(data.idcontacto);
        $("#razonsocial").val(data.razonsocial);
        $("#rut").val(data.rut);
        $("#giro").val(data.giro);
        $("#contacto").val(data.contacto);
        $("#cargo").val(data.cargo);
        $("#tlf_1").val(data.tlf_1);
        $("#tlf_2").val(data.tlf_2);
        $("#correo").val(data.correo);
        $("#region").val(data.region);
        $("#ciudad").val(data.ciudad);
        $("#comuna").val(data.comuna);
        $("#direccion").val(data.direccion);
        $("#canal_deingreso").val(data.canal_deingreso);
        $("#filtro").val(data.filtro);
        $("#enlace").val(data.enlace);
        $("#codigopostal").val(data.codigopostal);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/contactos/"+data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#sitioweb").val(data.sitioweb);
 
    })
}

//funcion para mostrar todos los datos
function mostrar(idcontacto)
{
    $.post("../ajax/contacto.php?op=mostrar",{idcontacto : idcontacto}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
 
        $("#idcontacto").val(data.idcontacto);
        $("#razonsocial").val(data.razonsocial).prop("disabled",true);
        $("#rut").val(data.rut).prop("disabled",true);
        $("#giro").val(data.giro).prop("disabled",true);
        $("#contacto").val(data.contacto).prop("disabled",true);
        $("#cargo").val(data.cargo).prop("disabled",true);
        $("#tlf_1").val(data.tlf_1).prop("disabled",true);
        $("#tlf_2").val(data.tlf_2).prop("disabled",true);
        $("#correo").val(data.correo).prop("disabled",true);
        $("#region").val(data.region).prop("disabled",true);
        $("#ciudad").val(data.ciudad).prop("disabled",true);
        $("#comuna").val(data.comuna).prop("disabled",true);
        $("#direccion").val(data.direccion).prop("disabled",true);
        $("#canal_deingreso").val(data.canal_deingreso).prop("disabled",true);
        $("#filtro").val(data.filtro).prop("disabled",true);
        $("#enlace").val(data.enlace).prop("disabled",true);
        $("#codigopostal").val(data.codigopostal).prop("disabled",true);
        $("#imagen").prop("disabled",true);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/contactos/"+data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#sitioweb").val(data.sitioweb).prop("disabled",true);

        $("#btnGuardar").hide();
       
    })
}

init();