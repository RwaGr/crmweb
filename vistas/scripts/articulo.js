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
    $("#idarticulo").val("");
    $("#nombre").val("");
    $('#descripcion').val("");
    $("#valor").val("");
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

    $("#idarticulo").prop("disabled",false);
    $("#nombre").prop("disabled",false);
    $("#descripcion").prop("disabled",false);
    $("#valor").prop("disabled",false);
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
                    url: '../ajax/articulo.php?op=listar',
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
        url: "../ajax/articulo.php?op=guardaryeditar",
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

//Funcion para eliminar artículos
function eliminar(idarticulo)
{
    bootbox.confirm("¿Está seguro de eliminar el artículo?", function(result){
        if (result) 
        {
            $.post("../ajax/articulo.php?op=eliminar", {idarticulo: idarticulo}, function(e){
                bootbox.alert({message: e, size:'small', backdrop: true});
                tabla.ajax.reload();
            });
        }
    })
}
 
function mostrar(idarticulo)
{
    $.post("../ajax/articulo.php?op=mostrar",{idarticulo : idarticulo}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
 
        $("#idarticulo").val(data.idarticulo).prop("disabled",true);
        $("#nombre").val(data.nombre).prop("disabled",true);
        $("#descripcion").val(data.descripcion).prop("disabled",true);
        $("#valor").val(data.valor).prop("disabled",true);
        $("#imagen").prop("disabled",true);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/articulos/"+data.imagen);
        $("#imagenactual").val(data.imagen);

        $("#btnGuardar").hide();
       
    })
}

function mostrara(idarticulo)
{
    $.post("../ajax/articulo.php?op=mostrar",{idarticulo : idarticulo}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
        
        $("#idarticulo").val(data.idarticulo);
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#valor").val(data.valor);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/articulos/"+data.imagen);
        $("#imagenactual").val(data.imagen);
    })    
}
 
//Función para desactivar registros
function desactivar(idarticulo)
{
    bootbox.confirm("¿Está Seguro de desactivar el Articulo?", function(result){
        if(result)
        {
            $.post("../ajax/articulo.php?op=desactivar", {idarticulo : idarticulo}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}
 
//Función para activar registros
function activar(idarticulo)
{
    bootbox.confirm("¿Está Seguro de activar el Articulo?", function(result){
        if(result)
        {
            $.post("../ajax/articulo.php?op=activar", {idarticulo : idarticulo}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}

init();