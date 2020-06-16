<?php

/**
 * Classe qui concerne tout le protocole Http : redirections, session, récupération de paramètres en GET ou en POST
 * Tout ce qui concerne la requête et la réponse
 */

class Http
{

    /**
     * Redirige le visiteur vers $url
     * 
     * @param string $url
     * @return void
     */

    public static function redirect(string $url) : void
    {
        header("Location: $url");
        exit();
    }
}

?>