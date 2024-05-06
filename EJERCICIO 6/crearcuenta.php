<?php
// Establecer conexión a la base de datos (reemplazar con tus datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdjhovany";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $persona_id = $_POST["persona_id"];
    $tipo_cuenta = $_POST["tipo_cuenta"];
    $saldo = $_POST["saldo"];

    // Insertar nueva cuenta bancaria
    $sql = "INSERT INTO `cuentabancaria` (`persona_id`, `tipo_cuenta`, `saldo`) VALUES ('$persona_id', '$tipo_cuenta', '$saldo')";
    if ($conn->query($sql) === TRUE) {
        $message = "Nueva cuenta agregada exitosamente.";
    } else {
        $message = "Error al agregar la cuenta: " . $conn->error;
    }

    // Redirigir después de mostrar el mensaje
    header("Location: cliente.php?message=" . urlencode($message));
    exit(); // asegurar que el script se detenga después de la redirección
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Cuenta Bancaria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Nueva Cuenta Bancaria</h2>
        <?php if (!empty($message)) : ?>
            <div class="alert <?php echo $message === "Nueva cuenta agregada exitosamente." ? "alert-success" : "alert-danger"; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="persona_id">ID de Persona:</label>
                <input type="text" class="form-control" id="persona_id" name="persona_id" required>
            </div>
            <div class="form-group">
                <label for="tipo_cuenta">Tipo de Cuenta:</label>
                <select class="form-control" id="tipo_cuenta" name="tipo_cuenta" required>
                    <option value="ahorro">Ahorro</option>
                    <option value="corriente">Corriente</option>
                    <option value="inversion">Inversión</option>
                </select>
            </div>
            <div class="form-group">
                <label for="saldo">Saldo Inicial:</label>
                <input type="text" class="form-control" id="saldo" name="saldo" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Cuenta</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
