<?php 

//Require a la Base de datos
require "../config/Conexion.php";

//-------------------------------------------------------      CONTACTO        ------------------------------------------------------------

//Clase para mantenimiento de contactos y prospectos del sistema
Class Contacto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//método para insertar contactos
	public function insertar($razonsocial,$rut,$giro,$contacto,$cargo,$tlf_1,$tlf_2,$correo,$region,$ciudad,$comuna,$direccion,$canal_deingreso,$filtro,$estado,$enlace,$codigopostal,$imagen,$sitioweb)
	{
		$sql="INSERT INTO contacto (razonsocial,rut,giro,contacto,cargo,tlf_1,tlf_2,correo,region,ciudad,comuna,direccion,canal_deingreso,filtro,estado,enlace,codigopostal,imagen,sitioweb)
		VALUES ('$razonsocial','$rut','$giro','$contacto','$cargo','$tlf_1','$tlf_2','$correo','$region','$ciudad','$comuna','$direccion','$canal_deingreso','$filtro','$estado','$enlace','$codigopostal','$imagen','$sitioweb')";
		return ejecutarConsulta($sql);
	}

	//método para editar contactos
	public function editar($idcontacto,$razonsocial,$rut,$giro,$contacto,$cargo,$tlf_1,$tlf_2,$correo,$region,$ciudad,$comuna,$direccion,$canal_deingreso,$filtro,$estado,$enlace,$codigopostal,$imagen,$sitioweb)
	{
		$sql="UPDATE contacto SET razonsocial='$razonsocial',rut='$rut',giro='$giro',contacto='$contacto',cargo='$cargo',tlf_1='$tlf_1',tlf_2='$tlf_2',correo='$correo',region='$region',ciudad='$ciudad',comuna='$comuna',direccion='$direccion',canal_deingreso='$canal_deingreso',filtro='$filtro',estado='$estado',enlace='$enlace', codigopostal='$codigopostal', imagen='$imagen', sitioweb='$sitioweb' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	//método para mostrar los datos de un contacto
	public function mostrar($idcontacto)
	{
		$sql="SELECT * FROM contacto WHERE idcontacto='$idcontacto'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//método para listar los contactos
	public function listar()
	{
		$sql="SELECT idcontacto,razonsocial,contacto,tlf_1,correo,imagen,DATE(fec_ingreso) as fec_ingreso,filtro,estado FROM contacto";
		return ejecutarConsulta($sql);		
	}

	//método para eliminar los contactos
	public function eliminar($idcontacto)
	{
		$sql="DELETE FROM contacto WHERE idcontacto='$idcontacto'";
        return ejecutarConsulta($sql);	
	}

//-------------------------------------------------------      PROSPECTO       ------------------------------------------------------------

	//método para editar los datos de un prospecto
	public function editarProspecto($idcontacto,$filtro,$estado)
	{
		$sql="UPDATE contacto SET filtro='$filtro',estado='$estado' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	//método para listar los prospectos
	public function listarProspecto()
	{
		$sql="SELECT idcontacto,razonsocial,contacto,tlf_1,correo,imagen,DATE(fec_ingreso) as fec_ingreso,filtro,estado FROM contacto WHERE estado = 1";
		return ejecutarConsulta($sql);		
	}
	
}

//-------------------------------------------------------      ARTICULOS       ------------------------------------------------------------


Class Articulo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//método para insertar articulos
	public function insertar($nombre,$descripcion,$valor,$imagen)
	{
		$sql="INSERT INTO articulo_det (nombre,descripcion,valor,imagen,condicion)
		VALUES ('$nombre','$descripcion','$valor','$imagen','1')";
		return ejecutarConsulta($sql);
	}

	//método para editar articulos
	public function editar($idarticulo,$nombre,$descripcion,$valor,$imagen)
	{
		$sql="UPDATE articulo_det SET nombre='$nombre',descripcion='$descripcion',valor='$valor',imagen='$imagen' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//método para desactivar articulos
	public function desactivar($idarticulo)
	{
		$sql="UPDATE articulo_det SET condicion='0' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//método para activar articulos
	public function activar($idarticulo)
	{
		$sql="UPDATE articulo_det SET condicion='1' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//método para mostrar los datos de un articulo 
	public function mostrar($idarticulo)
	{
		$sql="SELECT * FROM articulo_det WHERE idarticulo='$idarticulo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//método para listar los articulos
	public function listar()
	{
		$sql="SELECT * FROM articulo_det";
		return ejecutarConsulta($sql);		
	}

	//método para eliminar articulo
	public function eliminar($idarticulo)
	{
		$sql="DELETE FROM articulo_det WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);	
	}

	//Implementar un método para listar los registros activos, su último precio (vamos a unir con el último registro de la tabla detallecot)
	public function listarActivosVenta()
	{
		$sql = "SELECT * FROM articulo_det WHERE condicion = '1'";
		return ejecutarConsulta($sql);
	}
}

?>