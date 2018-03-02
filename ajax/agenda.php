<?php 

//LLamado a la clase Categoria

require_once "../modelos/Agenda.php";

$agendar = new Agenda();
$fechaperdida = new Agenda();
//Seteado de las variables recibidas

$idcontacto=isset($_POST["idcontacto"])? limpiarCadena($_POST["idcontacto"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$idagenda=isset($_POST["idagenda"])? limpiarCadena($_POST["idagenda"]):"";
$asunto=isset($_POST["asunto"])? limpiarCadena($_POST["asunto"]):"";
$tipo_evento=isset($_POST["tipo_evento"])? limpiarCadena($_POST["tipo_evento"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$fec_evento=isset($_POST["fec_evento"])? limpiarCadena($_POST["fec_evento"]):"";
$hora_evento=isset($_POST["hora_evento"])? limpiarCadena($_POST["hora_evento"]):"";
$duracion=isset($_POST["duracion"])? limpiarCadena($_POST["duracion"]):"";


$cable=isset($_POST["cable"])? limpiarCadena($_POST["cable"]):"";

//Recibe la var OP que proviene de la petición Ajax
switch ($_GET["op"]){ 

    case 'compararfec':
            
            $rspta = $agendar->listar();
            $hoy = date("m/d/y");
            while ($reg = $rspta->fetch_object()) {
                $fec_evento = new DateTime($reg->fec_evento);
                $fecformat = $fec_evento->format("m/d/y");
                if ($fecformat < $hoy) {
                   $fechaperdida->fechaperdida($reg->idagenda);
                } 
            }

    break;

	//Si no existe idcontacto guarda un nuevo registro sino recibe el idcontacto y ejecuta editar
	case 'guardaryeditar':

		if (empty($idagenda)){

			$rspta = $agendar->insertar($asunto,$descripcion,$fec_evento,$hora_evento,$duracion,$tipo_evento,$idusuario,$idcontacto);
			echo $rspta ? "Evento registrado" : "Evento no se pudo registrar";
		}
		else {

			$rspta = $agendar->editar($idagenda,$fec_evento,$hora_evento,$duracion,$idusuario);
			echo $rspta ? "Evento actualizado" : "Evento no se pudo actualizar";
		}
	break;

	case 'mostrar':

		$rspta=$agendar->mostrar($idagenda);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'eliminar':
		$rspta=$agendar->eliminar($idagenda);
 		//Codificar el resultado utilizando json
 		echo $rspta ? "Contacto eliminado" : "Contacto no se pudo eliminar";
	break;

	case 'posponer':
		$rspta=$agendar->posponer($idagenda);
 		//Codificar el resultado utilizando json
 		echo $rspta ? "Registro pospuesto" : "Registro no se pudo posponer";
	break;

	case 'completar':
		$rspta=$agendar->completar($idagenda);
 		//Codificar el resultado utilizando json
 		echo $rspta ? "Registro completado" : "Registro no se pudo completar";
	break;

	case 'descartar':
		$rspta=$agendar->descartar($idagenda);
 		echo $rspta ? "Registro descartado" : "Registro no se puede descartar";
 		break;
	break;

	case 'listarpendientes':

		$rspta = $agendar->listarpendientes();
 		//Vamos a declarar un array
 		$data = Array();

 		while ($reg = $rspta->fetch_object()){

 			switch ($reg->tipo_evento) {
 				case 'llamada':
 					$actividad = '<i class="fa fa-phone"></i>Llamada';
 					break;
 				
 				case 'reunion':
 					$actividad = '<i class="fa fa-users"></i>Reunión';
 					break;

 				case 'tarea':
 					$actividad = '<i class="fa fa-bell"></i>Tarea';
 					break;

 				case 'plazo':
 					$actividad = '<i class="fa fa-flag"></i>Plazo';
 					break;

 				case 'correo':
 					$actividad = '<i class="fa fa-envelope"></i>Correo';
 					break;

 				case 'almuerzo':
 					$actividad = '<i class="fa fa-coffee"></i>Almuerzo';
 					break;
 			}

 			switch ($reg->mantenimiento) {
 				case 'Pendiente':
 					$mantenimiento = '<label class="label bg-blue">Pendiente</label>';
 					break;
 				
 				case 'Pospuesto':
 					$mantenimiento = '<label class="label bg-yellow">Pospuesto</label>';
 					break;
 			}

    		//Recorre el array escribiendo los registros en la tabla
 			$data[]=array(  
 				 "0"=>($reg->estado)?
 				 	  '<button class="btn btn-warning" onclick="mostrar('.$reg->idagenda.')"><i class="fa fa-search"></i></button>'.
                      '<button class="btn btn-primary" onclick="reagendar('.$reg->idagenda.')"><i class="fa fa-edit"></i></button>'.
                      '<button class="btn btn-danger" onclick="descartar('.$reg->idagenda.')"><i class="fa fa-times"></i></button>'.
                      '<button class="btn btn-caution" onclick="posponer('.$reg->idagenda.')"><i class="fa fa-calendar"></i></button>'.
                      '<button class="btn btn-success" onclick="completar('.$reg->idagenda.')"><i class="fa fa-thumbs-up"></i></button>'
                      :
                      '<button class="btn btn-warning" onclick="mostrar('.$reg->idagenda.')"><i class="fa fa-search"></i></button>'.
                      '<button class="btn btn-primary" onclick="reagendar('.$reg->idagenda.')"><i class="fa fa-edit"></i></button>'.
                      '<button class="btn btn-danger" onclick="descartar('.$reg->idagenda.')"><i class="fa fa-times"></i></button>',
                "1"=>'<i class="fa fa-user"></i>'.' '.$reg->nombre,
                "2"=>$actividad,
                "3"=>'<i class="fa fa-exclamation-circle"></i>'.' '.$reg->asunto,
                "4"=>$reg->contacto.'<br>'.$reg->razonsocial,
                "5"=>'<i class="fa fa-phone"></i>'.' '.$reg->tlf_1.'<br> <i class="fa fa-envelope"></i>'.' '.$reg->correo,
                "6"=>'<i class="fa fa-calendar"></i>'.' '.$reg->fec_evento.'<br> <i class="fa fa-clock"></i>'.' '.$reg->hora_evento,
                "7"=>$reg->duracion,
                "8"=>$mantenimiento
 			);

 		}

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listardescartado':

		$rspta = $agendar->listardescartado();
 		//Vamos a declarar un array
 		$data = Array();

 		while ($reg = $rspta->fetch_object()){

 			switch ($reg->tipo_evento) {
 				case 'llamada':
 					$actividad = '<i class="fa fa-phone"></i>Llamada';
 					break;
 				
 				case 'reunion':
 					$actividad = '<i class="fa fa-users"></i>Reunión';
 					break;

 				case 'tarea':
 					$actividad = '<i class="fa fa-bell"></i>Tarea';
 					break;

 				case 'plazo':
 					$actividad = '<i class="fa fa-flag"></i>Plazo';
 					break;

 				case 'correo':
 					$actividad = '<i class="fa fa-envelope"></i>Correo';
 					break;

 				case 'almuerzo':
 					$actividad = '<i class="fa fa-coffee"></i>Almuerzo';
 					break;
 			}

 			switch ($reg->mantenimiento) {
 				case 'Descartado':
 					$mantenimiento = '<label class="label bg-red">Descartado</label>';
 					break;
 				
 				case 'Perdido':
 					$mantenimiento = '<label class="label bg-caution">Perdido</label>';
 					break;
 			}

    		//Recorre el array escribiendo los registros en la tabla
 			$data[]=array(  
 				 "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idagenda.')"><i class="fa fa-search"></i></button>'.
                      '<button class="btn btn-primary" onclick="reagendar('.$reg->idagenda.')"><i class="fa fa-edit"></i></button>'.
                      '<button class="btn btn-caution" onclick="posponer('.$reg->idagenda.')"><i class="fa fa-calendar"></i></button>',
                "1"=>'<i class="fa fa-user"></i>'.' '.$reg->nombre,
                "2"=>$actividad,
                "3"=>'<i class="fa fa-exclamation-circle"></i>'.' '.$reg->asunto,
                "4"=>$reg->contacto.'<br>'.$reg->razonsocial,
                "5"=>'<i class="fa fa-phone"></i>'.' '.$reg->tlf_1.'<br> <i class="fa fa-envelope"></i>'.' '.$reg->correo,
                "6"=>'<i class="fa fa-calendar"></i>'.' '.$reg->fec_evento.'<br> <i class="fa fa-clock"></i>'.' '.$reg->hora_evento,
                "7"=>$reg->duracion,
                "8"=>$mantenimiento
 			);

 		}

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

    case 'listarcompletado':

		$rspta = $agendar->listarcompletado();
 		//Vamos a declarar un array
 		$data = Array();

 		while ($reg = $rspta->fetch_object()){

 			switch ($reg->tipo_evento) {
 				case 'llamada':
 					$actividad = '<i class="fa fa-phone"></i>Llamada';
 					break;
 				
 				case 'reunion':
 					$actividad = '<i class="fa fa-users"></i>Reunión';
 					break;

 				case 'tarea':
 					$actividad = '<i class="fa fa-bell"></i>Tarea';
 					break;

 				case 'plazo':
 					$actividad = '<i class="fa fa-flag"></i>Plazo';
 					break;

 				case 'correo':
 					$actividad = '<i class="fa fa-envelope"></i>Correo';
 					break;

 				case 'almuerzo':
 					$actividad = '<i class="fa fa-coffee"></i>Almuerzo';
 					break;
 			}

 			if ($reg->mantenimiento = 'Completado') {
 				$mantenimiento = '<label class="label bg-green">Completado</label>';
 			}

    		//Recorre el array escribiendo los registros en la tabla
 			$data[]=array(  
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idagenda.')"><i class="fa fa-search"></i></button>',
                "1"=>'<i class="fa fa-user"></i>'.' '.$reg->nombre,
                "2"=>$actividad,
                "3"=>'<i class="fa fa-exclamation-circle"></i>'.' '.$reg->asunto,
                "4"=>$reg->contacto.'<br>'.$reg->razonsocial,
                "5"=>'<i class="fa fa-phone"></i>'.' '.$reg->tlf_1.'<br> <i class="fa fa-envelope"></i>'.' '.$reg->correo,
                "6"=>'<i class="fa fa-calendar"></i>'.' '.$reg->fec_evento.'<br> <i class="fa fa-clock"></i>'.' '.$reg->hora_evento,
                "7"=>$reg->duracion,
                "8"=>$mantenimiento
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
 
        $rspta = $contacto->listar();
 
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

	case 'selectUsuario':

		require_once "../modelos/Acceso.php";
		$usuarios = new Usuario();

		$rspta = $usuarios->listar();

		while ($reg = $rspta->fetch_object()) {
			
            echo '<option value=' . $reg->idusuario . '>' . $reg->nombre . '</option>';
		}
	break;
}

?>