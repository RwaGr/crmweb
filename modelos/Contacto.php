<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Contacto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($razonsocial,$tlf_1,$correo,$filtro,$estado)
	{
		$sql="INSERT INTO contacto (razonsocial,tlf_1,correo,filtro,estado)
		VALUES ('$razonsocial','$tlf_1','$correo','$filtro','$estado')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcontacto,$razonsocial,$tlf_1,$correo,$filtro,$estado)
	{
		$sql="UPDATE contacto SET razonsocial='$razonsocial',tlf_1='$tlf_1',correo='$correo',filtro='$filtro',estado='$estado' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	/** Implementamos un método para desactivar categorías
	public function desactivar($idcontacto)
	{
		$sql="UPDATE contacto SET condicion='0' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcontacto)
	{
		$sql="UPDATE contacto SET condicion='1' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}*/

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
}

?>