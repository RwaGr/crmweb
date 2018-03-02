<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
 
Class Agenda
{
    //Implementamos nuestro constructor
    public function __construct()
    {
 
    }
 
    //Implementamos un método para insertar registros
    public function insertar($asunto,$descripcion,$fec_evento,$hora_evento,$duracion,$tipo_evento,$idusuario,$idcontacto)
    {
        $sql="INSERT INTO agendar (asunto,descripcion,fec_evento,hora_evento,duracion,tipo_evento,idusuario,idcontacto,mantenimiento,estado)
        VALUES ('$asunto','$descripcion','$fec_evento','$hora_evento','$duracion','$tipo_evento','$idusuario','$idcontacto','Pendiente','1')";
        return ejecutarConsulta($sql);
    }
 
    //método para editar 
    public function editar($idagenda,$fec_evento,$hora_evento,$duracion,$idusuario)
    {
        $sql="UPDATE agendar SET fec_evento='$fec_evento',hora_evento='$hora_evento',duracion='$duracion',idusuario='$idusuario', mantenimiento='Pendiente', estado='1' WHERE idagenda='$idagenda'";
        return ejecutarConsulta($sql);
    }
    //método para comparar 
    public function fechaperdida($idagenda)
    {   
        $sql="UPDATE agendar SET estado='1', mantenimiento='Perdido' WHERE idagenda='$idagenda'";
        return ejecutarConsulta($sql);
    }
    //Implementamos un método para descartar 
    public function descartar($idagenda)
    {
        $sql="UPDATE agendar SET estado='1', mantenimiento='Descartado' WHERE idagenda='$idagenda'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para posponer 
    public function posponer($idagenda)
    {
        $sql="UPDATE agendar SET fec_evento='Pospuesto',hora_evento='',duracion='', mantenimiento='Pospuesto', estado='0' WHERE idagenda='$idagenda'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para completar evento  
    public function completar($idagenda)
    {
        $sql="UPDATE agendar SET estado='1', mantenimiento='Completado' WHERE idagenda='$idagenda'";
        return ejecutarConsulta($sql);
    }
 
 
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idagenda)
    {
        $sql="SELECT * FROM agendar WHERE idagenda = '$idagenda'";
        return ejecutarConsultaSimpleFila($sql);
    }
 
    
    //Implementar un método para listar las actividades Pendientes y Pospuestos
    public function listarpendientes()
    {
        $sql="SELECT a.idagenda, a.asunto, a.fec_evento, a.hora_evento, a.duracion, a.tipo_evento, a.mantenimiento, a.estado, c.contacto, c.razonsocial, c.tlf_1, c.correo, u.nombre FROM agendar a INNER JOIN contacto c ON a.idcontacto=c.idcontacto INNER JOIN usuario u ON a.idusuario=u.idusuario WHERE a.mantenimiento = 'Pendiente' OR a.mantenimiento = 'Pospuesto' ORDER by a.idagenda desc";
        return ejecutarConsulta($sql);     
    }

    //Implementar un método para listar las actividades Pendientes y Pospuestos
    public function listardescartado()
    {
        $sql="SELECT a.idagenda, a.asunto, a.fec_evento, a.hora_evento, a.duracion, a.tipo_evento, a.mantenimiento, c.contacto, c.razonsocial, c.tlf_1, c.correo, u.nombre FROM agendar a INNER JOIN contacto c ON a.idcontacto=c.idcontacto INNER JOIN usuario u ON a.idusuario=u.idusuario WHERE a.mantenimiento = 'Descartado' OR a.mantenimiento = 'Perdido' ORDER by a.idagenda desc";
        return ejecutarConsulta($sql);     
    }

    //Implementar un método para listar las actividades Pendientes y Pospuestos
    public function listarcompletado()
    {
        $sql="SELECT a.idagenda, a.asunto, a.fec_evento, a.hora_evento, a.duracion, a.tipo_evento, a.mantenimiento, c.contacto, c.razonsocial, c.tlf_1, c.correo, u.nombre FROM agendar a INNER JOIN contacto c ON a.idcontacto=c.idcontacto INNER JOIN usuario u ON a.idusuario=u.idusuario WHERE a.mantenimiento = 'Completado' ORDER by a.idagenda desc";
        return ejecutarConsulta($sql);     
    }

    public function listar()
    {
        $sql = "SELECT * FROM agendar WHERE mantenimiento = 'Pendiente'";
        return ejecutarConsulta($sql);
    }
     
}
?>