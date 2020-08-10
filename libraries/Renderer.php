<?php

class Renderer
{
    /**
     * Displays an HTML template and insert data
     * @param string folder Main folder (back/front)
     * @param string path Path of the file to read
     * @param array $variables Variables to transpose
     * @return void
     */

    public static function render(string $folder, string $path, array $variables = []) : void
    {
        extract($variables); // Displays all variables one by one
        ob_start();
        require('view/' . $folder . '/' . $path . '.html.php');
        $pageContent = ob_get_clean();

        require_once('view/' . $folder . '/layout.html.php');
    }    
}

?>