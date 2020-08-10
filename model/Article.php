<?php

namespace Model;

class Article extends Model
{
    /**
     * Displays an HTML template and insert data
     * @method insert Insert an article in the Database
     * @method update Update an article or a draft in the Database
     * @method getArticleBy Finds an article by its title
     * @method newChapter Returns the number of the last article published
     */

    protected $table = "oc_projet4_articles";
    
     /**
     * Insère un article dans la base de données
     * 
     * @param string $title
     * @param string $introduction
     * @param string $content
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(string $title, string $introduction, string $content, int $draft, int $published, int $chapters, string $img_url) : void
    {
        $query = $this->pdo->prepare("INSERT INTO oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, published = :published, chapters = :chapters, img_url = :img_url, created_at = NOW()");
        $query->execute(compact('title', 'introduction', 'content', 'draft', 'published', 'chapters', 'img_url'));
    }

    public function update(int $id, string $title, string $introduction, string $content, int $draft, int $published, string $img_url) : void
    {
        $query = $this->pdo->prepare("UPDATE oc_projet4_articles SET title = :title, introduction = :introduction, content = :content, draft = :draft, published = :published, img_url = :img_url, modified_at = NOW() WHERE id = :id");
        $query->execute(compact('title', 'introduction', 'content', 'draft', 'published', 'img_url', 'id'));
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