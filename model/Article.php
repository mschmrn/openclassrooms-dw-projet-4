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

    public function insert(string $title, string $introduction, string $content, int $draft, int $published, int $chapters) : void
    {
        $query = $this->pdo->prepare("INSERT INTO oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, published = :published, chapters = :chapters, created_at = NOW()");
        $query->execute(compact('title', 'introduction', 'content', 'draft', 'published', 'chapters'));
    }

    public function update(int $id, string $title, string $introduction, string $content, int $draft, int $published) : void
    {
        $query = $this->pdo->prepare("UPDATE oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, published = :published, modified_at = NOW() WHERE id = :id");
        $query->execute(compact('title', 'introduction', 'content', 'draft', 'published','id'));
    }

    public function getArticleBy($title) : array
    {
        $query = $this->pdo->prepare("SELECT * FROM oc_projet4_articles WHERE title = :title");
        $query->execute(['title' => $title]);
        $item = $query->fetch();

        return $item;  
    }

    public function newChapter() : int
    {
        $query = $this->pdo->query("SELECT MAX(chapters) as maxchapter FROM oc_projet4_articles WHERE published = '1'");
        $row = $query->fetch();
        return intval($row["maxchapter"],10)+1;
    }
}

?>