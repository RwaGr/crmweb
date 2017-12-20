var tabla;
//Función que se ejecuta al inicio
function init(){
    listar();
 
   /** $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })*/
}
 
//Función limpiar
function limpiar()
{   
    $("#inidcontacto").val("");
    $("#inrazonsocial").val("");
    $("#intlf1_1").val("");
    $("#incorreo").val("");
    $("#infiltro").val("");    
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
                    url: '../ajax/mostrar.php',
                    type : "get",
                    data: {op: "listar"},
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
/**function guardaryeditar(e)
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
              tabla.ajax.reload();
        }
 
    });
    limpiar();
}*/

//Función para llevar datos al modal y editar 
function editarModal(idcontacto)
{
    $.post("../ajax/contacto.php",
        {
            op: "mostrar",
            idcontacto : idcontacto
        }, function(data, status)
    {
        data = JSON.parse(data);        
        
        $("#mrazonsocial").val(data.razonsocial);
        $("#mtlf_1").val(data.tlf_1);
        $("#mcorreo").val(data.correo);
        $("#mfiltro").val(data.filtro);
       // $("#mestado").val(data.estado);
        $("#midcontacto").val(data.idcontacto);
    })
}

//Funcion para traer el modal con registros
function mostrarModal(idcontacto)
{
    $.post("../ajax/contacto.php",
        {op: "mostrar", idcontacto : idcontacto}, function(data, status)
    {
        data = JSON.parse(data);        
        
        $("#mmrazonsocial").val(data.razonsocial);
        $("#mmtlf_1").val(data.tlf_1);
        $("#mmcorreo").val(data.correo);
        $("#mmfiltro").val(data.filtro);
        if (data.estado == 1) {
            $("#mmestado").val('<span: class="label label-success">Prospecto</span>');
        } else if (data.estado == 2) {
            $("#mmestado").val('<span: class="label label-warning">Pendiente</span>');
        } else if (data.estado == 3) {
            $("#mmestado").val('<span: class="label label-danger">No interes</span>');
        }
        $("#mmestado").val(data.estado);
        $("#mmidcontacto").val(data.idcontacto);
    })
}

//Boton para insertar datos desde el modal
$('#inbtnGuardar').click(function(){

    $razonsocial = $('inrazonsocial').val();
    $tlf_1 = $('#intlf_1').val();
    $correo = $('#incorreo').val();
    $filtro = $('#infiltro').val();

    $.ajax({
        url: "../ajax/contacto.php",
        type: "POST",
        data: {
            op: "guardaryeditar",
            razonsocial: $razonsocial,
            tlf_1: $tlf_1,
            correo: $correo,
            filtro: $filtro
        },
        
        success: function(data)
        {     
            $('#inbtnCerrar').click();
            bootbox.alert({message:data, size:'small', backdrop:true});
            tabla.ajax.reload();
        }
 
    });
    limpiar();
});

//Boton para guardar datos desde el modal
$('#mbtnGuardar').click(function(){

    var idcontacto = $('#midcontacto').val();
    var razonsocial = $('#mrazonsocial').val();
    var tlf_1 = $('#mtlf_1').val();
    var correo = $('#mcorreo').val();
    var filtro = $('#mfiltro').val();

    console.log({
        op: "guardaryeditar",
        idcontacto: idcontacto,
        razonsocial: razonsocial,
        tlf_1: tlf_1,
        correo: correo,
        filtro: filtro
    });
    $.ajax({
        url: "../ajax/contacto.php",
        type: "POST",
        data: {
            op: "guardaryeditar",
            idcontacto: idcontacto,
            razonsocial: razonsocial,
            tlf_1: tlf_1,
            correo: correo,
            filtro: filtro
        },
 
        success: function(data)
        {     
              if (data == 1) {
                $('#mbtnCerrar').click();
                location.reload();
              }               
              bootbox.alert({message:data, size:'small', backdrop:true});
              tabla.ajax.reload();
        }
 
    });
});
 
init();