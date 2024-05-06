<?php
session_start();
error_reporting(0);

$conexion = mysqli_connect("localhost", "root", "", "bdjhovany");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['monto'])) {
    $monto = $_POST['monto'];
    $cuenta_id = $_GET['id']; // Suponiendo que el ID de la cuenta se pasa por GET

    // Realizar la operación de depósito en la cuenta
    $sql_deposito = "UPDATE cuentabancaria SET saldo = saldo + $monto WHERE idcuenta = '$cuenta_id'";
    if (mysqli_query($conexion, $sql_deposito)) {
        // Registrar la transacción en la tabla transaccion
        $sql_transaccion = "INSERT INTO transaccion (cuenta_origen_id, tipo_transaccion, monto) VALUES ('$cuenta_id', 'deposito', $monto)";
        mysqli_query($conexion, $sql_transaccion);

        header('Location: cliente.php');
    } else {
        echo "Error al realizar el depósito: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depositar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Depositar</h5>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="monto">Monto a depositar</label>
                                <input type="text" class="form-control" id="monto" name="monto" placeholder="Ingrese el monto">
                            </div>
                            <button type="submit" class="btn btn-primary">Depositar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
