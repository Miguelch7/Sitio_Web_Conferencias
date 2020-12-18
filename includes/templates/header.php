<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald:wght@300;400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

  <!-- Leaflet Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace('.php', '', $archivo);
    if($pagina == 'invitados' || $pagina == 'index') {
      // Colorbox
      echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if($pagina == 'conferencia') {
      // Lightbox
      echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
  ?>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">

  <!-- Header -->
  <header class="site-header">

    <!-- Hero -->
    <div class="hero">
      <div class="contenido-header">

        <!-- Redes Sociales-->
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>

        <!-- Información del evento -->
        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-12 Dic</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Guadalajara, MX</p>
          </div>

          <h1 class="nombre-sitio">GdlWebCamp</h1>
          <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
        </div>

      </div>

    </div>
  </header>

  <!-- Barra Menú -->
  <div class="barra">
    <div class="contenedor clearfix">

      <!-- Logo -->
      <div class="logo">
        <a href="index.php">
          <img src="img/logo.svg" alt="Logotipo GDLWEBCAMP">
        </a>
      </div>

      <!-- Boton Menú Móvil -->
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <!-- Navegación -->
      <nav class="navegacion-principal">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div> <!-- .contenedor -->
  </div> <!-- .barra -->
