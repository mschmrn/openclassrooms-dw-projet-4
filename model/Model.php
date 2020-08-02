<?php

namespace Model;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo(); // L'antislash signifie que Database n'est dans aucun namespace
        $this->search = Unsplash\Search::class;
    }

    /**
     * Retourne un article ou commentaire de la base de données grâce à son identifiant 
     * 
     * @param integer $id
     * @return array|bool l'article ou le commentaire si on le trouve, false si on ne le trouve pas
     */

    public function find(int $id) : array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }

    public function trash(int $id) : void
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '1', published = '0' WHERE id = :id");
        $query->execute(compact('id'));
    }

    public function restore(int $id, bool $published = false) : void
    {
        if($published || $this->table == "oc_projet4_comments")
        {
            $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '0', published  = '1' WHERE id = :id");
        }
        else
        {
            $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '0', published  = '0' WHERE id = :id");
        }
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
        $sql = "SELECT * FROM {$this->table} WHERE published = '1'";
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
        else if($order == 'admin')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE type = 'admin' ");
        }
        else
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table}");
        }
        $items = $results->fetchAll();
        return $items;
    }

    public function get(?string $column = "") : array
    {
        if($column)
        {
            $sql = "SELECT * FROM {$this->table}";
            $sql .= " WHERE " . $column .= "='1'";
            $results = $this->pdo->query($sql);
            $items = $results->fetchAll();
            return $items;
        }
    }
}

?>