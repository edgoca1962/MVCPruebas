<?php
class AlertasLibreria
{
  private $tipoMensaje;
  private $titulo;
  private $texto;
  private $tipoAlerta;
  private $alerta;
  public function __construct()
  {
    $this->tipoMensaje = NULL;
    $this->titulo = NULL;
    $this->texto = NULL;
    $this->tipoAlerta = NULL;
    $this->alerta = NULL;
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
    $this->tipoMensaje = $this->getAtributo("tipoMensaje");
    $this->titulo = $this->getAtributo("titulo");
    $this->texto = $this->getAtributo("texto");
    $this->tipoAlerta = $this->getAtributo("tipoAlerta");
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
}
