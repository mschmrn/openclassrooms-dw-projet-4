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
        ob_start();
        header("Location: $url");
        ob_get_clean();
        exit();
    }

    public function UnsplashClient()
    {
        Crew\Unsplash\HttpClient::init([
            'applicationId'	=> 'LWTE7Qs3-PXo38YWLlKnXoypsn6xGLK7Vr2HR93jua0',
            'secret'		=> 'aI6w_i50jj395LoAzaZrHpx5LzvYcZieyuh07qxqnZA',
            'callbackUrl'	=> 'https://projet-4-oc.ismaeljouhari.com/oauth/callback',
            'utmSource' => 'projet-4-oc'
        ]);
    }
    
    
    

}

?>