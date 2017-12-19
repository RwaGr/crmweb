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

 			if ($reg->estado == 1){
 					$estadocolor = '<span: class="label label-success">Prospecto</span>';
 				} else if ($reg->estado == 2){
 					$estadocolor = '<span: class="label label-warning" >Pendiente</span>';
 				}  else if ($reg->estado == 3){
 					$estadocolor = '<span: class="label label-danger">No interes</span>';
 				}

 			switch ($reg->filtro) {
 						case '1':
 								$valor = 'Sin contactar';
 							break;
 						
 						case '2':
 								$valor = 'Interes';
 							break;

 						case '3':
 								$valor = 'Indeciso';
 							break;

 						case '4':
 								$valor = 'No contesta';
 							break;

 						case '5':
 								$valor = 'Volver a llamar';
 							break;

 						case '6':
 								$valor = 'Sin interes';
 							break;
 					}		
 			$data[]=array(
 				"0"=>'<button class="btn btn-primary" data-toggle="modal" data-target="#modalMostrar" onclick="mostrarModal('.$reg->idcontacto.')"><i class="fa fa-fw fa-search"></i></button>'.'<button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="editarModal('.$reg->idcontacto.')"><i class="fa fa-fw fa-edit"></i></button>',
 				"1"=>$reg->razonsocial,
 				"2"=>$reg->tlf_1,
 				"3"=>$reg->correo,
 				"4"=>$valor, 
 				"5"=>$estadocolor							
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