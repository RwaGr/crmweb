//Función que se ejecuta al inicio
function init(){
    mostrarform(false);

    mostrarCot(false);

    listarProspectos();
 
    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })

    $("#cotizacion").on("submit", function(e)
    {
        guardaryeditar(e);
    });

    $("#imagenmuestra").hide();
}
 
//Función limpiar
function limpiar()
{
    //Formulario prospecto
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

    //Formulario Cotizacion
    $("#idcontactoct").val("");
    $("#razonsocialct").val("");
    $("#contactoct").val("");
    $("#tlf_1ct").val("");
    $("#correoct").val("");
    $("#descripcionct").val("");
    $("#impuestoct").val("19");
    $("#total_venta").val("");
    $(".filas").remove();
    $("#total").html("0");
    $("#neto").html("0");
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

    $("#idcontacto").prop("disabled",false);
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
 
//Función para guardar o editar
function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
 
    $.ajax({
        url: "../ajax/contacto.php?op=editarprospec",
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

//funcion para mostrar todos los datos
function mostrar(idcontacto)
{
    $.post("../ajax/contacto.php?op=mostrar",{idcontacto : idcontacto}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
 
        $("#idcontacto").val(data.idcontacto).prop("disabled",true);
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

/*---------------------------------------------------------   FUNCIONES PARA PROSPECTOS ---------------------------------------*/

//funcion para mostrar datos de prospectos y luego editar
function mostrarp(idcontacto)
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
        $("#filtro").val(data.filtro);
        $("#enlace").val(data.enlace);
        $("#codigopostal").val(data.codigopostal).prop("disabled",true);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/contactos/"+data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#sitioweb").val(data.sitioweb);
 
    })
}

//Función Listar contactos
function listarProspectos()
{
    tabla=$('#tbllistadop').dataTable(
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
                    url: '../ajax/contacto.php?op=listarprospecto',
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

/*---------------------------------------------------------   FUNCIONES PARA COTIZAR ---------------------------------------*/

//Función mostrar cotizacion
function mostrarCot(flag)
{
    limpiar();
    if (flag) 
    {
        $("#listadoregistros").hide();
        $("#formcotizacion").show();
        listarArticulos();

        $("#btnCotizar").hide();
        $("#btnCancelar").show();
        $("#btnAgrearArt").show();
        detalles = 0;  //Chequear despues
    }
    else
    {
        
        $("#listadoregistros").show();
        $("#formcotizacion").hide();

    }
}
 
//Función cancelarform
function cancelarCot()
{
    limpiar();
    mostrarCot(false);
}

//Función para crear cotizacion
function cotizar(idcontacto)
{
    mostrarCot(true);

    $.post("../ajax/contacto.php?op=mostrar",{idcontacto: idcontacto}, function(data, status)
    {
        data = JSON.parse(data);

        $("#idcontactoct").val(data.idcontacto);
        $("#razonsocialct").val(data.razonsocial).prop("disabled",true);
        $("#contactoct").val(data.contacto).prop("disabled",true);
        $("#tlf_1ct").val(data.tlf_1 +" / "+data.tlf_2).prop("disabled",true);
        $("#correoct").val(data.correo).prop("disabled",true);
    })
}

//Función para guardar o editar
function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#cotizacion")[0]);
 
    $.ajax({
        url: "../ajax/cotizacion.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
 
        success: function(datos)
        {                    
              bootbox.alert({message:datos, size:'small', backdrop:true});           
              mostrarCot(false);
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

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var cont=0;
var detalles=0;
var impuesto=19;

$("#btnCotizar").hide();


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
      $("#btnCotizar").show();
    }
    else
    {
      $("#btnCotizar").hide(); 
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