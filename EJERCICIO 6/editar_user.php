<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: login.php");
    die();
}

// Verificar si se pasó el parámetro 'id' en la URL
if (!isset($_GET['id'])) {
    echo "No se especificó un ID de usuario.";
    exit;
}

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "bdjhovany");
$consulta = "SELECT * FROM persona WHERE idpersona = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $ci = $_POST['ci'];
    $telefono = $_POST['telefono'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $direccion = $_POST['direccion'];
    $departamento = $_POST['departamento'];
    $password = $_POST['password'];

    $actualizar = "UPDATE persona SET nombre='$nombre', apellido_paterno='$apellidoPaterno', apellido_materno='$apellidoMaterno', ci='$ci', telefono='$telefono', fecha_nacimiento='$fechaNacimiento', direccion='$direccion', departamento='$departamento', contraseña='$password' WHERE idpersona=$id";

    if (mysqli_query($conexion, $actualizar)) {
        echo "Registro actualizado correctamente.";
        header('Location: cliente.php');
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Banco INF-324</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: transparent;
            color: #28a745;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            font-size: 32px; 
            font-family: Arial, sans-serif;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span style="color: #28a745;">Editar Usuario</span>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidoPaterno">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo $usuario['apellido_paterno']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="apellidoMaterno">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo $usuario['apellido_materno']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ci">Carnet de Identidad</label>
                            <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $usuario['ci']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $usuario['fecha_nacimiento']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="departamento">Departamento</label>
                            <select id="departamento" class="form-control" name="departamento" required>
                                <option value="">Selecciona...</option>
                                <option <?php if ($usuario['departamento'] == 'Beni') echo 'selected'; ?>>Beni</option>
                                <option <?php if ($usuario['departamento'] == 'Chuquisaca') echo 'selected'; ?>>Chuquisaca</option>
                                <option <?php if ($usuario['departamento'] == 'Cochabamba') echo 'selected'; ?>>Cochabamba</option>
                                <option <?php if ($usuario['departamento'] == 'La Paz') echo 'selected'; ?>>La Paz</option>
                                <option <?php if ($usuario['departamento'] == 'Oruro') echo 'selected'; ?>>Oruro</option>
                                <option <?php if ($usuario['departamento'] == 'Pando') echo 'selected'; ?>>Pando</option>
                                <option <?php if ($usuario['departamento'] == 'Potosí') echo 'selected'; ?>>Potosí</option>
                                <option <?php if ($usuario['departamento'] == 'Santa Cruz') echo 'selected'; ?>>Santa Cruz</option>
                                <option <?php if ($usuario['departamento'] == 'Tarija') echo 'selected'; ?>>Tarija</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="" value="<?php echo $usuario['contraseña'];?>" required>
                        <input type="hidden" name="accion" value="editar_registro">
                         <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary" name="editar" style="width: 150px;">Guardar Cambios</button>
                        <a href="listar_usuarios.php" class="btn btn-danger" style="width: 150px;">Cancelar</a>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
