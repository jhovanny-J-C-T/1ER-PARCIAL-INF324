<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión / Crear Nuevo Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 24px; /* Tamaño de fuente aumentado */
        }
        .btn-primary {
            background-color: #28a745; /* Cambio de color a verde */
            border-color: #28a745;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #218838; /* Cambio de color en hover */
            border-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4" style="font-size: 32px;">Iniciar Sesión</h5> <!-- Tamaño de fuente aumentado -->
                <form action="_functions.php" method="POST">
                    <div class="form-group">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu nombre de usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña">
                        <input type="hidden" name="accion" value="acceso_user">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Iniciar Sesión</button>
                </form>
                <hr>
                <p class="text-center mb-0">¿Nuevo aquí? <a href="registrarse.php" class="btn btn-link">Crear Nuevo Usuario</a></p>
                <br>
                <p class="text-center mb-0"><a href="index.php" class="btn btn-link">Volver al Inicio</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
