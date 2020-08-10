<?php

class Admin
{
    /**
     * @method checkAdmin Checks if the user's an admin
     */

    public static function checkAdmin() 
    {
        if(isset($_SESSION["username"]))
        {
            $admin = $_SESSION["username"];
            return $admin;
        }
    }
}

?>