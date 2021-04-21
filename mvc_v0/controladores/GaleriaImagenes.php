<?php
class GaleriaImagenes extends GaleriaImagenesModelo
{
    private $titulo;
    private $vista;
    private $alerta;

    private $rutas_proyecto;
    private $datos_rutas_proyecto;
    private $datos_archivo;
    private $nombre_archivo;
    private $ruta;
    private $archivo_origen;
    private $ruta_img_banners;

    public function __construct()
    {
        $this->titulo = "Manejo de archivos";
        $this->vista = get_class($this) . ".php";
        $this->alerta = null;

        $this->datos_archivo = null;
        $this->nombre_archivo = null;
        $this->ruta = null;
        $this->archivo_origen = null;
        $this->rutas_proyecto = null;
        $this->datos_rutas_proyecto = null;
        $this->ruta_img_banners = null;
    }
    public function get_atributo($atributo)
    {
        return $this->$atributo;
    }
    public function set_atributo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function inicio($parametros = [])
    {
        $this->get_rutas_proyecto();
    }
    public function agregar_imagen()
    {
        list($this->ancho, $this->alto) = getimagesize($this->datos_archivo["tmp_name"]);
        if ($this->datos_archivo["size"] <= 2000000) {
            if (($this->datos_archivo["type"] == "image/jpeg" || $this->datos_archivo["type"] == "image/png")) {
                if ($this->ancho >= 1600 || $this->alto >= 600) {
                    if ($this->datos_archivo["type"] == "image/jpeg") {
                        $this->nombre_archivo = "IMG_" . mt_rand(1000, 9999) . ".JPG";
                        $this->ruta = "../" . $this->rutas_proyecto["img_banners"]["ruta"] . $this->nombre_archivo;
                        $this->archivo_origen = imagecreatefromjpeg($this->datos_archivo["tmp_name"]);
                        imagejpeg($this->archivo_origen, $this->ruta);
                    } else {
                        $this->nombre_archivo = "IMG_" . mt_rand(1000, 9999) . ".png";
                        $this->ruta = "../" . $this->rutas_proyecto["img_banners"]["ruta"] . $this->nombre_archivo;
                        $this->archivo_origen = imagecreatefrompng($this->datos_archivo["tmp_name"]);
                        imagepng($this->archivo_origen, $this->ruta);
                    }
                    $this->ruta = $this->img_banners . $this->nombre_archivo;
                    $this->alerta = ["flag" => 1, "respuesta" => $this->ruta];
                } else {
                    $this->alerta = ["flag" => 0, "respuesta" => "<script>Swal.fire('Error!','Las dimensiones del archivo deben ser 1600px * 600px','error')</script>"];
                }
            } else {
                $this->alerta = ["flag" => 0, "respuesta" => "<script>Swal.fire('Error!','Solo se pueden agregar archivos JPG o PNG.','error')</script>"];
            }
        } else {
            $this->alerta = ["flag" => 0, "respuesta" => "<script>Swal.fire('Error!','El archivo supera los 2MB.','error')</script>"];
        }
        return  $this->alerta;
    }
    public function get_rutas_proyecto()
    {
        if ($this->get_rutas_proyecto_modelo()) {
            $this->rutas_proyecto = $this->get_atributo_modelo("rutas_proyecto");
            foreach ($this->rutas_proyecto as $key => $value) {
                $this->datos_rutas_proyecto[$value['ruta_descripcion']] = $value;
            }
            $this->rutas_proyecto = $this->datos_rutas_proyecto;
            $this->ruta_img_banners = $this->rutas_proyecto["dominio"]["ruta"] . $this->rutas_proyecto["img_banners"]["ruta"];
        } else {
            $this->rutas_proyecto = null;
        }
    }
}
