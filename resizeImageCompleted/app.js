// function proceso() {
var form = document.querySelector(".needs-validation");
var archivo = document.getElementById("archivo");
if (archivo) {
  var fuenteImagen = document.getElementById("imagen");
  archivo.addEventListener("change", (e) => {
    var imagen = document.getElementById("imagen");
    var frmData = new FormData(form);
    var archivo = frmData.get("archivo");
    var tipoArchivo = frmData.get("type");
    var fuente = fuenteImagen.getAttribute("src");
    var src = URL.createObjectURL(archivo);
    if (archivo.name == "") {
      imagen.setAttribute("src", fuente);
    } else {
      let reader = new FileReader();
      reader.readAsDataURL(archivo);
      reader.onload = function (event) {
        let imgElement = document.createElement("img");
        imgElement.src = event.target.result;
        // document.querySelector("#input").src = event.target.result;
        imgElement.onload = function (e) {
          let canvas = document.createElement("canvas");
          let MAX_WIDTH = 900;
          let ctx = canvas.getContext("2d");
          /* Hace falta preguntar por el tamaño deseado o el peso de la la imagen
          La siguiente rutina recorta el centro de una imagen con un cuadrado
          */
          if (e.target.height > e.target.width) {
            var sx = e.target.width / 8;
            var anchoAlto = e.target.width - 2 * sx;
            var sy = e.target.height / 2 - anchoAlto / 2;
            var sw = anchoAlto;
            var sh = anchoAlto;
            canvas.width = MAX_WIDTH;
            canvas.height = e.target.height * (MAX_WIDTH / e.target.height);
            var dw = MAX_WIDTH;
            var dh = e.target.height * (MAX_WIDTH / e.target.height);
          } else {
            var sy = e.target.height / 8;
            var anchoAlto = e.target.height - 2 * sy;
            var sx = e.target.width / 2 - anchoAlto / 2;
            var sw = anchoAlto;
            var sh = anchoAlto;
            canvas.width = e.target.width * (MAX_WIDTH / e.target.width);
            canvas.height = MAX_WIDTH;
            var dw = MAX_WIDTH;
            var dh = e.target.width * (MAX_WIDTH / e.target.width);
          }
          let dx = 0;
          let dy = 0;
          ctx.drawImage(e.target, sx, sy, sw, sh, dx, dy, dw, dh);
          /* Hace falta validar los tipos de archivos aceptados.*/
          let srcEncoded = ctx.canvas.toDataURL(e.target, tipoArchivo);
          document.querySelector("#imagen").src = srcEncoded;
        };
      };
    }
    /*
     */
  });
}
// }

function process() {
  let file = document.querySelector("#archivo").files[0];
  if (!file) return;
  let reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = function (event) {
    let imgElement = document.createElement("img");
    imgElement.src = event.target.result;
    // document.querySelector("#input").src = event.target.result;
    imgElement.onload = function (e) {
      let canvas = document.createElement("canvas");
      let MAX_WIDTH = 900;
      let ctx = canvas.getContext("2d");
      /* Hace falta preguntar por el tamaño deseado o el peso de la la imagen
      La siguiente rutina recorta el centro de una imagen con un cuadrado
      */
      if (e.target.height > e.target.width) {
        var sx = e.target.width / 8;
        var anchoAlto = e.target.width - 2 * sx;
        var sy = e.target.height / 2 - anchoAlto / 2;
        var sw = anchoAlto;
        var sh = anchoAlto;
        canvas.width = MAX_WIDTH;
        canvas.height = e.target.height * (MAX_WIDTH / e.target.height);
        var dw = MAX_WIDTH;
        var dh = e.target.height * (MAX_WIDTH / e.target.height);
      } else {
        var sy = e.target.height / 8;
        var anchoAlto = e.target.height - 2 * sy;
        var sx = e.target.width / 2 - anchoAlto / 2;
        var sw = anchoAlto;
        var sh = anchoAlto;
        canvas.width = e.target.width * (MAX_WIDTH / e.target.width);
        canvas.height = MAX_WIDTH;
        var dw = MAX_WIDTH;
        var dh = e.target.width * (MAX_WIDTH / e.target.width);
      }
      let dx = 0;
      let dy = 0;
      ctx.drawImage(e.target, sx, sy, sw, sh, dx, dy, dw, dh);
      let srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");
      document.querySelector("#imagen").src = srcEncoded;
    };
  };
}
function reducirDimensionImagen() {
  let file = document.querySelector("#id del input file").files[0];
  if (!file) return;
  let reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = function (event) {
    let imgElement = document.createElement("img");
    imgElement.src = event.target.result;
    document.querySelector("#input").src = event.target.result;
    imgElement.onload = function (e) {
      let canvas = document.createElement("canvas");
      let MAX_WIDTH = 900;
      let ctx = canvas.getContext("2d");
      /* 
      Hace falta preguntar por el tamaño deseado o el peso de la la imagen
       */
      if (e.target.height > e.target.width) {
        const scaleSize = MAX_WIDTH / e.target.width;
        canvas.width = MAX_WIDTH;
        canvas.height = e.target.height * scaleSize;
      } else {
        const scaleSize = MAX_WIDTH / e.target.height;
        canvas.width = e.target.width * scaleSize;
        canvas.height = MAX_WIDTH;
      }
      ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);
      /* 
      Hace falta preguntar por los tipos de imágenes aceptados.
       */
      let srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");
      document.querySelector("#imagen").src = srcEncoded;
    };
  };
}
