<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Contacto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
//-------------------------------------------------------      CONTACTO         ------------------------------------------------------------
	//Implementamos un método para insertar registros
	public function insertar($razonsocial,$contacto,$tlf_1,$correo,$filtro,$estado)
	{
		$sql="INSERT INTO contacto (razonsocial,contacto,tlf_1,correo,filtro,estado)
		VALUES ('$razonsocial', '$contacto','$tlf_1','$correo','$filtro','$estado')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcontacto,$razonsocial,$rut,$giro,$contacto,$cargo,$tlf_1,$tlf_2,$correo,$region,$ciudad,$comuna,$direccion,$canal_deingreso,$filtro,$estado,$enlace,$fec_ingreso,$codigopostal,$imagen,$sitioweb)
	{
		$sql="UPDATE contacto SET razonsocial='$razonsocial',rut='$rut',giro='$giro',contacto='$contacto',cargo='$cargo',tlf_1='$tlf_1',tlf_2='$tlf_2',correo='$correo',region='$region',ciudad='$ciudad',comuna='$comuna',direccion='$direccion',canal_deingreso='$canal_deingreso',filtro='$filtro',estado='$estado',enlace='$enlace', fec_ingreso='$fec_ingreso', codigopostal='$codigopostal', imagen='$imagen', sitioweb='$sitioweb' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcontacto)
	{
		$sql="SELECT * FROM contacto WHERE idcontacto='$idcontacto'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM contacto";
		return ejecutarConsulta($sql);		
	}

//-------------------------------------------------------      PROSPECTO        ------------------------------------------------------------

	public function editarProspecto($idcontacto,$filtro,$estado)
	{
		$sql="UPDATE contacto SET filtro='$filtro',estado='$estado' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	public function listarProspecto()
	{
		$sql="SELECT * FROM contacto WHERE estado = 1";
		return ejecutarConsulta($sql);		
	}
	
}

?>