<?php
session_start();
require_once "../modelos/Acceso.php";
 
$usuario=new Usuario();
 
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$rut=isset($_POST["rut"])? limpiarCadena($_POST["rut"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
 
switch ($_GET["op"]){
    case 'guardaryeditar':
 
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
        {
            $imagen=$_POST["imagenactual"];
        }
        else
        {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
            {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
            }
        }
        //Hash SHA256 en la contraseña
        $clavehash=hash("SHA256",$clave);
 
        if (empty($idusuario)){
            if (empty($imagen)) {
                $imagen = "nouser.png";
            }
            $rspta=$usuario->insertar($nombre,$cargo,$rut,$email,$clavehash,$imagen,$_POST['permiso']);
            echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
        }
        else {
            $rspta=$usuario->editar($idusuario,$nombre,$cargo,$rut,$email,$clavehash,$imagen,$_POST['permiso']);
            echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
        }
    break;
 
    case 'desactivar':
        $rspta=$usuario->desactivar($idusuario);
        echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
    break;
 
    case 'activar':
        $rspta=$usuario->activar($idusuario);
        echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
    break;
 
    case 'mostrar':
        $rspta=$usuario->mostrar($idusuario);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
    break;
 
    case 'listar':
        $rspta=$usuario->listar();
        //Vamos a declarar un array
        $data= Array();
 
        while ($reg=$rspta->fetch_object()){

            if ($reg->email == 'admin') {

                $estado = '<button class="btn btn-secondary" onclick="desactivar('.$reg->idusuario.') disabled"><i class="fa fa-close"></i></button>';

                $editar = '<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-search"></i></button>'.
                          '<button class="btn btn-secondary" onclick="mostraru('.$reg->idusuario.') disabled"><i class="fa fa-edit"></i></button>';
            }else{

                $estado = ($reg->condicion)?'<button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>': 
                '<button class="btn btn-success" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>';
               
                $editar = '<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-search"></i></button>'.
                          '<button class="btn btn-primary" onclick="mostraru('.$reg->idusuario.')"><i class="fa fa-edit"></i></button>';
            }
            $data[]=array(
                "0"=>$editar,
                "1"=>$reg->idusuario,
                "2"=>$reg->nombre,
                "3"=>$reg->cargo,
                "4"=>$reg->rut,
                "5"=>$reg->email,
                "6"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >", 
                "7"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                '<span class="label bg-red">Desactivado</span>',
                "8"=>$estado
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
 
    break;

    case 'permisos':
        //Obtener los permisos de la tabla permisos
        $permiso = new Permiso();
        $rspta = $permiso->listar();

        //Obtener los permisos asignados al usuario
        $id = $_GET['id'];
        $marcados = $usuario->listarmarcados($id);
        //Declaramos el array para almacenar todos los permisos marcados
        $valores=array();
 
        //Almacenar los permisos asignados al usuario en el array
        while ($per = $marcados->fetch_object())
            {
                array_push($valores, $per->idpermiso);
            }
 
        //Mostramos la lista de permisos en la vista y si están o no marcados
        while ($reg = $rspta->fetch_object())
                {
                    $sw = in_array($reg->idpermiso,$valores)?'checked':'';
                    echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
                }
    break;

    case 'verificar':
        $emaila=$_POST['emaila'];
        $clavea=$_POST['clavea'];
 
        //Hash SHA256 en la contraseña
        $clavehash=hash("SHA256",$clavea);
 
        $rspta=$usuario->verificar($emaila, $clavehash);
 
        $fetch=$rspta->fetch_object();
 
        if (isset($fetch))
        {
            //Declaramos las variables de sesión
            $_SESSION['idusuario']=$fetch->idusuario;
            $_SESSION['nombre']=$fetch->nombre;
            $_SESSION['cargo']=$fetch->cargo;
            $_SESSION['imagen']=$fetch->imagen;
            $_SESSION['email']=$fetch->email;

            //Obtenemos los permisos del usuario
            $marcados = $usuario->listarmarcados($fetch->idusuario);
 
            //Declaramos el array para almacenar todos los permisos marcados
            $valores=array();
 
            //Almacenamos los permisos marcados en el array
            while ($per = $marcados->fetch_object())
                {
                    array_push($valores, $per->idpermiso);
                }
 
            //Determinamos los accesos del usuario
            in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
            in_array(2,$valores)?$_SESSION['contacto']=1:$_SESSION['contacto']=0;
            in_array(3,$valores)?$_SESSION['oportunidades']=1:$_SESSION['oportunidades']=0;
            in_array(4,$valores)?$_SESSION['articulos']=1:$_SESSION['articulos']=0;
            in_array(5,$valores)?$_SESSION['negociaciones']=1:$_SESSION['negociaciones']=0;
            in_array(6,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
            in_array(7,$valores)?$_SESSION['agenda']=1:$_SESSION['agenda']=0;
        
        }
        echo json_encode($fetch);
    break;

    case 'salir':
        
        //Limpia las variables de sesión
        session_unset();

        //Destruye la sesión
        session_destroy();

        //Redireciona al login
        header("Location: ../index.php");

    break;
}
