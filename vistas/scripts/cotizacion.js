//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();
 
    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    });
    //Cargamos los items al select razonsocial
    $.post("../ajax/cotizacion.php?op=selectContacto", function(r){
                $("#idcontactoct").html(r);
                $('#idcontactoct').selectpicker('refresh');
    }); 
}

function mostrarVen()
{
    $("#listadoregistros").hide('fast');
    $("#listadoregistros").show('slow');
    listarventas();
}
function mostrarCot()
{
    $("#listadoregistros").hide('fast');
    $("#listadoregistros").show('slow');
    listar();
}

//Función limpiar
function limpiar()
{
    //Formulario prospecto
    $("#idcontactoct").val("");
   
    //Formulario Cotizacion
    $("#descripcionct").val("");
    $("#impuestoct").val("19");
    $("#total_venta").val("");
    $(".filas").remove();
    $("#neto").html("0");
    $("#total").html("0");
}

//Función mostrar cotizacion
function mostrarform(flag)
{
    limpiar();
    if (flag) 
    {   

        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnagregar").hide();
        listarArticulos();

        $("#btnGuardar").hide();
        $("#btnCancelar").show();
        $("#btnAgregarArt").show();
        detalles = 0;  //Chequear despues
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
    $("#idcontactoct").prop("disabled",false);
    $("#descripcionct").prop("disabled",false);
    $("#impuestoct").prop("disabled",false);

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
                    url: '../ajax/cotizacion.php?op=listar',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

//Función Listar
function listarventas()
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
                    url: '../ajax/cotizacion.php?op=listarventas',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

//Función para guardar o editar
function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
 
    $.ajax({
        url: "../ajax/cotizacion.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
 
        success: function(datos)
        {                    
              bootbox.alert({message:datos, size:'small', backdrop:true});           
              mostrarform(false);
              listar();
        }
 
    });
    limpiar();
}

//Función ListarArticulos
function listarArticulos()
{
    tabla=$('#tblarticulos').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [                
                     
                ],
        "ajax":
                {
                    url: '../ajax/cotizacion.php?op=listarArticulosVenta',
                    type : "get",
                    dataType : "json",                      
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

function mostrar(idcotizacion)
{
    $.post("../ajax/cotizacion.php?op=mostrar",{idcotizacion : idcotizacion}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
 
        $("#idcontactoct").val(data.idcontacto).prop("disabled",true);
        $("#idcontactoct").selectpicker('refresh');
        $("#descripcionct").val(data.descripcion).prop("disabled",true);
        $("#impuestoct").val(data.impuesto).prop("disabled",true);
    
        //Ocultar y mostrar los botones
        $("#btnGuardar").hide();
        $("#btnCancelar").show();
        $("#btnAgregarArt").hide();

    });
 
    $.post("../ajax/cotizacion.php?op=listarDetalle&id="+idcotizacion,function(r){
            $("#detalles").html(r);
    }); 
}

//Función para anular registros
function anular(idcotizacion)
{
    bootbox.confirm("¿Está seguro de anular la cotización?", function(result){
        if(result)
        {
            $.post("../ajax/cotizacion.php?op=anular", {idcotizacion : idcotizacion}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            }); 
        }
    })
}

//Función para aprobar registros
function aprobar(idcotizacion)
{
    bootbox.confirm("¿Está seguro de cerrar la negociación?", function(result){
        if(result)
        {
            $.post("../ajax/cotizacion.php?op=aprobar", {idcotizacion : idcotizacion}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            }); 
        }
    })
}

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var cont=0;
var detalles=0;
var impuesto=19;

$("#btnGuardar").hide();


function agregarDetalle(idarticulo,nombre,valor)
  {
    var cantidad=1;
    var descuento=0;
 
    if (idarticulo!="")
    {
        var subtotal = cantidad * valor;

        var fila='<tr class="filas" id="fila'+cont+'">'+
        '<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')"><i class="fa fa-times"></i></button></td>'+
        '<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+nombre+'</td>'+
        '<td><input type="number" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
        '<td><input type="number" name="valor[]" id="valor[]" value="'+valor+'"></td>'+
        '<td><input type="number" name="descuento[]" value="'+descuento+'"></td>'+
        '<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
        '<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
        '</tr>';

        cont++;
        detalles=detalles+1;
        $('#detalles').append(fila);
        modificarSubototales();
    }
    else
    {
        alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
  }

function modificarSubototales()
  {
    var cant = document.getElementsByName("cantidad[]");
    var val = document.getElementsByName("valor[]");
    var desc = document.getElementsByName("descuento[]");
    var sub = document.getElementsByName("subtotal");
 
    for (var i = 0; i <cant.length; i++) {
        var inpC=cant[i];
        var inpV=val[i];
        var inpD=desc[i];
        var inpS=sub[i];
 
        inpS.inpP = (((inpC.value * inpV.value) * inpD.value)/100);

        inpS.value = (inpC.value * inpV.value) -  inpS.inpP;
        document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales();
 
  }
  function calcularTotales(){
    var sub = document.getElementsByName("subtotal");
    var imp = document.getElementsByName("impuestoct");
    var neto = 0.0;
    var total = 0.0;
 
    for (var i = 0; i <sub.length; i++) {
        neto += document.getElementsByName("subtotal")[i].value;
    }
    //CAPTURAR EL VALOR DE IMPUESTO
    var por = ((neto * 19)/100);
    total = neto + por;

    $("#neto").html("$CLP " + neto);
    $("#neto_venta").val(neto);
    $("#total").html("$CLP " + (total));
    $("#total_venta").val(total);
    evaluar();
  }

  function evaluar(){
    if (detalles>0)
    {
      $("#btnGuardar").show();
    }
    else
    {
      $("#btnGuardar").hide(); 
      cont=0;
    }
  }

  function eliminarDetalle(indice){
    $("#fila" + indice).remove();
    calcularTotales();
    detalles=detalles-1;
    evaluar()
  }


init();