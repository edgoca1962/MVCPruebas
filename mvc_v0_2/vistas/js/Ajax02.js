$(document).ready(function () {
  /*««««««««««««««««««««««««*»»»»»»»»»»»»»»»»»»»»»»»»
    Arrastrar imagen
   ««««««««««««««««««««««««*»»»»»»»»»»»»»»»»»»»»»»»»*/
  $("#img_galeria").on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#img_galeria").css({ background: "#cccccc" });
  });
  $("#img_galeria").on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#img_galeria").css({ background: "white" });
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
        console.log(datos);
        if (respuesta.flag == 1) {
          var contador = Math.floor(Math.random() * 100 + 1);
          $("#img_final").before(
            `
            <div class="col-lg-3 col-md-4 col-xs-6"><a href="#" class="d-block mb-4 h-100" data-toggle="modal" data-target="#img_${contador}"><img class="img-fluid img-thumbnail" src="{respuesta.respuesta}" alt=""></a></div><div class="modal fade" id="img_${contador}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><button type="button" class="close m-2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="modal-dialog modal-dialog-centered" role="document"><img class="img-fluid" src="{respuesta.respuesta}" alt=""></div></div>
            `
          );
        } else {
          $("span").html(respuesta.respuesta);
        }
      },
      error: function () {
        $("span").html(
          "<script>Swal.fire('¡Error!','Ha habido un error en el procesamiento del archivo.','error')</script>"
        );
      },
    });
  });
  $("#img_input").on("click", function () {
    const datos = new FormData();

    $.ajax({
      type: "post",
      url: "./Librerias/Ajax.php",
      data: datos,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function () {
        console.log(datos);
        /*
        if (respuesta.flag == 1) {
          var contador = Math.floor(Math.random() * 100 + 1);
          $("#img_blanco").before(
            `
            <div class="card" id="img_${contador}"><a href="#" data-toggle="modal" data-target="#img${contador}"><img class="card-img-top" src="${respuesta.respuesta}" alt="Arrastrar imagen en este espacio"></a></div><div class="modal fade" id="img${contador}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><button type="button" class="close m-2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="modal-dialog modal-lg modal-dialog-centered" role="document"><img src="${respuesta.respuesta}" alt="" class="img-fluid rounded"></div></div>
            `
          );
        } else {
          $("span").html(respuesta.respuesta);
        }*/
      },
      error: function () {
        $("span").html(
          "<script>Swal.fire('¡Error!','Ha habido un error en el procesamiento del archivo.','error')</script>"
        );
      },
    });
  });
});
