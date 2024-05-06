<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banco INF-324</title>
  <!-- Enlace al archivo CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" >
      <img src="./imagenes/dinero.png" alt="Logo Banco INF-324">
      Banco INF-324
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
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
      <div class="col-md-6">
        <h2>Cuenta de Ahorro</h2>
        <p><b>Interés:</b> Ganas dinero con el saldo que mantienes.<br>
        <b> Acceso:</b> Puedes depositar y retirar dinero fácilmente.<br>
        <b>  Seguridad:</b> Tus fondos suelen estar asegurados.<br>
        <b> Mínimos de saldo:</b> Algunas requieren un saldo mínimo.<br>
        <b> Tarifas y cargos:</b> Revisa cargos adicionales.<br>
        <b> Facilidad de acceso: </b>Accede en línea o por app móvil.<br>
        <b> Objetivos de ahorro:</b> Algunas cuentan con herramientas para establecer metas.</p>
        <a href="cahorro.php" class="btn btn-primary">Ver</a>
        <br>
      </div>
      <div class="col-md-6">
        <img src="./imagenes/descarga.jpg" alt="Imagen Banco" class="img-fluid w-100">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h2>Cuenta Corriente</h2>
        <p><b>Transacciones:</b> Diseñada para realizar transacciones frecuentes, como pagos y transferencias.<br>
        <b> Acceso:</b> Permite depósitos y retiros ilimitados.<br>
        <b> Chequera:</b> Puede venir con una chequera para escribir cheques.<br>
        <b> Tarjetas:</b> A menudo incluye una tarjeta de débito para compras y retiros en cajeros automáticos.<br>
           <b> Sin interés:</b> Por lo general, no generan intereses sobre el saldo.<br>
           <b> Mínimo de saldo:</b> Algunas pueden requerir un saldo mínimo para evitar cargos.<br>
           <b> Tarifas y cargos:</b> Revisa los cargos por servicios adicionales y sobregiros.<br>
           <b> Facilidad de acceso:</b> Acceso en línea y móvil para administrar tu cuenta.</p>
        <a href="ccorriente.php" class="btn btn-primary">Ver</a>
        <br>
      </div>
      <div class="col-md-6">
        <img src="./imagenes/des.jpg" alt="Imagen Banco" class="img-fluid w-100">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h2>Cuenta de Inversión</h2>
        <p><b>Oportunidad de crecimiento:</b> Diseñada para invertir dinero con el objetivo de obtener rendimientos.<br>
        <b> Variedad de inversiones:</b> Puedes invertir en acciones, bonos, fondos mutuos, ETFs y más.<br>
        <b> Riesgo y retorno: </b>El nivel de riesgo y potencial de retorno varía según las inversiones elegidas.<br>
        <b> Diversificación:</b> Puedes diversificar tu cartera invirtiendo en diferentes activos para reducir riesgos.<br>
        <b> Plazo:</b> Puedes elegir entre inversiones a corto, mediano o largo plazo según tus objetivos.<br>
        <b> Costos y comisiones:</b> Debes considerar los costos de transacción, comisiones de gestión y otros cargos asociados.<br>
        <b> Asesoramiento financiero:</b> Algunas cuentas de inversión ofrecen asesoramiento profesional para ayudarte a tomar decisiones.<br>
        <b> Acceso a mercados financieros:</b> Te brinda acceso a mercados financieros para comprar y vender inversiones.</p>
        <a href="cinversion.php" class="btn btn-primary">Ver</a>
        <br>
      </div>
      <div class="col-md-6">
        <img src="./imagenes/descar.jpg" alt="Imagen Banco" class="img-fluid w-100">
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
