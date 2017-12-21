<?php
require_once "../modelos/Contacto.php"; 
require_once "../config/Conexion.php";

/**
 * Created by PhpStorm.
 * User: seventrust
 * Date: 19-12-17
 * Time: 22:18
 */
class MostrarContactos
{
    private $contacto;

    function __construct()
    {
        $this->contacto = new Contacto();
    }

    public function mostrartabla(){
        return $this->contacto->listar();
    }

}

class MostrarProspectos
{
    private $prospecto;

    function __construct()
    {
        $this->prospecto = new Contacto();
    }

    public function mostrartabla(){
        return $this->prospecto->listarProspecto();
    }

}
