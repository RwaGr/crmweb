var tabla;
//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();
 
    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })
}
 
//Función limpiar
function limpiar()
{
    $("#razonsocial").val("");
    $("#tlf1_1").val("");
    $("#correo").val("");
    $("#filtro").val("");
    $("#estado").val("");
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
                    url: '../ajax/contacto.php?op=listar',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        /**'columns':[
                    {data: 'rownum','sClass':'dt-body-center'},
                    {data: 'razonsocial'},
                    {data: 'tlf1_1'},
                    {data: 'correo'},
                    {data: 'filtro'},
                    {data: 'estado'},
                    {"orderable": true}
                  ],*/

        'columnDefs':[
                        {
                            "targets": [5],
                            "data": "estado",
                            "render": function(data,type,row) {
                                if (data == 1){
                                    return '<span: class="label label-succes">Activado</span>';
                                } else if (data == 2){
                                    return '<span: class="label bg-warning">Sin contactar</span>';
                                } else if (data == 3){
                                    return '<span: class="label bg-danger">Sin interes</span>';
                                }
                            }
                        }
                     ],
        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
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
 
function mostrar(idcontacto)
{
    $.post("../ajax/contacto.php?op=mostrar",{idcontacto : idcontacto}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
 
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idcontacto").val(data.idcontacto);
 
    })
}
 
//Función para desactivar registros
function desactivar(idcontacto)
{
    bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result){
        if(result)
        {
            $.post("../ajax/contacto.php?op=desactivar", {idcontacto : idcontacto}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}
 
//Función para activar registros
function activar(idcontacto)
{
    bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
        if(result)
        {
            $.post("../ajax/contacto.php?op=activar", {idcontacto : idcontacto}, function(e){
                bootbox.alert({message:e, size:'small', backdrop:true });
                tabla.ajax.reload();
            }); 
        }
    })
}
 
 
init();