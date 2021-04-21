<?php
class BaseLibreria
{
    private $host;
    private $usuario;
    private $clave;
    private $nombre_base;
    private $conector;
    private $conexion;
    private $error;

    protected function __construct()
    {
        $this->host = null;
        $this->usuario = null;
        $this->clave = null;
        $this->nombre_base = null;
        $this->conector = null;
        $this->conexion = null;
        $this->error = null;
    }
    protected function conectar()
    {
        $this->host = 'localhost';
        $this->usuario = 'root';
        $this->clave = 'root';
        $this->nombre_base = 'blog_marco';
        $this->conector = 'mysql:host=' . $this->host . ";dbname=" . $this->nombre_base;
        $this->opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            $this->conexion = new PDO($this->conector, $this->usuario, $this->clave, $this->opciones);
            return $this->conexion;
        } catch (PDOException $error) {
            $this->error = $error->getMessage();
            exit();
        }
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
