<?php
class ControladorLibreria
{
  private $tiposcript;
  private $titulo;
  private $texto;
  private $tipoAlerta;
  private $alerta;
  private $textoLimpio;
  private $salt;
  private $salt_chars;
  public function __construct()
  {
    $this->tiposcript = NULL;
    $this->titulo = NULL;
    $this->texto = NULL;
    $this->tipoAlerta = NULL;
    $this->alerta = NULL;
    $this->salt = NULL;
  }
  public function inicio($parametros = "")
  {
  }
  public function setAtributo($atributo, $contenido)
  {
    $this->$atributo = $contenido;
  }
  public function getAtributo($atributo)
  {
    return $this->$atributo;
  }

  public function getAlerta()
  {
    $this->tiposcript = $this->getAtributo("tiposcript");
    $this->titulo = $this->getAtributo("titulo");
    $this->texto = $this->getAtributo("texto");
    $this->tipoAlerta = $this->getAtributo("tipoAlerta");
    if ($this->tiposcript == "simple") {
      $this->alerta = "
            <script>
	            swal.fire(
	              '" . $this->titulo . "',
	              '" . $this->texto . "',
                '" . $this->tipoAlerta . "'
              );
	          </script>
	        ";
    } elseif ($this->tiposcript == "recargar") {
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
    } elseif ($this->tiposcript == "limpiar") {
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
  public function getEncriptar($clave, $veces = 7)
  {
    $this->salt_chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    for ($i = 0; $i < 22; $i++) {
      $this->salt .= $this->salt_chars[array_rand($this->salt_chars)];
    }
    return crypt($clave, sprintf('$2x$%02d$', $veces) . $this->salt);
  }
}
