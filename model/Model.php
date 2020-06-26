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

    public function setDate()
    {
        $this->pdo->query("SET lc_time_names = 'fr_FR'");
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

    public function findAll(?string $order = "") : array
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($order)
        {
            $sql .= " ORDER BY " . $order;
        }
        $results = $this->pdo->query($sql);
        $items = $results->fetchAll();
        
        return $items;
    }
}
?>