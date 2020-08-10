<?php

// Expliquer que la classe est dans un dossier spécifique différent
namespace Model;

class Comment extends Model
{
    /**
     * @method findAllByArticle Finds all the comments published below an Article
     * @method insert Inserts a comment in the Database
     * @method check Changes 'pending' value from 1 to 0 on SQL Databse
     * @method report Change 'reported' value from 0 to 1 on SQL Database 
     */

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
     * @param string $email
     * @param string $content
     * @param integer $article_id
     * @return void
     */

    public function insert(string $author, string $email, string $content, int $article_id) : void
    {
        $query = $this->pdo->prepare('INSERT INTO oc_projet4_comments SET author = :author, email = :email, content = :content, article_id = :article_id, pending = "1", created_at = NOW()');
        $query->execute(compact('author', 'email', 'content', 'article_id'));
    }

    public function check(int $id) : void
    {
        $query = $this->pdo->prepare("UPDATE oc_projet4_comments SET pending = '0', published = '0', reported = '0' WHERE id = :id");
        $query->execute(compact('id'));
    }

    public function report(int $id) : void
    {
        $query = $this->pdo->prepare("UPDATE oc_projet4_comments SET reported = reported + 1 WHERE id = :id");
        $query->execute(compact('id'));
    }
}



?>