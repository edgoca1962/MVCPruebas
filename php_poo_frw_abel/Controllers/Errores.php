<?php
class Errores extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function notFound()
    {
        $this->views->getView($this, "errores");
    }
}
$notFound = new Errores();
$notFound->notFound();
