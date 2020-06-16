<?php

// Expliquer que la classe est dans un dossier spécifique différent
namespace Model;

class Comment extends Model
{
    protected $table = "oc_projet4_comments";

    /**
     * Retourne la liste des commentaires d'un article donné
     * 
     * @param integer $article_id
     * @return array
     */

    public function findAllByArticle(int $article_id) : array
    {
        $query = $this->pdo->prepare('SELECT * FROM oc_projet4_comments WHERE article_id = :article_id' );
        $query->execute(['article_id' => $article_id]);
        $comments = $query->fetchAll(); 

        return $comments;
    }

    /**
     * Insère un commentaire dans la base de données
     * 
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */

    public function insert(string $author, string $content, int $article_id) : void
    {
        $query = $this->pdo->prepare('INSERT INTO oc_projet4_comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}

?>