/*=============================================
BANNER
=============================================*/

$(".fade-slider").jdSlider({
  isSliding: false,
  isAuto: true,
  isLoop: true,
  isDrag: false,
  interval: 5000,
  isCursor: false,
  speed: 3000,
});

var alturaBanner = $(".fade-slider").height();

$(".bannerEstatico").css({ height: alturaBanner + "px" });

/*=============================================
ANIMACIONES SCROLL
=============================================*/

$(window).scroll(function () {
  var posY = window.pageYOffset;

  if (posY > alturaBanner) {
    $("header").css({ background: "white" });

    $("header .logotipo").css({ filter: "invert(100%)" });

    $(".fa-search, .fa-bars").css({ color: "black" });
  } else {
    $("header").css({ background: "rgba(0,0,0,.5)" });

    $("header .logotipo").css({ filter: "invert(0%)" });

    $(".fa-search, .fa-bars").css({ color: "white" });
  }
});

/*=============================================
MENÚ
=============================================*/

$(".fa-bars").click(function () {
  $(".menu").fadeIn("fast");
});

$(".btnClose").click(function (e) {
  e.preventDefault();

  $(".menu").fadeOut("fast");
});

/*=============================================
GRID CATEGORÍAS
=============================================*/

$(".grid figure, .gridFooter figure").mouseover(function () {
  $(this).css({ "background-position": "right bottom" });
});

$(".grid figure, .gridFooter figure").mouseout(function () {
  $(this).css({ "background-position": "left top" });
});

$(".grid figure, .gridFooter figure").click(function () {
  var vinculo = $(this).attr("vinculo");

  window.location = vinculo;
});

/*=============================================
PAGINACIÓN
=============================================*/

/* var paginaActual = Number($(".pagination").attr("paginaActual"));
var totalPaginas = Number($(".pagination").attr("totalPaginas"));
var rutaActual = $("#rutaActual").val();
$(".pagination")
  .twbsPagination({
    totalPages: totalPaginas,
    startPage: paginaActual,
    visiblePages: 4,
    first: "Primero",
    last: "Último",
    prev: '<i class="fas fa-angle-left"></i>',
    next: '<i class="fas fa-angle-right"></i>',
  })
  .on("page", function (evt, page) {
    window.location = rutaActual + page;
  });
 */
/*=============================================
SCROLL UP
=============================================*/

$.scrollUp({
  scrollText: "",
  scrollSpeed: 2000,
  easingType: "easeOutQuint",
});

/*=============================================
DESLIZADOR DE ARTÍCULOS
=============================================*/

$(".deslizadorArticulos").jdSlider({
  wrap: ".slide-inner",
  slideShow: 3,
  slideToScroll: 3,
  isLoop: true,
  responsive: [
    {
      viewSize: 320,
      settings: {
        slideShow: 1,
        slideToScroll: 1,
      },
    },
  ],
});

/*=============================================
SUBIR FOTO TEMPORAL DE OPINIÓN.
=============================================*/
$("#fotoOpinion").change(function () {
  var imagen = this.files[0];
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("#fotoOpinion").val("");
    $("#fotoOpinion").after(`
    <div class="alert alert-danger">¡El formato de la imagen debe ser JPG o PNG!</div>
    `);
    return;
  } else if (imagen["size"] > 2000000) {
    $("#fotoOpinion").val("");
    $("#fotoOpinion").after(`
    <div class="alert alert-danger">¡El archivo no puede ser mayor a 2MB!</div>
    `);
    return;
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);
    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;
      $(".prevFotoOpinion").attr("src", rutaImagen);
    });
  }
});
/*==================================================
  AJAX Envío de datos para el formulario de Ingreso
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
