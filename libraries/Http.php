<?php

class Http
{
    /**
     * @method redirect Redirects user to a page URL
     * @param string $url
     * @return void
     */

    public static function redirect(string $url) : void
    {
        ob_start();
        header("Location: $url");
        ob_get_clean();
        exit();
    }

    

}

?>