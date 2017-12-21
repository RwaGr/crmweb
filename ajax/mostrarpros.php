<?php
require_once 'MostrarRegistros.php';

//echo "La verdad sea dicha";
$mostrar = new MostrarProspectos();
//
$rspta=$mostrar->mostrartabla();

$data= Array();

while ($reg=$rspta->fetch_object()){

    if ($reg->estado == 1){
        $estadocolor = '<span: class="label label-success">Prospecto</span>';
    } 

    switch ($reg->filtro) {
        
        case '2':
            $valor = 'Interes';
            break;

        case '3':
            $valor = 'Indeciso';
            break;
      
    }
    $data[]=array(
        "0"=>'<button class="btn btn-primary" data-toggle="modal" data-target="#modalMostrar" onclick="mostrarModal('.$reg->idcontacto.')"><i class="fa fa-fw fa-search"></i></button>'.'<button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="editarModal('.$reg->idcontacto.')"><i class="fa fa-fw fa-edit"></i></button>',
        "1"=>$reg->razonsocial,
        "2"=>$reg->contacto,
        "3"=>$reg->tlf_1,
        "4"=>$reg->correo,
        "5"=>$valor,
        "6"=>$estadocolor
    );
}
$results = array(
    "sEcho"=>1, //Información para el datatables
    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
    "aaData"=>$data);
echo json_encode($results);


