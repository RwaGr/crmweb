<?php 
require_once "../modelos/Contacto.php";
require_once "../config/Conexion.php";

$contacto = new Contacto();

$idcontacto=isset($_POST["idcontacto"])? limpiarCadena($_POST["idcontacto"]):"";
$razonsocial=isset($_POST["razonsocial"])? limpiarCadena($_POST["razonsocial"]):"";
$rut=isset($_POST["rut"])? limpiarCadena($_POST["rut"]):"";
$giro=isset($_POST["giro"])? limpiarCadena($_POST["giro"]):"";
$contacto=isset($_POST["contacto"])? limpiarCadena($_POST["contacto"]):"";
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
			
			$rspta=$contacto->insertar($razonsocial,$contacto,$tlf_1,$correo,$filtro,$estado);
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
			$rspta=$contacto->editar($idcontacto,$razonsocial,$rut,$giro,$contacto,$cargo,$tlf_1,$tlf_2,$correo,$region,$ciudad,$comuna,$direccion,$canal_deingreso,$filtro,$estado,$enlace,$codigopostal,$imagen,$sitioweb);
			echo $rspta ? "Contacto actualizado" : "Contacto no se pudo actualizar";
		}
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
			$rspta=$contacto->editarProspecto($idcontacto,$filtro,$estado);
			echo $rspta ? "Contacto actualizado" : "Contacto no se pudo actualizar";

	break;

	case 'mostrar':
		$rspta=$contacto->mostrar($idcontacto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

}

