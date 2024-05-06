<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
    header("Location:login.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/es.css">
    <title>Usuarios</title>
</head>

<body>
    <div class="container">

        <div class="col-xs-12">
            <br>
            <h1 class="text-center">BIENVENIDO ADMINISTRADOR <?php echo $_SESSION['nombre']; ?></h1>
            <br>
            <div class="d-flex justify-content-between align-items-center">
                <a class="btn btn-success" href="registrarse.php">Nuevo usuario <i class="fa fa-plus"></i></a>
                <a class="btn btn-warning" href="cerrarSesion.php">Salir <i class="fa fa-power-off"></i></a>
            </div>
            <br>
            <br>
            <h2 class="text-center">Lista de usuarios</h2>
            <br>
            <br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>CI</th>
                        <th>Teléfono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Dirección</th>
                        <th>Departamento</th>
                        <th>Contraseña</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "bdjhovany");
                    $SQL = "SELECT * FROM Persona LEFT JOIN permisos ON persona.rol=permisos.id";
                    $dato = mysqli_query($conexion, $SQL);
                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            ?>
                            <tr>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['apellido_paterno']; ?></td>
                                <td><?php echo $fila['apellido_materno']; ?></td>
                                <td><?php echo $fila['ci']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['fecha_nacimiento']; ?></td>
                                <td><?php echo $fila['direccion']; ?></td>
                                <td><?php echo $fila['departamento']; ?></td>
                                <td><?php echo $fila['contraseña']; ?></td>
                                <td><?php echo $fila['rol']; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="10">No existen registros</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <br>
            <br>
            <h2 class="text-center">Montos existentes por departamento</h2>
            <br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Código de Departamento</th>
                        <th>Departamento</th>
                        <th>Saldo Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $codigos_departamentos = array(
                        'Chuquisaca' => '01',
                        'La Paz' => '02',
                        'Cochabamba' => '03',
                        'Oruro' => '04',
                        'Potosí' => '05',
                        'Tarija' => '06',
                        'Santa Cruz' => '07',
                        'Beni' => '08',
                        'Pando' => '09'
                    );

                    $SQL = "SELECT p.departamento, SUM(c.saldo) AS saldo_total
                            FROM persona p
                            JOIN cuentabancaria c ON p.idpersona = c.persona_id
                            GROUP BY p.departamento";
                    $resultado = mysqli_query($conexion, $SQL);

                    if ($resultado->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                            ?>
                            <tr>
                                <td><?php echo $codigos_departamentos[$fila['departamento']]; ?></td>
                                <td><?php echo $fila['departamento']; ?></td>
                                <td><?php echo $fila['saldo_total']; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="3">No hay registros</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <br>
            <h2 class="text-center">Montos existentes por departamento INVIRTIENDO</h2>
            <br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Chuquisaca</th>
                        <th>La Paz</th>
                        <th>Cochabamba</th>
                        <th>Oruro</th>
                        <th>Potosí</th>
                        <th>Tarija</th>
                        <th>Santa Cruz</th>
                        <th>Beni</th>
                        <th>Pando</th>
                    </tr>
                    <tr>
                        <th>01</th>
                        <th>02</th>
                        <th>03</th>
                        <th>04</th>
                        <th>05</th>
                        <th>06</th>
                        <th>07</th>
                        <th>08</th>
                        <th>09</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SQL = "SELECT
                        sum(CASE WHEN departamento = 'Chuquisaca' THEN saldo_total END) AS Chuquisaca,
                        sum(CASE WHEN departamento = 'La Paz' THEN saldo_total END) AS LaPaz,
                        sum(CASE WHEN departamento = 'Cochabamba' THEN saldo_total END) AS Cochabamba,
                        sum(CASE WHEN departamento = 'Oruro' THEN saldo_total END) AS Oruro,
                        sum(CASE WHEN departamento = 'Potosí' THEN saldo_total END) AS Potosi,
                        sum(CASE WHEN departamento = 'Tarija' THEN saldo_total END) AS Tarija,
                        sum(CASE WHEN departamento = 'Santa Cruz' THEN saldo_total END) AS SantaCruz,
                        sum(CASE WHEN departamento = 'Beni' THEN saldo_total END) AS Beni,
                        sum(CASE WHEN departamento = 'Pando' THEN saldo_total END) AS Pando
                    FROM (
                        SELECT departamento, sum(c.saldo) AS saldo_total
                        FROM persona 
                        JOIN cuentabancaria c ON idpersona = c.persona_id
                        GROUP BY departamento
                    ) AS xx";
                    $resultado = mysqli_query($conexion, $SQL);

                    if ($resultado->num_rows > 0) {
                        $fila = mysqli_fetch_array($resultado);
                        ?>
                        <tr>
                            <td><?php echo $fila['Chuquisaca']; ?></td>
                            <td><?php echo $fila['LaPaz']; ?></td>
                            <td><?php echo $fila['Cochabamba']; ?></td>
                            <td><?php echo $fila['Oruro']; ?></td>
                            <td><?php echo $fila['Potosi']; ?></td>
                            <td><?php echo $fila['Tarija']; ?></td>
                            <td><?php echo $fila['SantaCruz']; ?></td>
                            <td><?php echo $fila['Beni']; ?></td>
                            <td><?php echo $fila['Pando']; ?></td>
                        </tr>
        
                    <?php
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="9">No hay registros</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/user.js"></script>
</body>

</html>
