$(document).ready(function () {
  /*««««««««««««««««««««««««*»»»»»»»»»»»»»»»»»»»»»»»»
    Arrastrar imagen
   ««««««««««««««««««««««««*»»»»»»»»»»»»»»»»»»»»»»»»*/
  if ($("#imagenes").html() == 0) {
    $("#imagenes").css({ height: "100px" });
  } else {
    $("#imagenes").css({ height: "auto" });
  }
  $("#img_banner").on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#imagenes").css({ background: "#cccccc" });
  });
  $("#imagenes").on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#imagenes").css({ background: "white" });
    const archivo = e.originalEvent.dataTransfer.files;
    const datos_archivo = archivo[0];
    const datos = new FormData();
    datos.append("archivo", datos_archivo);

    $.ajax({
      type: "post",
      url: "./Librerias/Ajax.php",
      data: datos,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        $("#imagenes_fila_1").append(
          '<div class="card"><div class="card-body"><img class="card-img-top" src="' +
            respuesta +
            '" alt="primera"></div></div>'
        );
        num_imagenes = num_imagenes + 1;
        console.log(num_imagenes);
        // console.log(respuesta);
        /* 
      if (respuesta >= 1) {
        $("#imagenes").append(
          '<li class="bloqueSlide"><span class="fa fa-times"></span><img src="' +
            respuesta +
            '" alt="" class="handleImg"></li>'
        );
      } else {
        $("span").html(respuesta);
      }
     */
      },
      error: function () {
        $("span").html(
          "<script>Swal.fire('¡Error!','Ha habido un error en el procesamiento del archivo.','error')</script>"
        );
      },
      compconste: function () {},
    }); //*/
  });
});
