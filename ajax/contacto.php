<?php 

//LLamado a la clase Categoria

require_once "../modelos/Clases.php";

$contactos = new Contacto();

//Seteado de las variables recibidas

$idcontacto=isset($_POST["idcontacto"])? limpiarCadena($_POST["idcontacto"]):"";
$razonsocial=isset($_POST["razonsocial"])? limpiarCadena($_POST["razonsocial"]):"";
$rut=isset($_POST["rut"])? limpiarCadena($_POST["rut"]):"";
$giro=isset($_POST["giro"])? limpiarCadena($_POST["giro"]):"";
$contacto=isset($_POST["contacto"])? limpiarCadena($_POST["contacto"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$tlf_1=isset($_POST["tlf_1"])? limpiarCadena($_POST["tlf_1"]):"";
$tlf_2=isset($_POST["tlf_2"])? limpiarCadena($_POST["tlf_2"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$region=isset($_POST["region"])? limpiarCadena($_POST["region"]):"";
$ciudad=isset($_POST["ciudad"])? limpiarCadena($_POST["ciudad"]):"";
$comuna=isset($_POST["comuna"])? limpiarCadena($_POST["comuna"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$canal_deingreso=isset($_POST["canal_deingreso"])? limpiarCadena($_POST["canal_deingreso"]):"";
$filtro=isset($_POST["filtro"])? limpiarCadena($_POST["filtro"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
$enlace=isset($_POST["enlace"])? limpiarCadena($_POST["enlace"]):"";
$fec_ingreso=isset($_POST["fec_ingreso"])? limpiarCadena($_POST["fec_ingreso"]):"";
$codigopostal=isset($_POST["codigopostal"])? limpiarCadena($_POST["codigopostal"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$sitioweb=isset($_POST["sitioweb"])? limpiarCadena($_POST["sitioweb"]):"";

//Recibe la var OP que proviene de la petición Ajax
switch ($_GET["op"]){ 

	//Si no existe idcontacto guarda un nuevo registro sino recibe el idcontacto y ejecuta editar
	case 'guardaryeditar':

		//Condicion para agregar imagen
		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			
			$imagen = $_POST["imagenactual"];

		} else {

			$ext = explode(".", $_FILES['imagen']['name']);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") 
				{
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file(($_FILES['imagen']['tmp_name']), "../files/contactos/" . $imagen);
				}	
		}

		//Establece la regla para el estado del contacto dependiendo del filtro
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

		if (empty($idcontacto)){
			if (empty($imagen)) {
				$imagen = "noavatar.png";
			}
			$rspta = $contactos->insertar($razonsocial,$rut,$giro,$contacto,$cargo,$tlf_1,$tlf_2,$correo,$region,$ciudad,$comuna,$direccion,$canal_deingreso,$filtro,$estado,$enlace,$codigopostal,$imagen,$sitioweb);
			echo $rspta ? "Contacto registrado" : "Contacto no se pudo registrar";
		}
		else {

			$rspta = $contactos->editar($idcontacto,$razonsocial,$rut,$giro,$contacto,$cargo,$tlf_1,$tlf_2,$correo,$region,$ciudad,$comuna,$direccion,$canal_deingreso,$filtro,$estado,$enlace,$codigopostal,$imagen,$sitioweb);
			echo $rspta ? "Contacto actualizado" : "Contacto no se pudo actualizar";
		}
	break;


	case 'mostrar':

		$rspta=$contactos->mostrar($idcontacto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'eliminar':
		$rspta=$contactos->eliminar($idcontacto);
 		//Codificar el resultado utilizando json
 		echo $rspta ? "Contacto eliminado" : "Contacto no se pudo eliminar";
	break;

	case 'listar':

		$rspta = $contactos->listar();
 		//Vamos a declarar un array
 		$data = Array();

 		while ($reg = $rspta->fetch_object()){

 			//Agrega a la tabla un color para cada estado
	 		if ($reg->estado == 1)
	 		{
	        	$estadocolor = '<span: class="label label-success">Prospecto</span>';
	    	} 
	    	else if ($reg->estado == 2)
	    	{
	        	$estadocolor = '<span: class="label label-warning" >Pendiente</span>';
	    	}  
	    	else if ($reg->estado == 3)
	    	{
	       	    $estadocolor = '<span: class="label label-danger">No interes</span>';
	   		}

	   		//Agrega a la tabla un string al filtro
	   		switch ($reg->filtro) {

        		case '1':
           			$valor = '<b>Sin contactar</b>';
           		break;

        		case '2':
            		$valor = '<b>Interes</b>';
           		break;

        		case '3':
            		$valor = '<b>Indeciso</b>';
            	break;

        		case '4':
            		$valor = '<b>No contesta</b>';
            	break;

        		case '5':
            		$valor = '<b>Volver a llamar</b>';
            	break;

        		case '6':
            		$valor = '<b>Sin interes</b>';
            	break;
    		}

    		//Recorre el array escribiendo los registros en la tabla
 			$data[]=array(  
 				"0"=>
 				'<button class="btn btn-warning" onclick="mostrar('.$reg->idcontacto.')"><i class="fa fa-search"></i></button>'.
 				'<button class="btn btn-primary" onclick="mostrarc('.$reg->idcontacto.')"><i class="fa fa-edit"></i></button>'.
 				'<button class="btn btn-danger" onclick="eliminar('.$reg->idcontacto.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->idcontacto,
 				"2"=>$reg->razonsocial,
        		"3"=>$reg->contacto,
        		"4"=>$reg->tlf_1,
        		"5"=>$reg->correo,
        		"6"=>"<img src='../files/contactos/".$reg->imagen."' height='50px' width='50px' >",
        		"7"=>$reg->fec_ingreso,
        		"8"=>$valor,
        		"9"=>$estadocolor
 			);

 		}

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'editarprospec':

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
			$rspta = $contactos->editarProspecto($idcontacto,$filtro,$estado);
			echo $rspta ? "Contacto actualizado" : "Contacto no se pudo actualizar";

	break;

	case 'listarprospecto':

		$rspta = $contactos->listarProspecto();

		$data = Array();

		while ($reg = $rspta->fetch_object()){

		//Agrega a la tabla un color para cada estado
   		if ($reg->estado == 1){

        	$estadocolor = '<span: class="label label-success">Prospecto</span>';
    	} 

    	//Agrega a la tabla un string al filtro
    	switch ($reg->filtro) {
        
        	case '2':
           		$valor = 'Interes';
            break;

        	case '3':
            	$valor = 'Indeciso';
            break;
        }

        //Recorre el array escribiendo los registros en la tabla
    	$data[]=array(
        	"0"=>
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idcontacto.')"><i class="fa fa-search"></i></button>'.
				'<button class="btn btn-primary" onclick="mostrarp('.$reg->idcontacto.')"><i class="fa fa-edit"></i></button>'.
				'<button class="btn btn-success" onclick="cotizar('.$reg->idcontacto.')"><i class="fa fa-ticket"></i></button>',
				"1"=>$reg->idcontacto,
				"2"=>$reg->razonsocial,
			"3"=>$reg->contacto,
			"4"=>$reg->tlf_1,
			"5"=>$reg->correo,
			"6"=>"<img src='../files/contactos/".$reg->imagen."' height='50px' width='50px' >",
			"7"=>$reg->fec_ingreso,
			"8"=>$valor,
			"9"=>$estadocolor
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