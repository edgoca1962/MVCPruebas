$(document).ready(function () {
  /*==================================================
  Envío de datos para el formulario de Ingreso
  ==================================================*/
  $("#form_ingreso").submit(function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();
    datos.push({ name: "formulario", value: "ingreso" });
    var url = "http://localhost/pruebas/controladores/Ajax.php";
    $.ajax({
      url: url,
      type: "post",
      dataType: "json",
      data: datos,
    })
      .done(function () {
        $("span").html(
          "<script>Swal.fire('¡Excelente!','El usuario y la contraseña ingresados son correctos.','success')</script>"
        );
      })
      .fail(function () {
        $("span").html(
          "<script>Swal.fire('¡Error!','El dato del usuario o la contraseña es incorrecto.','error')</script>"
        );
      })
      .always(function () {});
  });
});
