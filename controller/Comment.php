<?php

namespace Controller;

class Comment extends Controller
{
    protected $modelName = \Model\Comment::class;

    public function insert() // Insert a comment
    {
        /**
         * On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */

        // On commence par l'author
        $author = null;
        if (!empty($_POST['author'])) 
        {
            $author = $_POST['author'];
        }

        // Ensuite le contenu
        $content = null;
        if (!empty($_POST['content'])) 
        {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }

        // Enfin l'id de l'article
        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) 
        {
            $article_id = $_POST['article_id'];
        }

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$author || !$article_id || !$content) 
        {
            die("Votre formulaire a été mal rempli !");
        }

        /**
         * Vérification que l'id de l'article pointe bien vers un article qui existe
         */
        $article = $this->model->find($article_id);

        // Si rien n'est revenu, on fait une erreur
        if ($article === false) 
        {
            die("Ho ! L'article $article_id n'existe pas boloss !");
        }

        // Insertion du commentaire
        $this->model->insert($author, $content, $article_id);

        // Redirection vers l'article en question :
        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }

    public function delete() // Delete a comment
    {
        /**
         * Récupération du paramètre "id" en GET
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        /**
         * 2. Connexion à la base de données avec PDO
         * Attention, on précise ici deux options :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         * 
         * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
         */

        /**
         * 3. Vérification de l'existence du commentaire
         */

        $comment = $this->model->find($id);
        if (!$comment)
        {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        /**
         * 4. Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */

        $article_id = $comment['article_id'];
        $this->model->delete($id);

        /**
         * 5. Redirection vers l'article en question
         */
        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);

    }
   
}

?>