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
    $('#incontacto').val("");
    $("#intlf_1").val("");
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
        
        $("#midcontacto").val(data.idcontacto);
        $("#mrazonsocial").val(data.razonsocial);
        $("#mrut").val(data.rut);
        $("#mgiro").val(data.giro);
        $("#mcontacto").val(data.contacto);
        $("#mcargo").val(data.cargo);
        $("#mtlf_1").val(data.tlf_1);
        $("#mtlf_2").val(data.tlf_2);
        $("#mcorreo").val(data.correo);
        $("#mregion").val(data.region);
        $("#mciudad").val(data.ciudad);
        $("#mcomuna").val(data.comuna);
        $("#mdireccion").val(data.direccion);
        $("#mcanal").val(data.canal);
        $("#mfiltro").val(data.filtro);
       // $("#mestado").val(data.estado);
        $("#menlace").val(data.enlace);
       //$("#mfec_ingreso").val(data.mfec_ingreso);
        $("#mcodigopostal").val(data.codigopostal);
        $("#mimagen").val(data.imagen);
        $("#msitioweb").val(data.sitioweb);
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

//Boton para insertar datos desde el modal
$('#inbtnGuardar').click(function(){

    $razonsocial = $('#inrazonsocial').val();
    $contacto = $('#incontacto').val();
    $tlf_1 = $('#intlf_1').val();
    $correo = $('#incorreo').val();
    $filtro = $('#infiltro').val();

    $.ajax({
        url: "../ajax/contacto.php",
        type: "POST",
        data: {
            op: "guardaryeditar",
            razonsocial: $razonsocial,
            contacto: $contacto,
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

    $idcontacto = $('#midcontacto').val();
    $razonsocial = $('#mrazonsocial').val();
    $rut = $('#mrut').val();
    $giro = $('#mgiro').val();
    $contacto = $('#mcontacto').val();
    $cargo = $('#mcargo').val();
    $tlf_1 = $('#mtlf_1').val();
    $tlf_2 = $('#mtlf_2').val();
    $correo = $('#mcorreo').val();
    $region = $('#mregion').val();
    $ciudad = $('#mciudad').val();
    $comuna = $('#mcomuna').val();
    $direccion = $('#mdireccion').val();
    $canal = $('#mcanal').val();
    $filtro = $('#mfiltro').val();
    $enlace = $('#menlace').val();
    $codigopostal = $('#mcodigopostal').val();
    $imagen = $('#mimagen').val();
    $sitioweb = $('#msitioweb').val();
    //$estado = $('#mestado').val();
    //$ingreso = $('#mingreso').val();

    console.log({
        op: "guardaryeditar",
        idcontacto: $idcontacto,
            razonsocial: $razonsocial,
            rut: $rut,
            giro: $giro,
            contacto: $contacto,
            cargo: $cargo,
            tlf_1: $tlf_1,
            tlf_2: $tlf_2,
            correo: $correo,
            region: $region,
            ciudad: $ciudad,
            comuna: $comuna,
            direccion: $direccion,
            canal: $canal,
            filtro: $filtro,
            enlace: $enlace,
            codigopostal: $codigopostal,
            imagen: $imagen,
            sitioweb: $sitioweb
    });
    $.ajax({
        url: "../ajax/contacto.php",
        type: "POST",
        data: {
            op: "guardaryeditar",
            idcontacto: $idcontacto,
            razonsocial: $razonsocial,
            rut: $rut,
            giro: $giro,
            contacto: $contacto,
            cargo: $cargo,
            tlf_1: $tlf_1,
            tlf_2: $tlf_2,
            correo: $correo,
            region: $region,
            ciudad: $ciudad,
            comuna: $comuna,
            direccion: $direccion,
            canal: $canal,
            filtro: $filtro,
            enlace: $enlace,
            codigopostal: $codigopostal,
            imagen: $imagen,
            sitioweb: $sitioweb
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