<?php
require_once 'MostrarRegistros.php';
/**
 * Created by PhpStorm.
 * User: seventrust
 * Date: 19-12-17
 * Time: 22:30
 */
//echo "La verdad sea dicha";
$mostrar = new MostrarRegistros();
//
$rspta=$mostrar->mostrar();

$data= Array();

while ($reg=$rspta->fetch_object()){

    if ($reg->estado == 1){
        $estadocolor = '<span: class="label label-success">Prospecto</span>';
    } else if ($reg->estado == 2){
        $estadocolor = '<span: class="label label-warning" >Pendiente</span>';
    }  else if ($reg->estado == 3){
        $estadocolor = '<span: class="label label-danger">No interes</span>';
    }

    switch ($reg->filtro) {
        case '1':
            $valor = 'Sin contactar';
            break;

        case '2':
            $valor = 'Interes';
            break;

        case '3':
            $valor = 'Indeciso';
            break;

        case '4':
            $valor = 'No contesta';
            break;

        case '5':
            $valor = 'Volver a llamar';
            break;

        case '6':
            $valor = 'Sin interes';
            break;
    }
    $data[]=array(
        "0"=>'<button class="btn btn-primary" data-toggle="modal" data-target="#modalMostrar" onclick="mostrarModal('.$reg->idcontacto.')"><i class="fa fa-fw fa-search"></i></button>'.'<button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="editarModal('.$reg->idcontacto.')"><i class="fa fa-fw fa-edit"></i></button>',
        "1"=>$reg->razonsocial,
        "2"=>$reg->tlf_1,
        "3"=>$reg->correo,
        "4"=>$valor,
        "5"=>$estadocolor
    );
}
$results = array(
    "sEcho"=>1, //Información para el datatables
    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
    "aaData"=>$data);
echo json_encode($results);


