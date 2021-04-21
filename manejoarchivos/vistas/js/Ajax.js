$(document).ready(function () {
  $("#galeria").sortable({
    update: function (event, ui) {
      $(this)
        .children()
        .each(function (index) {
          if ($(this).attr("orden") != index) {
            $(this).attr("orden", index).addClass("actualizada");
          }
        });
      modificar_posicion();
    },
  });
  function modificar_posicion() {
    var posiciones = [];
    $(".actualizada").each(function () {
      posiciones.push(["orden"]);
      $(this).removeClass("actualizada");
    });
    console.log(posiciones);
    $.ajax({
      type: "POST",
      url: "./Librerias/Ajax.php",
      dataType: "json",
      data: {
        actulizada: 1,
        posiciones: posiciones,
      },
      success: function (response) {},
    });
  }
});
