<?php

namespace Controller;

abstract class Controller
{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        $this->model = new $this->modelName(); // new \Model\Article()
    }


}
?>