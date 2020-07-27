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

    public function insert(string $title, string $introduction, string $content, int $draft, int $published) : void
    {
        $query = $this->pdo->prepare("INSERT INTO oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, published = :published, created_at = NOW()");
        $query->execute(compact('title', 'introduction', 'content', 'draft', 'published'));
    }

    public function update(int $id, string $title, string $introduction, string $content, int $draft, int $published) : void
    {
        $query = $this->pdo->prepare('UPDATE oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, published = :published modified_at = NOW() WHERE id = :id');
        $query->execute(compact('title', 'introduction', 'content', 'draft', 'id'));
    }

    public function getArticleBy($title)
    {
        $query = $this->pdo->prepare("SELECT * FROM oc_projet4_articles WHERE title = :title");
        $query->execute(['title' => $title]);
        $item = $query->fetch();

        return $item;  
    }
}

?>