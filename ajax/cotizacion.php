<?php 
if (strlen(session_id()) < 1) 
  session_start();
 
require_once "../modelos/Cotizacion.php";
 
$cotizacion = new Cotizacion();
 
$idcotizacion=isset($_POST["idcotizacion"])? limpiarCadena($_POST["idcotizacion"]):"";
$idcontacto=isset($_POST["idcontactoct"])? limpiarCadena($_POST["idcontactoct"]):"";
$idusuario=$_SESSION["idusuario"];
$descripcion=isset($_POST["descripcionct"])? limpiarCadena($_POST["descripcionct"]):"";
$impuesto=isset($_POST["impuestoct"])? limpiarCadena($_POST["impuestoct"]):"";
$total=isset($_POST["total_venta"])? limpiarCadena($_POST["total_venta"]):"";
 
switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idcotizacion)){

            $lastID = $cotizacion->listarID();
            $reg = $lastID->fetch_object();
            $seriecot = $reg->idcotizacion + 1;
            $serie = $idusuario.$idcontacto.$seriecot."CT";

            $rspta=$cotizacion->insertar($idcontacto,$idusuario,$serie,$descripcion,$impuesto,$total,$_POST["idarticulo"],$_POST["cantidad"],$_POST["valor"],$_POST["descuento"]);
            echo $rspta ? "Cotizacion registrada" : "No se pudo registrar la cotización";
        }
        else {
        }
    break;
 
    case 'anular':
        $rspta=$cotizacion->anular($idcotizacion);
        echo $rspta ? "Cotizacion anulada" : "Cotizacion no se puede anular";
    break;

    case 'aprobar':
        $rspta=$cotizacion->aprobar($idcotizacion);
        echo $rspta ? "Venta aprobada" : "Venta no se puede cerrar";
    break;
 
    case 'mostrar':
        $rspta=$cotizacion->mostrar($idcotizacion);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
    break;
 
    case 'listarDetalle':
        //Recibimos el idingreso
        $id=$_GET['id'];
 
        $rspta = $cotizacion->listarDetalle($id);
        $total=0;
        echo '<thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Precio cotizacion</th>
                                    <th>Descuento</th>
                                    <th>Subtotal</th>
                                </thead>';
 
        while ($reg = $rspta->fetch_object())
                {
                    echo '<tr class="filas"><td></td><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->precio_venta.'</td><td>'.$reg->descuento.'</td><td>'.$reg->subtotal.'</td></tr>';
                    $total=$total+($reg->subtotal+($reg->subtotal * ($reg->impuesto/100)));
                }
        echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">$CLP'.$total.'</h4><input type="hidden" name="total_cotizacion" id="total_cotizacion"></th> 
                                </tfoot>';
    break;
 
    case 'listar':
        $rspta=$cotizacion->listar();
        //Vamos a declarar un array
        $data= Array();
 
        while ($reg=$rspta->fetch_object()){

            switch ($reg->estado) {
                case 'Negociando':
                    $estado = '<span class="label bg-yellow"><b>Negociando</b></span>';
                    $botones = '<button class="btn btn-warning" onclick="mostrar('.$reg->idcotizacion.')"><i class="fa fa-search"></i></button>'.
                     '<button class="btn btn-danger" onclick="anular('.$reg->idcotizacion.')"><i class="fa fa-times"></i></button>'.
                     '<button class="btn btn-success" onclick="aprobar('.$reg->idcotizacion.')"><i class="fa fa-thumbs-up"></i></button>';
                    break;

                case 'Anulado':
                    $estado = '<span class="label bg-red"><b>Anulado</b></span>';
                    $botones = '<button class="btn btn-warning" onclick="mostrar('.$reg->idcotizacion.')"><i class="fa fa-search"></i></button>';
                    break;
            }


            $data[]=array(

                "0"=>$botones,
                "1"=>$reg->serie,
                "2"=>'<i class="fa fa-user"></i>'.' '.$reg->usuario,
                "3"=>'<i class="fa fa-users"></i>'.' '.$reg->razonsocial.'<br> <b>RUT: </b>'.$reg->rut,
                "4"=>$reg->contacto.'<br> <i class="fa fa-envelope"></i>'.' '.$reg->correo,
                "5"=>'<i class="fa fa-phone"></i>'.' '.$reg->tlf_1.'<br> <i class="fa fa-phone"></i>'.' '.$reg->tlf_2,
                "6"=>'<i class="fa fa-calendar"></i>'.' '.$reg->fecha,
                "7"=>$reg->impuesto,
                "8"=>$reg->total.' <i class="fa fa-usd"></i>'.'CLP',
                "9"=>$estado
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
 
    break;

    case 'listarventas':
        $rspta=$cotizacion->listarventas();
        //Vamos a declarar un array
        $data= Array();
 
        while ($reg=$rspta->fetch_object()){

            if ($reg->estado == 'Aprobado') {

                    $estado = '<span class="label bg-green"><b>Aprobado</b></span>';
                    $botones = '<button class="btn btn-warning" onclick="mostrar('.$reg->idcotizacion.')"><i class="fa fa-search"></i></button>'.
                     '<button class="btn btn-danger" onclick="anular('.$reg->idcotizacion.')"><i class="fa fa-times"></i></button>';
            }


            $data[]=array(

                "0"=>$botones,
                "1"=>$reg->serie,
                "2"=>'<i class="fa fa-user"></i>'.' '.$reg->usuario,
                "3"=>'<i class="fa fa-users"></i>'.' '.$reg->razonsocial.'<br> <b>RUT: </b>'.$reg->rut,
                "4"=>$reg->contacto.'<br> <i class="fa fa-envelope"></i>'.' '.$reg->correo,
                "5"=>'<i class="fa fa-phone"></i>'.' '.$reg->tlf_1.'<br> <i class="fa fa-phone"></i>'.' '.$reg->tlf_2,
                "6"=>'<i class="fa fa-calendar"></i>'.' '.$reg->fecha,
                "7"=>$reg->impuesto,
                "8"=>$reg->total.' <i class="fa fa-usd"></i>'.'CLP',
                "9"=>$estado
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
 
    break;
 
    case 'selectContacto':
        require_once "../modelos/Clases.php";
        $contacto = new Contacto();
 
        $rspta = $contacto->listarProspecto();
 
        while ($reg = $rspta->fetch_object())
        {
            if (!empty($reg->contacto)) {
                $nombre = ' - '.$reg->contacto;
            }else{
                $nombre = '';
            }
            echo '<option value=' .$reg->idcontacto. '>'.$reg->razonsocial.$nombre.'</option>';
        }
    break;
 
    case 'listarArticulosVenta':
        require_once "../modelos/Clases.php";

        $articulo = new Articulo();
 
        $rspta=$articulo->listarActivosVenta();
        //Vamos a declarar un array
        $data= Array();
 
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idarticulo.',\''.$reg->nombre.'\',\''.$reg->valor.'\')"><span class="fa fa-plus"></span></button>',
                "1"=>$reg->idarticulo,               
                "2"=>$reg->nombre,
                "3"=>$reg->descripcion,
                "4"=>$reg->valor,
                "5"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px' >"
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;
}
?>