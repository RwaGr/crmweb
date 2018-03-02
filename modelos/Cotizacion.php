<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
 
Class Cotizacion
{
    //Implementamos nuestro constructor
    public function __construct()
    {
 
    }
 
    //Implementamos un método para insertar registros
    public function insertar($idcontacto,$idusuario,$serie,$descripcion,$impuesto,$total,$idarticulo,$cantidad,$precio_venta,$descuento)
    {
        $sql="INSERT INTO cotizacion (idcontacto,idusuario,serie,descripcion,impuesto,total,estado)
        VALUES ('$idcontacto','$idusuario','$serie','$descripcion','$impuesto','$total','Negociando')";
        //return ejecutarConsulta($sql);
        $idcotnew=ejecutarConsulta_retornarID($sql);
 
        $num_elementos=0;
        $sw=true;
 
        while ($num_elementos < count($idarticulo))
        {
            $sql_detalle = "INSERT INTO detalle_cot(idcotizacion, idarticulo,cantidad,precio_venta,descuento) VALUES ('$idcotnew', '$idarticulo[$num_elementos]','$cantidad[$num_elementos]','$precio_venta[$num_elementos]','$descuento[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos + 1;
        }
 
        return $sw;
    }
 
     
    //Implementamos un método para anular la venta
    public function anular($idcotizacion)
    {
        $sql="UPDATE cotizacion SET estado='Anulado' WHERE idcotizacion='$idcotizacion'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para anular la venta
    public function aprobar($idcotizacion)
    {
        $sql="UPDATE cotizacion SET estado='Aprobado' WHERE idcotizacion='$idcotizacion'";
        return ejecutarConsulta($sql);
    }
 
 
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcotizacion)
    {
        $sql="SELECT * FROM cotizacion WHERE idcotizacion = '$idcotizacion'";
        return ejecutarConsultaSimpleFila($sql);
    }
 
    public function listarDetalle($idcotizacion)
    {
        $sql="SELECT dc.idcotizacion,dc.idarticulo,a.nombre,dc.cantidad,dc.precio_venta,dc.descuento,(dc.cantidad*dc.precio_venta-((dc.cantidad*dc.precio_venta)*(dc.descuento/100))) as subtotal, c.impuesto FROM detalle_cot dc inner join articulo_det a on dc.idarticulo=a.idarticulo INNER JOIN cotizacion c ON dc.idcotizacion = c.idcotizacion where dc.idcotizacion='$idcotizacion'";
        return ejecutarConsulta($sql);
    }
 
    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT c.idcotizacion,DATE(c.fec_generada) as fecha,c.idcontacto,p.razonsocial,p.contacto,p.tlf_1,p.tlf_2,p.correo,p.rut,u.idusuario,u.nombre as usuario,c.serie,c.total,c.impuesto,c.estado FROM cotizacion c INNER JOIN contacto p ON c.idcontacto=p.idcontacto INNER JOIN usuario u ON c.idusuario=u.idusuario WHERE c.estado <> 'Aprobado' ORDER BY c.idcotizacion desc";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para listar los registros
    public function listarventas()
    {
        $sql="SELECT c.idcotizacion,DATE(c.fec_generada) as fecha,c.idcontacto,p.razonsocial,p.contacto,p.tlf_1,p.tlf_2,p.correo,p.rut,u.idusuario,u.nombre as usuario,c.serie,c.total,c.impuesto,c.estado FROM cotizacion c INNER JOIN contacto p ON c.idcontacto=p.idcontacto INNER JOIN usuario u ON c.idusuario=u.idusuario WHERE c.estado = 'Aprobado' ORDER BY c.idcotizacion desc";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para listar los registros
    public function listarID()
    {
        $sql="SELECT * FROM cotizacion ORDER BY idcotizacion DESC LIMIT 1";
        return ejecutarConsulta($sql);      
    }
     
}
?>