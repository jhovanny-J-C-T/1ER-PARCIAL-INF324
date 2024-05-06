<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo con Bootstrap</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<br>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="text-center mb-4">¡Potencia tus ahorros con nuestra cuenta de inversión!</h1>
        <p>¿Estás buscando maximizar tus ganancias y hacer crecer tu dinero? Entonces nuestra cuenta de inversión es perfecta para ti. Con un depósito inicial mínimo del 10%, puedes acceder a una variedad de opciones de inversión, como bonos, acciones y fondos mutuos.</p>
        <p class="text-center"><img src="./imagenes/ci.jpg" alt="Persona pensando" class="img-fluid rounded w-100"></p>
        <p class="text-center">¡Haz que tus sueños se hagan realidad con nuestra cuenta de inversión!</p>
        <hr>
        <h4 class="text-center">¿Cómo funcionan los intereses en una cuenta de inversión?</h4>
        <p>A diferencia de una cuenta de ahorro, donde se pagan intereses regularmente, en una cuenta de inversión, tus ganancias provienen de las inversiones que realices. Por ejemplo, si inviertes en acciones y el valor de esas acciones aumenta, tú ganas. Y si inviertes en bonos, recibirás pagos de intereses periódicos.</p>
        <h4 class="text-center">Asesoramiento financiero personalizado</h4>
        <p>En nuestro banco, te ofrecemos asesoramiento financiero personalizado y acceso a expertos en inversiones que te ayudarán a diseñar una estrategia de inversión que se adapte a tus objetivos financieros. Además, con nuestra cuenta de inversión, tienes la flexibilidad de agregar fondos adicionales en cualquier momento para aprovechar nuevas oportunidades de inversión.</p>
        <p class="text-center">¡Haz que tu dinero trabaje más duro para ti y alcanza tus objetivos financieros más rápido con nuestra cuenta de inversión!</p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <footer>
    <div class="container">
      <p>© 2024 Banco INF-324. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>
