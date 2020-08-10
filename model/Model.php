<?php

namespace Model;

abstract class Model
{
    /**
     * Displays an HTML template and insert data
     * @property pdo PDO connection to the Database
     * @property table Project's table to edit
     
     * @method find Find an item by its ID
     * @method trash Move an item to trash 
     * @method restore Restore an item from trash
     * @method delete Delete definitely an item
     * @method get Get a specific item
     * @method getAll Get all items based on specific query
     */

    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo(); // Database has no NameSpace
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
        if ($this->table == "oc_projet4_comments")
        {
            $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '1', published = '0', reported = '0', pending = '0' WHERE id = :id");
        }
        else
        {
            $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '1', published = '0' WHERE id = :id");
        }
        $query->execute(compact('id'));
    }

    public function restore(int $id, ?bool $published = false) : void
    {
        if($published)
        {
            $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '0', published  = '1' WHERE id = :id");
        }
        else if ($this->table == "oc_projet4_comments")
        {
            $query = $this->pdo->prepare("UPDATE {$this->table} SET trash = '0', published = '0', pending  = '1' WHERE id = :id");
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

    public function getAll(?string $order = "") : array
    {
        if($order == 'admin')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE type = 'admin' ");
        }
        else if($order == 'drafts_trash')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE (trash AND draft) = '1'");
        }
        else if($order == 'articles_trash')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE (trash = '1' AND draft = '0')");
        }
        else if($order == 'drafts')
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} WHERE (draft = '1' AND trash = '0')");
        }
        else if($order == ('chapters DESC' || 'chapters ASC'))
        {
            $sql = "SELECT * FROM {$this->table} WHERE published = '1'";
            $sql .= " ORDER BY " . $order;
            $results = $this->pdo->query($sql);
        }
        else
        {
            $results = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        }
        $items = $results->fetchAll();
        return $items;
    }

    public function get(?string $column = "", ?bool $not_in_trash=false) : array
    {   
        $sql = "SELECT * FROM {$this->table}";
        if($column)
        {
            $sql .= " WHERE " . $column .= " ='1' ";
        }
        if($not_in_trash)
        {
            $sql .= " AND trash = '0' ORDER BY id DESC ";
        }
        $results = $this->pdo->query($sql);
        $items = $results->fetchAll();
        return $items;

    }
}

?>