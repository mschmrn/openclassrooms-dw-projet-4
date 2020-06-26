<?php

class Application
{
    public static function process()
    {
        $controllerName = "Article";
        $task = "home";

        if (!empty($_GET['controller']))
        {
            $controllerName = ucfirst($_GET['controller']);
        }

        if (!empty($_GET['task']))
        {
            $task = $_GET['task'];
        }

        $controllerName = "\Controller\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}

?>