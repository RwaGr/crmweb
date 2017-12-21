var tabla;
//Función que se ejecuta al inicio
function init(){
    listar();
 
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
                    url: '../ajax/mostrarpros.php',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        
        responsive: true,
        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

//Función para llevar datos al modal y editar 
function editarModal($idcontacto)
{
    $.post("../ajax/contacto.php",
        {
            op: "mostrar",
            idcontacto : $idcontacto
        }, function(data, status)
    {
        data = JSON.parse(data);        
        
        $("#midcontacto").val(data.idcontacto);
        $("#mrazonsocial").val(data.razonsocial);
        $("#mcontacto").val(data.contacto);        
        $("#mfiltro").val(data.filtro);      
    })
}

//Funcion para traer el modal con registros
function mostrarModal(idcontacto)
{
    $.post("../ajax/contacto.php",
        {op: "mostrar", idcontacto : idcontacto}, function(data, status)
    {
        data = JSON.parse(data);        
        
        $("#mmidcontacto").val(data.idcontacto);
        $("#mmrazonsocial").val(data.razonsocial);
        $("#mmrut").val(data.rut);
        $("#mmgiro").val(data.giro);
        $("#mmcontacto").val(data.contacto);
        $("#mmcargo").val(data.cargo);
        $("#mmtlf_1").val(data.tlf_1);
        $("#mmtlf_2").val(data.tlf_2);
        $("#mmcorreo").val(data.correo);
        $("#mmregion").val(data.region);
        $("#mmciudad").val(data.ciudad);
        $("#mmcomuna").val(data.comuna);
        $("#mmdireccion").val(data.direccion);
        $("#mmcanal").val(data.canal);

        switch (data.filtro) {
            case '1':
                $("#mmfiltro").html('<label class="text">Sin contactar</label>');
                break;
            
            case '2':
                $("#mmfiltro").html('<label class="text">Interés</label>');
                break;

            case '3':
                $("#mmfiltro").html('<label class="text">Indeciso</label>');
                break;

            case '4':
                $("#mmfiltro").html('<label class="text">Sin responder</label>');
                break;

            case '5':
                $("#mmfiltro").html('<label class="text">Llamar después</label>');
                break;

            case '6':
                $("#mmfiltro").html('<label class="text">Sin interés</label>');
                break;
        }

        if (data.estado == 1) {
            $("#mmestado").html('<span: class="label label-success">Prospecto</span>');
        } else if (data.estado == 2) {
            $("#mmestado").html('<span: class="label label-warning">Pendiente</span>');
        } else if (data.estado == 3) {
            $("#mmestado").html('<span: class="label label-danger">No interes</span>');
        }
        
        //$("#mmenlace").html('<a href="'data.enlace'">Enlace API</a>');
        $("#mmenlace").val(data.enlace);
        $("#mmingreso").val(data.ingreso);
        $("#mmcodigopostal").val(data.codigopostal);
        $("#mmimagen").val(data.imagen);
        //$("#mmsitioweb").html('<a href="'data.sitioweb'">'data.sitioweb'</a>');
        $("#mmsitioweb").val(data.sitioweb);
    })
}

//Boton para guardar datos desde el modal
$('#mbtnGuardar').click(function(){

    $idcontacto = $('#midcontacto').val();
    $filtro = $('#mfiltro').val();

    $.ajax({
        url: "../ajax/contacto.php",
        type: "POST",
        data: {
            op: "guardaryeditar",
            idcontacto: $idcontacto,
            filtro: $filtro           
        },
 
        success: function(data)
        {     
              $('#mbtnCerrar').click();
            bootbox.alert({message:data, size:'small', backdrop:true});
            tabla.ajax.reload();
        }
 
    });
});
 
init();