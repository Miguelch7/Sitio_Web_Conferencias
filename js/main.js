(function() {
  'use strict';

  var regalo = document.getElementById('regalo');

  document.addEventListener('DOMContentLoaded', function() {

    // LEAFLET MAP
    var map = L.map('mapa').setView([-27.418919, -65.6885], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-27.418919, -65.6885]).addTo(map)
        .bindPopup('GDLWEBCAMP 2020.<br> Boletos ya disponibles.')
        .openPopup()
        .bindTooltip('Estamos Aquí!!')
        .openTooltip();

    // CAMPOS DATOS USUARIOS
    var nombre = document.getElementById('nombre');
    var apellido = document.getElementById('apellido');
    var email = document.getElementById('email');

    // CAMPOS PASES
    var pase_dia = document.getElementById('pase_dia');
    var pase_completo = document.getElementById('pase_completo');
    var pase_dos_dias = document.getElementById('pase_dos_dias');

    // BOTONES Y DIVS
    var calcular = document.getElementById('calcular');
    var errorDiv = document.getElementById('error');
    var botonRegistro = document.getElementById('btnRegistro');
    var lista_productos = document.getElementById('lista-productos');
    var suma = document.getElementById('suma-total');

    // EXTRAS
    var camisas = document.getElementById('camisa_evento');
    var etiquetas = document.getElementById('etiquetas');

    if(document.getElementById('calcular')) {
      calcular.addEventListener('click', calcularMontos);

      // El evento 'blur' actua cuando alguien sale de un input
      pase_dia.addEventListener('blur', mostrarDias);
      pase_completo.addEventListener('blur', mostrarDias);
      pase_dos_dias.addEventListener('blur', mostrarDias);

      nombre.addEventListener('blur', validarCampos);
      apellido.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarEmail);


      function validarCampos() {
        if(this.value === '') {
          errorDiv.style.display = 'block';
          errorDiv.innerHTML = 'Este campo es obligatorio'
          this.style.border = '2px solid red'
        } else {
          errorDiv.style.display = 'none';
          this.style.border = '1px solid #cccccc';
        }
      }


      function validarEmail() {
        if(this.value.indexOf('@') > -1) {
          errorDiv.style.display = 'none';
          this.style.border = '1px solid #cccccc';
        } else {
          errorDiv.style.display = 'block';
          errorDiv.innerHTML = 'El campo email debe tener al menos una @'
          this.style.border = '2px solid red'
        }
      }


      function calcularMontos(e) {
        e.preventDefault();
        if (regalo.value === '') {
          alert('Debes elegir regalo');
          regalo.focus();
        } else {
          var boletosDia = parseInt(pase_dia.value, 10)|| 0,
              boletos2Dias = parseInt(pase_dos_dias.value, 10)|| 0,
              boletosCompleto = parseInt(pase_completo.value, 10)|| 0,
              cantCamisas = parseInt(camisas.value, 10)|| 0,
              cantEtiquetas = parseInt(etiquetas.value, 10)|| 0;

          var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletosCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

          var listadoProductos = [];

          if(boletosDia >= 1) {
            listadoProductos.push(boletosDia + ' Pases por día');
          }
          if(boletos2Dias >= 1) {
            listadoProductos.push(boletos2Dias + ' Pases por 2 días');
          }
          if (boletosCompleto >= 1) {
            listadoProductos.push(boletosCompleto + ' Pases Completos');
          }

          if (cantCamisas >= 1) {
            listadoProductos.push(cantCamisas + ' Camisas');
          }

          if (cantEtiquetas >= 1) {
            listadoProductos.push(cantEtiquetas + ' Etiquetas');
          }

          lista_productos.style.display = 'block';
          lista_productos.innerHTML = '';
          for (var i = 0; i < listadoProductos.length; i++) {
            lista_productos.innerHTML += listadoProductos[i] + '<br>'
          }

          suma.innerHTML = '$ ' + totalPagar.toFixed(2);
      }
      };


      function mostrarDias() {
        var boletosDia = parseInt(pase_dia.value, 10)|| 0,
            boletos2Dias = parseInt(pase_dos_dias.value, 10)|| 0,
            boletosCompleto = parseInt(pase_completo.value, 10)|| 0;

        var diasElegidos = [];
        if(boletosDia >= 1) {
          diasElegidos.push('viernes');
        }
        if(boletos2Dias >= 1) {
          diasElegidos.push('viernes', 'sabado');
        }
        if(boletosCompleto >= 1) {
          diasElegidos.push('viernes', 'sabado', 'domingo');
        }

        for (var i = 0; i < diasElegidos.length; i++) {
          document.getElementById(diasElegidos[i]).style.display = 'block';
        }
      }
    }


  }); // DOM CONTENT LOADED
})();

$(function() {

  // Lettering
  $('.nombre-sitio').lettering();


  // Menú fijo
  var windowHeight = $(window).height();
  var barraHeight = $('.barra').innerHeight();

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if(scroll > windowHeight) {
      $('.barra').addClass('fixed');
      $('body').css({'margin-top': barraHeight+'px'});
    } else {
      $('.barra').removeClass('fixed');
      $('body').css({'margin-top': '0px'});
    }
  });


  // Menú Responsive
  $('.menu-movil').on('click', function() {
    $('.navegacion-principal').slideToggle();
  });


  // Programa de Conferencias
  $('.programa-evento .info-curso:first').show(); // Mostramos solo el primer enlace ('Talleres')
  $('.menu-programa a:first').addClass('activo'); // Añadimos la clase activo al primer enlace ('Talleres')
  $('.menu-programa a').on('click', function() {

    $('.menu-programa a').removeClass('activo'); // Removemos la clase activo de todos los enlaces
    $('.ocultar').hide(); // Ocultamos todos los enlaces
    
    $(this).addClass('activo'); // Añadimos la clase activo al enlace presionado
    var enlace = $(this).attr('href');
    $(enlace).fadeIn(700); // Mostramos enlace presionado

    return false;
  });


  // Animaciones para los Numeros
  $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}), 1200;
  $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}), 1200;
  $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}), 1500;
  $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}), 1000;


  // Cuenta Regresiva
  $('.cuenta-regresiva').countdown('2021/01/01 00:00:00', function(e) {
    $('#dias').html(e.strftime('%D'));
    $('#horas').html(e.strftime('%H'));
    $('#minutos').html(e.strftime('%M'));
    $('#segundos').html(e.strftime('%S'));
  });




   
});
