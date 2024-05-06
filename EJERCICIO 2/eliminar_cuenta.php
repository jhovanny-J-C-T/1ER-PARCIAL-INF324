<?php
session_start();
error_reporting(0);

$conexion = mysqli_connect("localhost", "root", "", "bdjhovany");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_cuenta = $_GET['id'];

    // Obtener los datos de la cuenta bancaria para mostrar en el mensaje de confirmación
    $sql_cuenta = "SELECT * FROM cuentabancaria WHERE idcuenta = '$id_cuenta'";
    $result_cuenta = mysqli_query($conexion, $sql_cuenta);
    $row_cuenta = mysqli_fetch_assoc($result_cuenta);

    if ($row_cuenta) {
        if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'si') {
            // Eliminar la cuenta bancaria
            $sql_eliminar = "DELETE FROM cuentabancaria WHERE idcuenta = '$id_cuenta'";
            if (mysqli_query($conexion, $sql_eliminar)) {
                header('Location: cliente.php');
            } else {
                echo "Error al eliminar la cuenta: " . mysqli_error($conexion);
            }
        } else {
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Eliminar Cuenta</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            <div class="alert alert-danger text-center">
                                <p>¿Desea confirmar la eliminación de la cuenta con número <?php echo $row_cuenta['idcuenta']; ?>?</p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <form action="eliminar_cuenta.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $id_cuenta; ?>">
                                        <center><input type="hidden" name="confirmar" value="si">
                                        <input type="submit" value="Eliminar" class="btn btn-danger">
                                        <a href="cliente.php" class="btn btn-success">Cancelar</a></center>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            </html>
            <?php
        }
    } else {
        echo "Cuenta no encontrada.";
    }
}

mysqli_close($conexion);
?>
