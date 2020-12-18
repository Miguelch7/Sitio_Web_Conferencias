<!-- Header -->
<?php include_once 'includes/templates/header.php'; ?>

<!-- Descripción del evento -->
<section class="seccion contenedor">
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
    enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
    ratione voluptatem sequi nesciunt.</p>
</section>

<!-- Programa del Evento -->
<section class="programa">
  <div class="contenedor-video">
    <video autoplay loop poster="img/bg-talleres.jpg">
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ovg">
    </video>
  </div>

  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">

        <h2>Programa del Evento</h2>

        <?php
        try {
          require_once('includes/funciones/db_conexion.php');
          $sql = "SELECT * FROM `categoria_evento` ";
          $resultado = $db->query($sql);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>

        <nav class="menu-programa">
          <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <?php $categoria = $cat['cat_evento']; ?>
            <a href="#<?php echo strtolower($categoria); ?>">
              <i class="fa <?php echo $cat['icono']; ?>"></i> <?php echo $categoria; ?>
            </a>
          <?php } ?>
        </nav>


        <?php
        try { // HACER VARIAS CONSULTAS
          require_once('includes/funciones/db_conexion.php');
          $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN `categoria_evento` ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN `invitados` ";
          $sql .= " ON eventos.id_invitado = invitados.id_invitado ";
          $sql .= " AND eventos.id_cat_evento = 1 ";
          $sql .= " ORDER BY `id_evento` LIMIT 2; ";
          $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN `categoria_evento` ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN `invitados` ";
          $sql .= " ON eventos.id_invitado = invitados.id_invitado ";
          $sql .= " AND eventos.id_cat_evento = 2 ";
          $sql .= " ORDER BY `id_evento` LIMIT 2; ";
          $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN `categoria_evento` ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN `invitados` ";
          $sql .= " ON eventos.id_invitado = invitados.id_invitado ";
          $sql .= " AND eventos.id_cat_evento = 3 ";
          $sql .= " ORDER BY `id_evento` LIMIT 2; ";

        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>

        <?php $db->multi_query($sql); ?>

        <?php
          do {
            $resultado = $db->store_result();
            $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
            <?php $i = 0; ?>
            <?php foreach ($row as $evento): ?>
              <?php if($i % 2 == 0) { ?>
                <div id="<?php echo strtolower($evento['cat_evento']);?>" class="info-curso ocultar clearfix">
              <?php } ?>
                <div class="detalle-evento">
                  <h3><?php echo utf8_encode($evento['nombre_evento']); ?></h3>
                  <p><i class="fa fa-clock"></i> <?php echo $evento['hora_evento'];?></p>
                  <p><i class="fa fa-calendar"></i><?php echo $evento['fecha_evento'];?></p>
                  <p><i class="fa fa-user"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado'];?></p>
                </div>

              <?php if($i % 2 == 1): ?>
                <a href="calendario.php" class="button float-right">Ver Todos</a>
                </div> <!-- .talleres -->
              <?php endif; ?>

              <?php $i++; ?>
            <?php endforeach; ?>
            <?php $resultado->free(); ?>

          <?php } while ($db->more_results() && $db->next_result());
        ?>








      </div> <!-- .programa-evento -->
    </div> <!-- .contenedor -->
  </div> <!-- .cotenido-programa -->
</section> <!-- .programa -->


<!-- Seccion Invitados -->
<?php include_once 'includes/templates/invitados.php'; ?>

<!-- Contador -->
<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento clearfix">
      <li>
        <p class="numero"></p> Invitados
      </li>
      <li>
        <p class="numero"></p> Talleres
      </li>
      <li>
        <p class="numero"></p> Días
      </li>
      <li>
        <p class="numero"></p> Conferencias
      </li>
    </ul>
  </div>
</div>


<!-- Precios -->
<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">

    <ul class="lista-precios clearfix">

      <li>
        <div class="tabla-precio">
          <h3>Pase por día</h3>
          <p class="numero">$30</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>

      <li>
        <div class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="button">Comprar</a>
        </div>
      </li>

      <li>
        <div class="tabla-precio">
          <h3>Pase por 2 días</h3>
          <p class="numero">$45</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>

    </ul>

  </div>
</section>


<!-- Mapa -->
<div id="mapa" class="mapa"></div>


<!-- Testimoniales -->
<section class="seccion">
  <h2>Testimoniales</h2>

  <div class="contenedor-testimoniales clearfix">

    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime esse tenetur, vitae asperiores quaerat
          provident adipisci fuga?</p>

        <footer class="footer-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="Imagen testimonial">
          <cite>Osvaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
        </footer>
      </blockquote>
    </div>

    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime esse tenetur, vitae asperiores quaerat
          provident adipisci fuga?</p>

        <footer class="footer-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="Imagen testimonial">
          <cite>Osvaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
        </footer>
      </blockquote>
    </div>

    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime esse tenetur, vitae asperiores quaerat
          provident adipisci fuga?</p>

        <footer class="footer-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="Imagen testimonial">
          <cite>Osvaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
        </footer>
      </blockquote>
    </div>

  </div>

</section>


<!-- Newsletter -->
<div class="newsletter parallax">
  <div class="contenido contenedor">
    <p>Registrate al newsletter</p>
    <h3>GdlWebCamp</h3>
    <a href="#" class="button transparente">Registro</a>
  </div>
</div>

<!-- Cuenta Regresiva -->
<section class="seccion">
  <h2>Faltan</h2>

  <div class="cuenta-regresiva contenedor">
    <ul class="clearfix">
      <li>
        <p id="dias" class="numero"></p> días
      </li>
      <li>
        <p id="horas" class="numero"></p> horas
      </li>
      <li>
        <p id="minutos" class="numero"></p> minutos
      </li>
      <li>
        <p id="segundos" class="numero"></p> segundos
      </li>
    </ul>
  </div>
</section>

<!-- Footer -->
<?php include_once 'includes/templates/footer.php'; ?>
