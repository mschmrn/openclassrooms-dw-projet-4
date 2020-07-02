<?php

namespace Model;

class Admin extends Model
{
    protected $table = "oc_projet4_users";

    public function insert(string $username, string $email, string $type, string $password) : void
    {    
        $query = $this->pdo->prepare('INSERT INTO oc_projet4_users SET username = :username, email = :email, type = :type, password = :password');
        $query->execute(compact('username', 'email', 'type', 'password'));
    }

    public function find_user(string $username)
    {
        $query = $this->pdo->prepare("SELECT * FROM `oc_projet4_users` WHERE username='$username'");
        $query->execute(['username' => $username]);
        $user = $query->fetch();
        return $user;
    }
}


?>