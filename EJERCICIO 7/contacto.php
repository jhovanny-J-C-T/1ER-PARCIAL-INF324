<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto - Banco INF-324</title>
  <!-- Enlace al archivo CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Estilos personalizados -->
  <style>
    /* Cambios de estilo personalizados */
    body {
      background-color: #f8f9fa !important;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    .navbar {
      background-color: #28a745 !important;
    }
    .navbar-brand {
      color: #ffffff !important;
    }
    .navbar-brand img {
      height: 30px;
      margin-right: 10px;
    }
    .navbar-nav .nav-link {
      color: #ffffff !important;
    }
    .navbar-nav .nav-link:hover {
      color: #ffffff !important;
    }
    .btn-primary {
      background-color: #28a745 !important;
      border-color: #28a745 !important;
    }
    .btn-primary:hover {
      background-color: #218838 !important;
      border-color: #218838 !important;
    }
    /* Estilos del footer */
    footer {
      background-color: #343a40;
      color: #ffffff;
      padding: 20px 0;
      text-align: center;
      margin-top: auto;
      width: 100%;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">
      <img src="./imagenes/dinero.png" alt="Logo Banco INF-324">
      Banco INF-324
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link" href="contacto.php">Contacto <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Iniciar sesión</a>
        </li>
      </ul>
    </div>
  </nav>
<br>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center mb-4">Contáctanos</h2>
      <form>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico">
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje</label>
          <textarea class="form-control" id="mensaje" rows="3" placeholder="Escribe tu mensaje"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Enviar mensaje</button>
      </form>
    </div>
  </div>
</div>
<br>
<footer>
  <div class="container">
    <p>© 2024 Banco INF-324. Todos los derechos reservados.</p>
  </div>
</footer>

<!-- Enlace al archivo JavaScript de Bootstrap (opcional, si usas componentes que requieren JS) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
