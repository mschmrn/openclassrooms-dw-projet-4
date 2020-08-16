<?php

namespace Controller;

class Article extends Controller
{
    /**
     * @method home Displays home website
     * @method index Displays articles index
     * @method preview Previews an article in a new tab
     * @method show Display selected article
     * @method draft Save an article as draft
     * @method publish Publish an article
     * @method edit Edit article or draft
     */

    protected $modelName = \Model\Article::class;
    protected $item = 'article';

    public function __construct()
    {
        parent::__construct();
        $this->adminController = new \Controller\Admin();
        $this->preview = false;
    }

    public function home()
    {
        $pageTitle = "Accueil";
        \Renderer::render('frontend','index', compact('pageTitle'));
    }

    public function index()
    {
        $articles = $this->model->getAll("chapters DESC");
        $pageTitle = "Articles";
        \Renderer::render('frontend','articles/index', compact('pageTitle', 'articles'));
    }

    public function preview()
    {
        if (!empty($_GET['id']) && isset($_SESSION["username"]))
        {
            $id = $_GET['id'];
        }
        else if(empty($_GET['id']) && isset($_SESSION["username"]))
        {
            $id = $_SESSION['id'];
            $_SESSION['id'] = null;
        }
        $pageTitle = "Aperçu de l'article";
        $article = $this->model->find($id);

        \Renderer::render('frontend','preview', compact('pageTitle','article'));
    }

    public function show() // Show an article
    {
        $commentModel = new \Model\Comment();
      
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) 
        {
            $article_id = $_GET['id'];
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) 
        {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        /**
         * Récupération de l'article en question
         */
        $article = $this->model->find($article_id);

        /**
         * Récupération des commentaires de l'article en question
         * Pareil, toujours une requête préparée pour sécuriser la donnée filée par l'utilisateur (cet enfoiré en puissance !)
         */
        $comments = $commentModel->findAllByArticle($article_id);

        /**
         * On affiche l'article
         */
        $pageTitle = $article['title'];

        \Renderer::render('frontend','/articles/show', 
        [
            'pageTitle'     => $pageTitle, 
            'article'       => $article, 
            'comments'      => $comments, 
            'article_id'    => $article_id
        ]);
        // Possibilité ici d'utiliser la fonction compact en 2eme argument de la fonction render()
    } 

    public function draft($title, $introduction, $content, $chapter, $img_url)
    {
        if(empty($_GET['id'])) // Pas d'id dans l'url -> Premier brouillon -> insertion dans la BDD
        {
            // Insertion
            $this->model->insert($title, $introduction, $content, 1, 0, $chapter, $img_url); 

            // Trouver l'article publié par son titre
            $draft = $this->model->getArticleBy($title);

            // ID de l'article publié
            $id = $draft['id'];
            $_SESSION['id'] = $id;
        }
        else // Mise à jour du brouillon
        {
            // Récupération de l'id du brouillon
            $id = $_GET['id'];

            // Mise à jour de la BDD
            $this->model->update($id, $title, $introduction, $content, 1, 0, $img_url);
        }

        // Redirection pour edition de l'article
        if($this->preview === false)
        { 
            \Http::redirect("index.php?controller=admin&task=editArticle&id=" . $id);
        }
    }

    public function publish($title, $introduction, $content, $chapter, $img_url)
    {
        if(empty($_GET['id'])) // Si pas d'id dans l'url
        {
            $this->model->insert($title, $introduction, $content, 0, 1, $chapter, $img_url);
        }
        else // ID dans l'url -> update
        {
            $id = $_GET['id'];

            $this->model->update($id, $title, $introduction, $content, 0, 1, $chapter);  
        }  
        // Identification de l'article pour redirection
        $article = $this->model->getArticleBy($title);
        // Redirection
        \Http::redirect("index.php?controller=article&task=show&id=" . $article['id']);
    }

    public function edit()// Create an article
    {
        /**
         * On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */

        // On commence par le titre
        $title = null;
        if (!empty($_POST['title'])) 
        {
            $title = htmlspecialchars($_POST['title']);
        }

        // Puis l'intro
        $introduction = null;
        if (!empty($_POST['introduction'])) 
        {
            $introduction = htmlspecialchars($_POST['introduction']);
        }

        // Ensuite le contenu
        $content = null;
        if (!empty($_POST['content'])) 
        {
            $content = $_POST['content'];
        }

        // Ensuite le chapitre
        $chapter = null;
        if (!empty($_POST['chapter'])) 
        {
            $chapter = $_POST['chapter'];
        }

        // Et la photp
        $img_url = null;
        if (!empty($_POST['photo'])) 
        {
            $img_url = $_POST['photo'];
        }
    
        //Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        if (!$title || !$introduction || !$content || !$chapter || !$img_url) 
        {
          die("Veillez à bien renseigner tous les champs requis et à sélectionner une image d'illustration.");
        }

        switch($_POST['answer']) 
        {
            case 'draft':
                $this->draft($title, $introduction, $content, $chapter, $img_url);
            break;

            case 'publish':
                $this->publish($title, $introduction, $content, $chapter, $img_url);
            break;

            case 'preview':
                if(empty($_GET['id']))
                {
                    $this->preview = true;
                    $this->draft($title, $introduction, $content, $chapter, $img_url);
                }
                $this->preview();
            break;
        }
    }
}

?>