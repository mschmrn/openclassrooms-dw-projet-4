<?php

class Renderer
{
    /**
     * Affiche un template HTML en injectant les $variables
     * 
     * @param string path
     * @param array $variables
     * @return void
     */

    public static function render(string $path, array $variables = []) : void
    {
        extract($variables); // affiche variable une à une
        ob_start();
        require('view/frontend/' . $path . '.html.php');
        $pageContent = ob_get_clean();
    
        require('view/frontend/layout.html.php');
    }
}

?>