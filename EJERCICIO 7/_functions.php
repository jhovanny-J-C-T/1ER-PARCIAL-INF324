<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;
		}
	}

    

function acceso_user() {
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","","bdjhovany");
    $consulta= "SELECT * FROM persona WHERE nombre='$nombre' AND contraseña='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: admin.php');

    }else if($filas['rol'] == 2){//cliente
        header('Location: cliente.php');
    }
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}



