<?php

namespace Model;

class Article extends Model
{
    protected $table = "oc_projet4_articles";
    
     /**
     * Insère un article dans la base de données
     * 
     * @param string $title
     * @param string $introduction
     * @param string $content
     * @return void
     */

    public function insert(string $title, string $introduction, string $content, int $draft) : void
    {
        $query = $this->pdo->prepare('INSERT INTO oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, created_at = NOW(), modified_at = NOW()');
        $query->execute(compact('title', 'introduction', 'content', 'draft'));
    }

    public function update(int $id, string $title, string $introduction, string $content, int $draft) : void
    {
        $query = $this->pdo->prepare('UPDATE oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, modified_at = NOW() WHERE id = :id');
        $query->execute(compact('title', 'introduction', 'content', 'draft', 'id'));
    }

    public function getArticleBy($title)
    {
        $query = $this->pdo->prepare("SELECT * FROM oc_projet4_articles WHERE title = :title");
        $query->execute(['title' => $title]);
        $item = $query->fetch();

        return $item;  
    }

    public function getDrafts(int $draft) : array
    {
        $query = $this->pdo->prepare("SELECT * FROM oc_projet4_articles WHERE draft = :draft");
        $query->execute(['draft' => $draft]);
        $items = $query->fetchAll();

        return $items;
    }

    public function getTrash(int $trash) : array
    {
        $query = $this->pdo->prepare("SELECT * FROM oc_projet4_articles WHERE trash = :trash");
        $query->execute(['trash' => $trash]);
        $items = $query->fetchAll();

        return $items;
    }

    public function trash(int $id) : void
    {
        $query = $this->pdo->prepare('UPDATE oc_projet4_articles SET trash = "1", modified_at = NOW() WHERE id = :id');
        $query->execute(compact('id'));
    }

    public function restore(int $id) : void
    {
        $query = $this->pdo->prepare('UPDATE oc_projet4_articles SET trash = "0", modified_at = NOW() WHERE id = :id');
        $query->execute(compact('id'));
    }


}




?>