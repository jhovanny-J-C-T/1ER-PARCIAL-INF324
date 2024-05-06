

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Banco INF-324</title>
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
                <span style="color: #28a745;">Registro</span>
            </div>
            <div class="card-body">
                <form action="validar.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
            </div>
            <div class="form-group col-md-6">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Ingresa tu apellido paterno">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Ingresa tu apellido materno">
            </div>
            <div class="form-group col-md-6">
                <label for="ci">Carnet de Identidad</label>
                <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingresa tu carnet de identidad">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono">
            </div>
            <div class="form-group col-md-6">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa tu dirección">
            </div>
            <div class="form-group col-md-6">
                <label for="departamento">Departamento</label>
                <select id="departamento" class="form-control" name="departamento">
                    <option selected>Selecciona...</option>
                    <option>Beni</option>
                    <option>Chuquisaca</option>
                    <option>Cochabamba</option>
                    <option>La Paz</option>
                    <option>Oruro</option>
                    <option>Pando</option>
                    <option>Potosí</option>
                    <option>Santa Cruz</option>
                    <option>Tarija</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
        </div>
        <button type="submit" class="btn btn-primary" name="registrar">Registrarse</button>
    </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
