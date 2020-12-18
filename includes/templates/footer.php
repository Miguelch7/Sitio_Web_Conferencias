<!-- Footer -->
<footer class="site-footer">
    <div class="contenedor clearfix">

        <div class="footer-informacion">
            <h3>Sobre <span>gqlwebcamps</span></h3>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi a, vitae quos laborum, nulla unde fuga
                similique eaque hic quis dolor! Cumque rem laudantium nemo quisquam, non temporibus a mollitia?</p>
        </div>

        <div class="ultimos-tweets">
            <h3>Últimos <span>tweets</span></h3>

            <ul>
                <li>Quasi a, vitae quos laborum, nulla unde fuga similique eaque hic quis dolor!</li>
                <li>Quasi a, vitae quos laborum, nulla unde fuga similique eaque hic quis dolor!</li>
                <li>Quasi a, vitae quos laborum, nulla unde fuga similique eaque hic quis dolor!</li>
            </ul>
        </div>

        <div class="menu">
            <h3>Redes <span>sociales</span></h3>

            <nav class="redes-sociales">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </nav>
        </div>

    </div>

    <p class="copyright">Todos los derechos Reservados GDLWEBCAMP &copy; 2020</p>

</footer>



<!-- Add your site or application content here -->
<script src="js/vendor/modernizr-3.11.2.min.js"></script>
<script src="js/plugins.js"></script>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- Plugin Animate Number -->
<script src="js/jquery.animateNumber.min.js"></script>

<!-- Plugin Contador Numero -->
<script src="js/jquery.countdown.min.js"></script>

<!-- Plugin Lettering JS -->
<script src="js/jquery.lettering.js"></script>

<?php
  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace('.php', '', $archivo);
  if($pagina == 'invitados' || $pagina == 'index') {
    // Colorbox
    echo '<script src="js/jquery.colorbox-min.js"></script>';
  } else if($pagina == 'conferencia') {
    // Lightbox
    echo '<script src="js/lightbox.js"></script>';
  }
?>

<!-- Leaflet Map -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a341d2daa5.js" crossorigin="anonymous"></script>
</body>

</html>
