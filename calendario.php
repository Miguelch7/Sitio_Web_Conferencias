<!-- Header -->
<?php include_once 'includes/templates/header.php'; ?>


<section class="seccion contenedor">
  <h2>Calendario de Eventos</h2>

  <?php
  try { // Intentamos el siguiente bloque:
    require_once('includes/funciones/db_conexion.php'); // Abrimos la conexion con la db
    $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado "; // Escribimos la consulta sql
    $sql .= " FROM eventos ";
    $sql .= " INNER JOIN categoria_evento ";
    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
    $sql .= " INNER JOIN invitados ";
    $sql .= " ON eventos.id_invitado = invitados.id_invitado ";
    $sql .= " ORDER BY id_evento ";

    $resultado = $db->query($sql);  // Ejecutamos la consulta
  } catch (\Exception $e) { // En caso de fallos pasamos el error y ejecutamos lo siguiente:
    echo $e->getMessage();  //Imprimimos el error
  }
  ?>



  <!-- Para obtener los datos se utiliza fetch_assoc(), fetch_array() o fetch_all() -->
  <!-- fetch_assoc() nos regresa un registro, nos permite acceder a los valores con los mismos nombres de los campos -->
  <!-- fetch_array() nos regresa un registro, nos permite acceder a los valores con numeros que corresponden a la posicion del campo -->
  <!-- fetch_all() nos regresa todos los registros, pero nos permite accedera  los valores con numeros que corresponden a la posicion del campo -->

  <div class="calendario">
    <?php
      $calendario = array();
      while ($eventos = $resultado->fetch_assoc()) { 

        // Obtiene la fecha del evento
        $fecha = $eventos['fecha_evento'];

        // Obtiene la categoria del evento
        $categoria = $eventos['cat_evento'];

        $evento = array(
          'titulo' => $eventos['nombre_evento'],
          'fecha' => $eventos['fecha_evento'],
          'hora' => $eventos['hora_evento'],
          'categoria' => $eventos['cat_evento'],
          'icono' => 'fa' . " " . $eventos['icono'],
          'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'],
          
        );
        
        // Agrupamos por fecha
        $calendario[$fecha][] = $evento;
        
        // Agrupamos por categoria
        // $calendario[$categoria][] = $evento;

    ?> 
    <?php } // while de fetch_assoc() ?>

    <?php 
      // Imprime todos los eventos
      foreach($calendario as $dia => $lista_eventos) { ?>
        <h3>
          <i class="fa fa-calendar"></i>
          <?php
            setlocale(LC_TIME, 'spanish');

            echo strftime( "%A, %d de %B del %Y", strtotime($dia) ); 
          ?>
        </h3>

        <?php foreach($lista_eventos as $evento) { ?>
          <div class="dia">
            <p class="titulo"> <?php echo $evento['titulo']; ?></p>
            <p class="hora">
              <i class="fa fa-clock-o" aria-hidden="true"></i>
              <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
            </p>
            <p>
              <i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i>
              <?php echo $evento['categoria']; ?>
            </p>
            <p>
              <i class="fa fa-user" aria-hidden="true"></i>
              <?php echo $evento['invitado']; ?>
            </p>

          </div>       

        <?php } // Fin foreach de dias ?>
      <?php } // Fin foreach de dias ?>
        
  </div>




  <?php
    $db->close(); // Cerramos la conexion
  ?>


</section>


<!-- Footer -->
<?php include_once 'includes/templates/footer.php'; ?>