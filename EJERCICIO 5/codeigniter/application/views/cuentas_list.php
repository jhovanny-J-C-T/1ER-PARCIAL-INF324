<!DOCTYPE html>
<html>
<head>
    <title>Listado de Cuentas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo personalizado para centrar la tabla */
        .centrar {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa; /* Cambia el color de fondo del contenedor */
            padding: 20px; /* Añade un espacio interno para separar la tabla del borde */
        }

        /* Cambia el color de fondo de la tabla */
        table {
            background-color: #fff; /* Cambia el color de fondo de la tabla */
            border-radius: 5px; /* Añade bordes redondeados a la tabla */
            overflow: hidden; /* Evita que los bordes redondeados se recorten */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Añade una sombra suave */
        }
    </style>
</head>
<body>
    <center><h1>Listado de Cuentas</h1></center>

    <div class="centrar">
        <div>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Persona</th>
                        <th>Tipo de Cuenta</th>
                        <th>Saldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cuentas as $cuenta): ?>
                        <tr>
                            <td><?= $cuenta['idcuenta'] ?></td>
                            <td><?= $cuenta['nombre'] ?></td> <!-- Suponiendo que 'nombre_persona' es el campo que contiene el nombre de la persona -->
                            <td><?= $cuenta['tipo_cuenta'] ?></td>
                            <td><?= $cuenta['saldo'] ?></td>
                            <td><td><a href="<?= base_url('cuentas/borrar/' . $cuenta['idcuenta']) ?>" class="btn btn-danger">Borrar</a></td>
</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
