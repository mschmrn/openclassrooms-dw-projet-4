<?php

class Application
{
    /**
     * @method process 
     * Checks url options
     * Executes Class and method based on url information
     */

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
        // Blocage d'erreur
        $controller = new $controllerName();
        $controller->$task();

    }
}

?>