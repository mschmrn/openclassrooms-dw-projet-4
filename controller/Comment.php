<?php

namespace Controller;

class Comment extends Controller
{
    /**
     * @method valid Confirm a pending comment 
     * @method report Report a comment
     * @method preview Previews the comment and the associated article
     * @method insert Insert a new comment
     */

    protected $modelName = \Model\Comment::class;
    protected $item = 'comment';

    public function __construct()
    {
        parent::__construct();
        $this->articleModel = new \Model\Article();
    }

    public function valid()
    {
        if (!empty($_GET['id']) && isset($_SESSION["username"]))
        {
            $id = $_GET['id'];
            $this->model->check($id);
            \Http::redirect("index.php?controller=admin&task=viewComments");
        } 
    }

    public function report()
    {
        if (!empty($_GET['id']))
        {
            $id = $_GET['id'];
            $this->model->report($id);
            die('Votre commentaire a bien été signalé');
        }
        else
        {
            die('Veuillez sélectionner un commentaire à signaler');
        }
    }

    public function preview()
    {
        if (!empty($_GET['id']) && isset($_SESSION["username"]))
        {
            $pageTitle = "Aperçu du commentaire";
            $id = $_GET['id'];
            $comment = $this->model->find($id);
            $article_id = $comment['article_id'];
            $article = $this->articleModel->find($article_id);

            \Renderer::render('frontend','preview', compact('pageTitle','comment','article'));
        } 
        else
        {
            die('Aucun commentaire trouvé, veillez à renseigner un id');
        }
    }

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
            $author = htmlspecialchars($_POST['author']);
        }

        // Puis le contenu
        $content = null;
        if (!empty($_POST['content'])) 
        {
            $content = htmlspecialchars($_POST['content']);
        }

        // Ensuite l'email
        $email = null;
        if (!empty($_POST['email'])) 
        {
            $email = htmlspecialchars($_POST['email']);
        }

        // Enfin l'id de l'article
        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) 
        {
            $article_id = $_POST['article_id'];
        }

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas d'email OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$author || !$email || !$article_id || !$content) 
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
            die("L'article $article_id n'existe pas !");
        }

        // Insertion du commentaire
        $this->model->insert($author, $email, $content, $article_id);

        // Redirection vers l'article en question :
        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
}

?>