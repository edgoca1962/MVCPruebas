$(document).ready(function () {
  /*»»»»»»»»»»»»»»»»»»»»»»»»««««««««««««««««««««««««
    Buscar coincidencia de texto
   »»»»»»»»»»»»»»»»»»»»»»»»««««««««««««««««««««««««*/
  $("#resultados").hide();
  $("#btn-buscar").keyup(function () {
    let datos = $(this).serializeArray();
    datos.push({ name: "elemento", value: "boton_buscar" });
    $.ajax({
      type: "post",
      url: "./controladores/Ajax.php",
      data: datos,
      dataType: "json",
      success: function (respuesta) {
        if (respuesta != null) {
          let plantilla = "";
          respuesta.forEach((articulo) => {
            plantilla += `<li>
              ${articulo.descripcion_articulo}
              </li>`;
          });
          $("#temporal").html(plantilla);
          $("#resultados").show();
        }
      },
      error: function () {},
      beforeSend: function () {},
      complete: function () {},
    });
  });
  /*»»»»»»»»»»»»»»»»»»»»»»»»««««««««««««««««««««««««
    Obtiene Artículos
   »»»»»»»»»»»»»»»»»»»»»»»»««««««««««««««««««««««««*/
  $(document).on("click", ".page-link", function () {
    let pagina = $(this)[0];
    console.log($(pagina).attr("pagina"));
    $.ajax({
      type: "post",
      url: "./controladores/Ajax.php",
      data: { elemento: "articulos" },
      dataType: "json",
      success: function (datos_articulos) {
        let dominio = "http://localhost/blog_travels/";
        let plantilla = "";
        datos_articulos.forEach((articulo) => {
          plantilla += `
            <div class="row" articulo_id="${articulo.id}">
               <div class="col-12 col-lg-5">
                  <a href="#" class="articulo_id">
                     <h5 class="d-block d-lg-none py-3">${articulo.id}</h5>
                  </a>
                  <a href="#" class="articulo_id"><img src="${articulo.portada_articulo}"> alt="Portada artículo" class="img-fluid" width="100%"></a>
               </div>
               <div class="col-12 col-lg-7 introArticulo">
                  <a href="#" class="articulo_id">
                     <h4 class="d-none d-lg-block">${articulo.titulo_articulo}</h4>
                  </a>
                  <p class="my-2 my-lg-5">${articulo.descripcion_articulo}</p>
                  <a href="#" class="float-right articulo_id">Leer Más</a>
                  <div class="fecha" style="background-image: url(<?= $plantilla->get_atributo('ruta_img_blog'); ?>globo.jpg)">${articulo.fecha_articulo}</div>
               </div>
            </div>
            <hr class=" mb-4 mb-lg-5" style="border: 1px solid #79FF39">
        `;
        });
        $("#articulos").html(plantilla);
      },
    });
  });
  $(document).on("click", ".articulo_id", function () {
    let element = $(this)[0].parentElement.parentElement;
    let articulo_id = $(element).attr("articulo_id");
    console.log(articulo_id);
  });

  /*»»»»»»»»»»»»»»»»»»»»»»»»««««««««««««««««««««««««
    Prueba Validación Usuario y Contraseña
   »»»»»»»»»»»»»»»»»»»»»»»»««««««««««««««««««««««««*/
  $("#formulario_ingreso").submit(function (e) {
    e.preventDefault();
    let datos = $(this).serializeArray();
    datos.push({ name: "elemento", value: "formulario_ingreso" });
    let url = "./controladores/Ajax.php";
    $.ajax({
      type: "post",
      url: "./controladores/Ajax.php",
      data: datos,
      dataType: "json",
      success: function (respuesta) {
        $("span").html(
          "<script>Swal.fire('¡Excelente!','El usuario y la contraseña ingresados son correctos.','success')</script>"
        );
      },
      error: function () {
        $("span").html(
          "<script>Swal.fire('¡Error!','El dato del usuario o la contraseña es incorrecto.','error')</script>"
        );
      },
      complete: function () {},
    });
  });
});
