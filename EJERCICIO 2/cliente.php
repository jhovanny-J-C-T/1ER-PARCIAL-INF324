<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location:login.php");
    die();
}

$conexion = mysqli_connect("localhost", "root", "", "bdjhovany");

$SQL = "SELECT * FROM Persona LEFT JOIN permisos ON persona.rol=permisos.id WHERE nombre = '" . $_SESSION['nombre'] . "'";
$dato = mysqli_query($conexion, $SQL);

// Consulta para obtener las cuentas bancarias del usuario
$SQL_cuentas = "SELECT * FROM cuentabancaria WHERE persona_id = (SELECT idpersona FROM Persona WHERE nombre = '" . $_SESSION['nombre'] . "')";
$result_cuentas = mysqli_query($conexion, $SQL_cuentas);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del Usuario - Banco INF-324</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #28a745;
            color: #fff;
            text-align: center;
            font-weight: bold;
            padding: 20px;
            border-radius: 5px 5px 0 0;
            font-size: 32px; 
            font-family: Arial, sans-serif;
            /* Cambio de fondo a blanco */
            background-color: #ffffff;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            width: 33.33%;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }
        .table td, .table th {
            border-top: none;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .btn-action {
            margin-bottom: 10px;
        }
        .btn-logout {
            background-color: #dc3545; /* Color rojo */
            border-color: #28a745;
            width: 33.33%;
        }
        .btn-logout:hover {
            background-color: #c82333; /* Color rojo más oscuro en hover */
            border-color: #c82333;
        }
        .btn-editar {
            background-color: #007bff; /* Color azul */
            border-color: #007bff;
            color: #fff;
        }
        .btn-editar:hover {
            background-color: #0056b3; /* Color azul más oscuro en hover */
            border-color: #0056b3;
        }
        .btn-retiro {
            background-color: #dc3545; /* Color rojo */
            border-color: #dc3545;
            color: #fff;
        }
        .btn-retiro:hover {
            background-color: #c82333; /* Color rojo más oscuro en hover */
            border-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span style="font-size: 36px; color: #28a745;">Bienvenido, <?php echo $_SESSION['nombre']; ?></span>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $fila['nombre']; ?> <?php echo $fila['apellido_paterno']; ?> <?php echo $fila['apellido_materno']; ?></h5>
                                        <p class="card-text"><strong>ID:</strong> <?php echo $fila['idpersona']; ?></p>
                                        <p class="card-text"><strong>CI:</strong> <?php echo $fila['ci']; ?></p>
                                        <p class="card-text"><strong>Teléfono:</strong> <?php echo $fila['telefono']; ?></p>
                                        <p class="card-text"><strong>Fecha de Nacimiento:</strong> <?php echo $fila['fecha_nacimiento']; ?></p>
                                        <p class="card-text"><strong>Dirección:</strong> <?php echo $fila['direccion']; ?></p>
                                        <p class="card-text"><strong>Departamento:</strong> <?php echo $fila['departamento']; ?></p>
                                        <a href="editar_user.php?id=<?php echo $fila['idpersona']?> " class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="cerrarSesion.php" class="btn btn-logout" style="color: white;"><i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="container">
                <div class="card-body">
                    <h5>Sus cuentas:</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Número de Cuenta</th>
                                <th>Tipo de Cuenta</th>
                                <th>Saldo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_cuentas->num_rows > 0) {
                                while ($row = $result_cuentas->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["idcuenta"] . "</td>";
                                    echo "<td>" . $row["tipo_cuenta"] . "</td>";
                                    echo "<td>$" . $row["saldo"] . "</td>";
                                    echo '<td class="btn-group">';
                                    echo '<a href="depositar.php?id=' . $row["idcuenta"] . '" class="btn btn-success btn-sm btn-action"><i class="fas fa-arrow-alt-circle-up"></i> Depositar</a>';
                                    echo '<a href="retirar.php?id=' . $row["idcuenta"] . '" class="btn btn-warning btn-sm btn-action"><i class="fas fa-arrow-alt-circle-down"></i> Retirar</a>';
                                    echo '<a href="transferir.php?id=' . $row["idcuenta"] . '" class="btn btn-info btn-sm btn-action"><i class="fas fa-exchange-alt"></i> Transferir</a>';
                                    echo '<a href="eliminar_cuenta.php?id=' . $row["idcuenta"] . '" class="btn btn-danger btn-sm btn-action"><i class="fas fa-trash-alt"></i> Eliminar</a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No se encontraron cuentas.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="crearcuenta.php" class="btn btn-primary">Crear Nueva Cuenta</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
