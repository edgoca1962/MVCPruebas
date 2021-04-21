<?php
class Controllers
{
    protected function __construct()
    {

        $this->loadModel();
        $this->views = new Views();
    }
    protected function loadModel()
    {
        $model = get_class($this) . "Model";
        $routeClass = "Models/" . $model . ".php";
        if (file_exists($routeClass)) {
            require_once($routeClass);
            $this->model = new $model();
        }
    }
}
