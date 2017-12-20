<?php
require_once "../modelos/Contacto.php";
require_once "../config/Conexion.php";

/**
 * Created by PhpStorm.
 * User: seventrust
 * Date: 19-12-17
 * Time: 22:18
 */
class MostrarRegistros
{
    private $contacto;

    function __construct()
    {
        $this->contacto = new Contacto();
    }

    public function mostrar(){
        return $this->contacto->listar();
    }

}
