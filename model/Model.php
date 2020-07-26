<?php

namespace Model;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo(); // L'antislash signifie que Database n'est dans aucun namespace
    }

    /**
     * Retourne un article ou commentaire de la base de données grâce à son identifiant 
     * 
     * @param integer $id
     * @return array|bool l'article ou le commentaire si on le trouve, false si on ne le trouve pas
     */

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }

    public function trash(int $id) : void
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '1', modified_at = NOW() WHERE id = :id");
        $query->execute(compact('id'));
    }

    public function restore(int $id) : void
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '0', modified_at = NOW() WHERE id = :id");
        $query->execute(compact('id'));
    }

    /**
     * Supprime un article ou un commentaire grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id) : void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
      
    /**
     * Retourne une liste d'items classés par date de création
     * 
     * @return array
     */

    public function findAll(?string $param = "") : array
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($param == ('chapters DESC' || 'chapters ASC'))
        {
            $sql .= " ORDER BY " . $param;
        }
        else if ($param == 'draft')
        {
            $sql .= " WHERE draft='1' ";
        }
        $results = $this->pdo->query($sql);
        $items = $results->fetchAll();
    
        return $items;
    }

    public function getAll(?string $order = "") : array
    {
        if($order == ('chapters DESC') || $order == ('chapters ASC'))
        {
            $sql = "SELECT * FROM {$this->table} WHERE published = '1'";
            $sql .= " ORDER BY " . $order;
            $results = $this->pdo->query($sql);
        }
        else if($order == 'drafts')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE (draft = '1' AND trash = '0')");
        }
        else if($order == 'drafts_trash')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE (trash AND draft) = '1'");
        }
        else if($order == 'articles_trash')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE (trash = '1' AND draft = '0')");
        }
        else
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table}");
        }
        $items = $results->fetchAll();
        return $items;
    }

    


}
?>