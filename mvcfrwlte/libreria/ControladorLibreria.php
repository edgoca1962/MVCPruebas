<?php
class ControladorLibreria
{
  private $tipoMensaje;
  private $titulo;
  private $texto;
  private $tipoAlerta;
  private $alerta;
  private $textoLimpio;
  private $salt;
  private $salt_chars;
  public function __construct()
  {
    $this->tipoMensaje = NULL;
    $this->titulo = NULL;
    $this->texto = NULL;
    $this->tipoAlerta = NULL;
    $this->alerta = NULL;
    $this->salt = NULL;
  }
  public function setAtributoAlerta($atributo, $contenido)
  {
    $this->$atributo = $contenido;
  }
  public function getAtributoAlerta($atributo)
  {
    return $this->$atributo;
  }

  public function getAlerta()
  {
    $this->tipoMensaje = $this->getAtributoAlerta("tipoMensaje");
    $this->titulo = $this->getAtributoAlerta("titulo");
    $this->texto = $this->getAtributoAlerta("texto");
    $this->tipoAlerta = $this->getAtributoAlerta("tipoAlerta");
    if ($this->tipoMensaje == "simple") {
      $this->alerta = "
            <script>
	            swal.fire(
	              '" . $this->titulo . "',
	              '" . $this->texto . "',
                '" . $this->tipoAlerta . "'
              );
	          </script>
	        ";
    } elseif ($this->tipoMensaje == "recargar") {
      $this->alerta = "
	          <script>
	            swal.fire({
	              title: '" . $this->titulo . "',
	              text: '" . $this->texto . "',
	              type: '" . $this->tipoAlerta . "',
	              confirmButtonText: 'Aceptar'
	            }).then(function(){
	              location.reload();
	            });
	          </script>
	        ";
    } elseif ($this->tipoMensaje == "limpiar") {
      $this->alerta = "
	          <script>
	            swal.fire({
	              title: '" . $this->titulo . "',
	              text: '" . $this->texto . "',
	              type: '" . $this->tipoAlerta . "',
	              confirmButtonText: 'Aceptar'
	            }).then(function(){
	              $('.FormularioAjax')[0].reset();
	            });
	            </script>
	        ";
    }
    return  $this->alerta;
  }
  public function getTextoLimpio($texto)
  {
    $this->textoLimpio = trim($texto);
    $this->textoLimpio = stripslashes($texto);
    $this->textoLimpio = str_ireplace("<script>", "", $texto);
    $this->textoLimpio = str_ireplace("</script>", "", $texto);
    $this->textoLimpio = str_ireplace("<script src", "", $texto);
    $this->textoLimpio = str_ireplace("<script type=", "", $texto);
    $this->textoLimpio = str_ireplace("SELECT * FROM", "", $texto);
    $this->textoLimpio = str_ireplace("DELETE FROM", "", $texto);
    $this->textoLimpio = str_ireplace("INSERT INTO", "", $texto);
    $this->textoLimpio = str_ireplace("UPDATE", "", $texto);
    $this->textoLimpio = str_ireplace("http//", "", $texto);
    $this->textoLimpio = str_ireplace("https//", "", $texto);
    $this->textoLimpio = str_ireplace("<", "", $texto);
    $this->textoLimpio = str_ireplace("/>", "", $texto);
    $this->textoLimpio = str_ireplace("--", "", $texto);
    $this->textoLimpio = str_ireplace("^", "", $texto);
    $this->textoLimpio = str_ireplace("[", "", $texto);
    $this->textoLimpio = str_ireplace("]", "", $texto);
    $this->textoLimpio = str_ireplace("==", "", $texto);
    $this->textoLimpio = str_ireplace(";", "", $texto);
    return $this->textoLimpio;
  }
  public function getEncriptar($clave, $rounds = 7)
  {
    $this->salt_chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    for ($i = 0; $i < 22; $i++) {
      $this->salt .= $this->salt_chars[array_rand($this->salt_chars)];
    }
    return crypt($clave, sprintf('$2x$%02d$', $rounds) . $this->salt);
  }
}
