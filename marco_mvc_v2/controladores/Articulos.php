<?php
class Articulos extends ArticulosModelo
{
    private $id_articulo;
    private $id_categoria;
    private $portada_articulo;
    private $titulo_articulo;
    private $descripcion_articulo;
    private $palabras_claves;
    private $contenido_articulo;
    private $vistas_articulo;
    private $fecha_articulo;

    private $banner;
    private $titulo_banner;
    private $descripcion_banner;
    private $titulo_categoria;
    private $descripcion_categoria;
    private $articulos;
    private $anuncios;
    private $opiniones;
    private $datos_opiniones;
    private $articulos_destacados_recientes;
    private $total_articulos;
    private $categoria;

    private $parametros;
    private $tabla1;
    private $tabla2;
    private $desde;
    private $cantidad;
    private $vista;
    private $alerta;

    public function __construct()
    {
        $this->id_articulo = null;
        $this->id_categoria = null;
        $this->portada_articulo = null;
        $this->titulo_articulo = null;
        $this->descripcion_articulo = null;
        $this->palabras_claves = null;
        $this->contenido_articulo = null;
        $this->vistas_articulo = null;
        $this->fecha_articulo = null;

        $this->banner = null;
        $this->titulo_banner = null;
        $this->descripcion_banner = null;
        $this->titulo_categoria = null;
        $this->descripcion_categoria = null;
        $this->articulos = null;
        $this->anuncios = null;
        $this->opiniones = null;
        $this->datos_opiniones = null;
        $this->articulos_destacados_recientes = null;
        $this->total_articulos = null;

        $this->parametros = null;
        $this->tabla1 = "categorias";
        $this->tabla2 = "articulos";
        $this->total_articulos = null;
        $this->desde = 0;
        $this->cantidad = 5;
        $this->categoria = null;
        $this->vista = get_class($this) . ".php";
        $this->alerta = null;
    }
    public function get_atributo($atributo)
    {
        return $this->$atributo;
    }
    public function set_atributo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function inicio($parametros)
    {
        $this->id_articulo = $parametros;
        $this->get_datos($this->id_articulo);
    }
    public function get_datos($id_articulo)
    {

        $this->get_banner();
        $this->get_articulo($id_articulo);
    }
    public function get_articulo($id_articulo)
    {
        if ($this->get_articulo_modelo($this->tabla1, $this->tabla2, $id_articulo)) {
            $this->set_atributo('id_articulo', $this->get_atributo_modelo('id_articulo'));
            $this->set_atributo('id_categoria', $this->get_atributo_modelo('id_categoria'));
            $this->set_atributo('categoria', $this->get_atributo_modelo('categoria'));
            $this->set_atributo('portada_articulo', $this->get_atributo_modelo('portada_articulo'));
            $this->set_atributo('titulo_articulo', $this->get_atributo_modelo('titulo_articulo'));
            $this->set_atributo('descripcion_articulo', $this->get_atributo_modelo('descripcion_articulo'));
            $this->set_atributo('palabras_claves', $this->get_atributo_modelo('palabras_claves'));
            $this->set_atributo('contenido_articulo', $this->get_atributo_modelo('contenido_articulo'));
            $this->set_atributo('vistas_articulo', $this->get_atributo_modelo('vistas_articulo'));
            $this->set_atributo('fecha_articulo', $this->get_atributo_modelo('fecha_articulo'));

            $this->get_datos_categoria($this->categoria);
            $this->get_anuncios($this->categoria);
            $this->get_articulos($this->categoria);
            $this->get_articulos_destacados_recientes($this->categoria);
            $this->get_opiniones_articulo($this->id_articulo);
            return true;
        } else {
            return false;
        }
    }
    public function get_datos_categoria($categoria)
    {
        if ($this->get_datos_categoria_modelo($categoria)) {
            $this->set_atributo('titulo_categoria', $this->get_atributo_modelo("titulo_categoria"));
            $this->set_atributo('descripcion_categoria', $this->get_atributo_modelo("descripcion_categoria"));
            return true;
        } else {
            $this->set_atributo('titulo_categoria', null);
            $this->set_atributo('descripcion_categoria', null);
            return false;
        }
    }
    public function get_anuncios($categoria)
    {
        if ($this->get_anuncios_modelo($categoria)) {
            $this->set_atributo('anuncios', $this->get_atributo_modelo('anuncios'));
            return true;
        } else {
            $this->set_atributo('anuncios', null);
            return false;
        }
    }
    public function get_banner()
    {
        if ($this->get_banner_modelo()) {
            $this->set_atributo('banner', $this->get_atributo_modelo('banner'));
            $this->set_atributo('titulo_banner', $this->get_atributo_modelo('titulo_banner'));
            $this->set_atributo('descripcion_banner', $this->get_atributo_modelo('descripcion_banner'));
            return true;
        } else {
            $this->set_atributo('banner', null);
            $this->set_atributo('titulo_banner', null);
            $this->set_atributo('descripcion_banner', null);
            return false;
        }
    }
    public function get_total_articulos($categoria)
    {
        if ($this->get_total_articulos_modelo($categoria, $this->tabla1, $this->tabla2)) {
            $this->set_atributo('total_articulos', $this->get_atributo_modelo("total_articulos"));
            return true;
        } else {
            $this->set_atributo('total_articulos', null);
            return false;
        }
    }
    public function get_articulos($categoria)
    {
        $this->set_atributo('categoria', $categoria);
        $this->get_total_articulos($this->categoria);
        if ($this->get_articulos_modelo($this->categoria, $this->tabla1, $this->tabla2, $this->desde, $this->cantidad)) {
            $this->set_atributo('articulos', $this->get_atributo_modelo("articulos"));
            return true;
        } else {
            $this->set_atributo('articulos', null);
            return false;
        }
    }
    public function get_articulos_destacados_recientes($categoria)
    {
        if ($this->get_articulos_destacados_recientes_modelo($categoria, $this->tabla1, $this->tabla2)) {
            $this->set_atributo('articulos_destacados_recientes', $this->get_atributo_modelo('articulos_destacados_recientes'));
            return true;
        } else {
            $this->set_atributo('articulos_destacados_recientes', null);
            return false;
        }
    }
    public function get_opiniones_articulo($id_articulo)
    {
        $this->opiniones = new Opiniones;
        if ($this->opiniones->get_opiniones_articulo($id_articulo)) {
            $this->set_atributo('datos_opiniones', $this->opiniones->get_atributo('opiniones'));
        } else {
            $this->set_atributo('opinionesArticulo', null);
        }
    }
    public function set_opinion_articulo($id)
    {
        if (isset($_POST['nombre_opinion']) && isset($_POST['correo_opinion']) && isset($_POST['contenido_opinion'])) {
            if (
                preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['nombre_opinion']) && filter_var($_POST['correo_opinion'], FILTER_VALIDATE_EMAIL) &&
                preg_match('/^[)\\(\\=\\$\\;\\*\\"\\¿\\?\\!\\¡\\:\\.\\,\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['contenido_opinion'])
            ) {
                $this->opiniones = new Opiniones;
                $this->opiniones->set_atributo('id_articulo', $id,);
                $this->opiniones->set_atributo('nombre_opinion', $_POST['nombre_opinion']);
                $this->opiniones->set_atributo('correo_opinion', $_POST['correo_opinion']);
                $this->opiniones->set_atributo('foto_opinion', 'vistas/img/usuarios/default.png');
                $this->opiniones->set_atributo('contenido_opinion', $_POST['contenido_opinion']);
                $this->opiniones->set_atributo('fecha_opinion', date('Y-m-d'));
                if ($this->opiniones->set_opinion_articulo()) {
                    $this->get_articulo($id);
                } else {
                    return false;
                }
            } else {
                $this->alerta = new ControladorLibreria;
                $this->tiposcript = $this->alerta->setAtributo("tiposcript", "simple");
                $this->titulo = $this->alerta->setAtributo("titulo", "Alerta");
                $this->texto = $this->alerta->setAtributo("texto", "Se ingresó texto inválido.");
                $this->tipoAlerta = $this->alerta->setAtributo("tipoAlerta", "warning");
                $this->alerta->getAlerta();
                $this->script = $this->alerta->getAtributo('alerta');
                $this->get_articulo($id);
            }
        }
    }
}
