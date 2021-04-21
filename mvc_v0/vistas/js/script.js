$(document).ready(function () {
  var url = window.location;
  $(".activar").removeClass("active");
  $('.nav .nav-item a[href="' + url + '"]').addClass("active");
});
