<?php

class Admin
{
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