<?php 
require_once "../modelos/Clases.php";

$articulo = new Articulo();

$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$valor=isset($_POST["valor"])? limpiarCadena($_POST["valor"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]){ 
	case 'guardaryeditar':

		//Condicion para agregar imagen
		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			
			$imagen = $_POST["imagenactual"];

		} else {

			$ext = explode(".", $_FILES['imagen']['name']);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") 
				{
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file(($_FILES['imagen']['tmp_name']), "../files/articulos/" . $imagen);
				}	
		}

		if (empty($idarticulo)){
			if (empty($imagen)) {
                $imagen = "noimage.png";
            }
			$rspta=$articulo->insertar($nombre,$descripcion,$valor,$imagen);
			echo $rspta ? "Artículo registrado" : "Artículo no se pudo registrar";
		}
		else {
			
			$rspta=$articulo->editar($idarticulo,$nombre,$descripcion,$valor,$imagen);
			echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$articulo->desactivar($idarticulo);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$articulo->activar($idarticulo);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
 		break;
	break;

	case 'mostrar':
		$rspta=$articulo->mostrar($idarticulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'eliminar':
		$rspta=$articulo->eliminar($idarticulo);
 		//Codificar el resultado utilizando json
 		echo $rspta ? "Artículo eliminado" : "Artículo no se pudo eliminar";
	break;

	case 'listar':
		$rspta=$articulo->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){

 			$data[]=array(  //Condicion desactivar sino condicion activar ademas de botones de ver y editar ":" es el separador
 				"0"=>
 				'<button class="btn btn-warning" onclick="mostrar('.$reg->idarticulo.')"><i class="fa fa-search"></i></button>'.
 				'<button class="btn btn-primary" onclick="mostrara('.$reg->idarticulo.')"><i class="fa fa-edit"></i></button>'.
 				'<button class="btn btn-danger" onclick="eliminar('.$reg->idarticulo.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->idarticulo,
 				"2"=>$reg->nombre,
 				"3"=>$reg->descripcion,
 				"4"=>$reg->valor,
 				"5"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px' >",
 				"6"=>($reg->condicion)?'<span: class="label bg-green">Activado</span>':'<span: class="label bg-red">Desactivado</span>',
 				"7"=>($reg->condicion)?'<button class="btn btn-danger" onclick="desactivar('.$reg->idarticulo.')"><i class="fa fa-close"></i></button>': 
 				'<button class="btn btn-success" onclick="activar('.$reg->idarticulo.')"><i class="fa fa-check"></i></button>'
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