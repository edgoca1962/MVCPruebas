$(document).ready(function () {
  $("#img_contenedor").on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#img_contenedor").css({ background: "#cccccc" });
  });
  $("#img_contenedor").on("dragleave", function () {
    $("#img_contenedor").css({ background: "white" });
  });
  $("#img_contenedor").on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#img_contenedor").css({ background: "white" });
    let archivo = e.originalEvent.dataTransfer.files;
    //validar archivos.lenght para determinar la cantidad de archivos.
    let datos = new FormData();
    datos.append("archivo", archivo[0]);
    $.ajax({
      type: "POST",
      url: "./Librerias/Ajax.php",
      data: datos,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (respuesta) {
        if (respuesta.flag == 1) {
          $("#img_final").before(
            `<div class="card col-lg-3 col-md-4 col-xs-6 text-right m-1"><button type="button" class="close col-sm-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="card-body"><img class="img-fluid card-img" src="${respuesta.respuesta}" alt=""></div></div>`
          );
        } else {
          $("#img_final").html(
            "<script>Swal.fire('Error!','Solo se pudo agregar la imagen.','error')</script>"
          );
        }
      },
    });
  });
  $("#editar").click(function () {
    $("#ordenar").removeAttr("disabled");
    $("#eliminar").removeAttr("disabled");
  });
  $("#ordenar").click(function () {
    $("#guardar").removeAttr("disabled");
    $("#img_galeria").css({ cursor: "move" });
    $("#img_galeria").sortable({
      revert: true,
      connectWith: ".mover-item",
      handle: ".mover-imagen",
    });
  });
  $("#eliminar").click(function () {
    $(".close").removeAttr("style");
  });
  $("#guardar").click(function () {
    $(".close").css({ visibility: "hidden" });
    $("#ordenar").attr("disabled", "disabled");
    $("#eliminar").attr("disabled", "disabled");
    $(this).attr("disabled", "disabled");
  });
});
