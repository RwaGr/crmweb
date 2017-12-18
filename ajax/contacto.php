<?php 
require_once "../modelos/Contacto.php";

$contacto = new Contacto();

$idcontacto=isset($_POST["idcontacto"])? limpiarCadena($_POST["idcontacto"]):"";
$razonsocial=isset($_POST["razonsocial"])? limpiarCadena($_POST["razonsocial"]):"";
$tlf_1=isset($_POST["tlf_1"])? limpiarCadena($_POST["tlf_1"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$filtro=isset($_POST["filtro"])? limpiarCadena($_POST["filtro"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

switch ($_GET["op"]){ 
	case 'guardaryeditar':
		if (empty($idcontacto)){
			if ($filtro) {
				switch ($filtro) {
					case '1':
						$estado = 2;
						break;
					case '2':
						$estado = 1;
						break;
					case '3':
						$estado = 1;
						break;
					case '4':
						$estado = 2;
						break;
					case '5':
						$estado = 2;
						break;
					case '6':
						$estado = 3;
						break;
				}
			}
			
			$rspta=$contacto->insertar($razonsocial,$tlf_1,$correo,$filtro,$estado);
			echo $rspta ? "Contacto registrado" : "Contacto no se pudo registrar";
		}
		else {
			if ($filtro) {
				switch ($filtro) {
					case '1':
						$estado = 2;
						break;
					case '2':
						$estado = 1;
						break;
					case '3':
						$estado = 1;
						break;
					case '4':
						$estado = 2;
						break;
					case '5':
						$estado = 2;
						break;
					case '6':
						$estado = 3;
						break;
				}
			}
			$rspta=$contacto->editar($idcontacto,$razonsocial,$tlf_1,$correo,$filtro,$estado);
			echo $rspta ? "Contacto actualizado" : "Contacto no se pudo actualizar";
		}
	break;

	/**case 'desactivar':
		$rspta=$contacto->desactivar($idcontacto);
 		echo $rspta ? "Contacto Desactivada" : "Contacto no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$contacto->activar($idcontacto);
 		echo $rspta ? "Contacto activada" : "Contacto no se puede activar";
 		break;
	break;*/

	case 'mostrar':
		$rspta=$contacto->mostrar($idcontacto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$contacto->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(  //Condicion desactivar sino condicion activar 
 				/**"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcontacto.')"><i class="fa fa-pencil"></i></button>'.
 				' <button class="btn btn-danger" onclick="desactivar('.$reg->idcontacto.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning" onclick="mostrar('.$reg->idcontacto.')"><i class="fa fa-pencil"></i></button>'.
 				' <button class="btn btn-primary" onclick="activar('.$reg->idcontacto.')"><i class="fa fa-check"></i></button>',*/
 				"0"=>$reg->razonsocial,
 				"1"=>$reg->tlf_1,
 				"2"=>$reg->correo,
 				"3"=>$reg->filtro, 				
 				"4"=>$reg->estado
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