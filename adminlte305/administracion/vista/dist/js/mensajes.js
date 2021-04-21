var xhr = new XMLHttpRequest();
xhr.open("GET", "../controlador/ingreso.php");
xhr.onload = function () {
  if (xhr.status === 200) {
    var mensaje = JSON.parse(xhr.responseText);
    document.getElementById("lista").innerHTML = mensaje;
  } else {
    console.log("EXISTE UN ERROR" + xhr.status);
  }
};
xhr.send();
