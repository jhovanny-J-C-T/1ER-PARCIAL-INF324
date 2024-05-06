<?php
$conexion= mysqli_connect("localhost","root","","bdjhovany");
if(isset($_POST['registrar'])){
    if(strlen($_POST['nombre']) >=1 && strlen($_POST['apellidoPaterno'])  >=1 && strlen($_POST['apellidoMaterno'])  >=1 
    && strlen($_POST['ci'])  >=1 && strlen($_POST['telefono']) >= 1 && strlen($_POST['fechaNacimiento']) >= 1
    && strlen($_POST['direccion']) >= 1&& strlen($_POST['departamento']) >= 1&& strlen($_POST['password']) >= 1 ){
        
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellidoPaterno = mysqli_real_escape_string($conexion, $_POST['apellidoPaterno']);
    $apellidoMaterno = mysqli_real_escape_string($conexion, $_POST['apellidoMaterno']);
    $ci = mysqli_real_escape_string($conexion, $_POST['ci']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $fechaNacimiento = mysqli_real_escape_string($conexion, $_POST['fechaNacimiento']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $departamento = mysqli_real_escape_string($conexion, $_POST['departamento']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $consulta= "INSERT INTO persona (nombre, apellido_paterno, apellido_materno, ci, telefono, fecha_nacimiento, direccion, departamento, contraseña)
    VALUES ('$nombre', '$apellidoPaterno','$apellidoMaterno','$ci','$telefono','$fechaNacimiento','$direccion','$departamento','$password' )";

    mysqli_query($conexion,$consulta);
    mysqli_close($conexion);

    header('Location:login.php');
    }

}
?>
