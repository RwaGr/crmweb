<?php 
require_once "../modelos/Contacto.php";
require_once "../config/Conexion.php";

$contacto = new Contacto();

$idcontacto=$_POST["idcontacto"];
$razonsocial=$_POST["razonsocial"];
$tlf_1=$_POST["tlf_1"];
$correo=$_POST["correo"];
$filtro=$_POST["filtro"];
$estado=$_POST["estado"];
$op=$_POST["op"];

switch ($op){
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

}