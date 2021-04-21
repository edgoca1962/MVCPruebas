  <!-- Essential javascripts for application to work-->
  <?php echo $parametros['alerta']; ?>
  <!-- <script>swal.fire('Página cargada', 'Se ha cargado con éxito la página', 'success');</script> -->
  <script src="<?php echo SERVERURL; ?>recursos/js/sweetalert2.min.js"></script>
  <script src="<?php echo SERVERURL; ?>recursos/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo SERVERURL; ?>recursos/js/popper.min.js"></script>
  <script src="<?php echo SERVERURL; ?>recursos/js/bootstrap.min.js"></script>
  <script src="<?php echo SERVERURL; ?>recursos/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?php echo SERVERURL; ?>recursos/js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <!-- Google analytics script-->
  <script type="text/javascript">
      if (document.location.hostname == 'pratikborsadiya.in') {
          (function(i, s, o, g, r, a, m) {
              i['GoogleAnalyticsObject'] = r;
              i[r] = i[r] || function() {
                  (i[r].q = i[r].q || []).push(arguments)
              }, i[r].l = 1 * new Date();
              a = s.createElement(o),
                  m = s.getElementsByTagName(o)[0];
              a.async = 1;
              a.src = g;
              m.parentNode.insertBefore(a, m)
          })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
          ga('create', 'UA-72504830-1', 'auto');
          ga('send', 'pageview');
      }
  </script>
  </body>

  </html>