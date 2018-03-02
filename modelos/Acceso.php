<?php 

	//Require a la Base de datos
	require "../config/Conexion.php";

/**-------------------------------------------------------------------- Permiso ----------------------------------------------------------*/

	Class Permiso
	{
		public function __construct()
		{

		}

		//Metodo para listar los registros
		public function listar()
		{
			$sql = "SELECT * FROM permiso";
			return ejecutarConsulta($sql);
		}
	}

/**-------------------------------------------------------------------- Usuario ----------------------------------------------------------*/

	Class Usuario
	{
		//Implementamos nuestro constructor
		public function __construct()
		{

		}

		//Implementamos un método para insertar registros
		public function insertar($nombre,$cargo,$rut,$email,$clave,$imagen,$permisos)
		{
			$sql = "INSERT INTO usuario (nombre,cargo,tipo,rut,email,clave,imagen,condicion)
			VALUES ('$nombre','$cargo','1','$rut','$email','$clave','$imagen','1')";

			//return ejecutarConsulta($sql)
			$idusuarionew = ejecutarConsulta_retornarID($sql);
			
			$num_elementos = 0;
			$sw = true;

			while ($num_elementos < count($permisos)) {

				$sql_detalle = "INSERT INTO usuario_permiso(idusuario,idpermiso) VALUES ('$idusuarionew', '$permisos[$num_elementos]')";
				
				ejecutarConsulta($sql_detalle) or $sw = false;
				$num_elementos = $num_elementos + 1;
			}

			return $sw;
		}

		//Implementamos un método para editar registros
		public function editar($idusuario,$nombre,$cargo,$rut,$email,$clave,$imagen,$permisos)
		{
			$sql="UPDATE usuario SET nombre = '$nombre',cargo = '$cargo',rut = '$rut',email = '$email',clave = '$clave',imagen = '$imagen' WHERE idusuario='$idusuario'";
			ejecutarConsulta($sql);

			//Eliminamos todos los permisos asignados para volver a registrar
			$sqldel = "DELETE FROM usuario_permiso WHERE idusuario = '$idusuario'";
			ejecutarConsulta($sqldel);

			$num_elementos = 0;
			$sw = true;

			while ($num_elementos < count($permisos)) {

				$sql_detalle = "INSERT INTO usuario_permiso(idusuario,idpermiso) VALUES ('$idusuario', '$permisos[$num_elementos]')";
				
				ejecutarConsulta($sql_detalle) or $sw = false;
				$num_elementos = $num_elementos + 1;
			}

			return $sw;
		}

		//Implementamos un método para desactivar categorías
		public function desactivar($idusuario)
		{
			$sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
			return ejecutarConsulta($sql);
		}

		//Implementamos un método para activar categorías
		public function activar($idusuario)
		{
			$sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
			return ejecutarConsulta($sql);
		}

		//Implementar un método para mostrar los datos de un registro a modificar
		public function mostrar($idusuario)
		{
			$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
			return ejecutarConsultaSimpleFila($sql);
		}

		//Implementar un método para listar los registros
		public function listar()
		{
			$sql="SELECT * FROM usuario";
			return ejecutarConsulta($sql);		
		}

		//Implementar un método para listar los permisos marcados
	    public function listarmarcados($idusuario)
	    {
	        $sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
	        return ejecutarConsulta($sql);
	    }
	 
	    //Función para verificar el acceso al sistema
	    public function verificar($email,$clave)
	    {
	        $sql="SELECT * FROM usuario WHERE email='$email' AND clave='$clave' AND condicion='1'"; 
	        return ejecutarConsulta($sql);  
	    }

		
	}

?>