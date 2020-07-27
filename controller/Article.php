<?php

namespace Controller;

class Article extends Controller
{
    protected $modelName = \Model\Article::class;
    protected $item = 'article';

    public function __construct()
    {
        parent::__construct();
        $this->adminController = new \Controller\Admin();
    }

    public function home()
    {
        $pageTitle = "Accueil";
        \Renderer::render('frontend','index', compact('pageTitle'));
    }

    public function index()
    {
        /**
         * Récupération des articles
         */
        $articles = $this->model->findAll("chapters DESC");
        
        /**
         * Affichage de la page d'accueil
         */
        $pageTitle = "Articles";
        \Renderer::render('frontend','articles/index', compact('pageTitle', 'articles'));
    }

    public function preview()
    {
        if (!empty($_GET['id']) && isset($_SESSION["username"]))
        {
            $pageTitle = "Aperçu de l'article";
            $id = $_GET['id'];

            $article = $this->model->find($id);    
    
            \Renderer::render('frontend','preview', compact('pageTitle','article'));
        }
    }

    public function show() // Show an article
    {
        $commentModel = new \Model\Comment();
        /**
         * Récupération du param "id" et vérification de celui-ci
         */

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
        
        //Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        if (!$title || !$introduction || !$content) 
        {
          die("Veillez à bien renseigner tous les champs requis.");
        }

        switch($_POST['answer']) 
        {
            case 'draft':
                if(empty($_GET['id'])) // Pas d'id dans l'url -> Premier brouillon -> insertion dans la BDD
                {
                    // Insertion
                    $this->model->insert($title, $introduction, $content, 1, 0); 

                    // Trouver l'article publié par son titre
                    $draft = $this->model->getArticleBy($title);

                    // ID de l'article publié
                    $id = $draft['id'];
                }
                else // Mise à jour du brouillon
                {
                    // Récupération de l'id du brouillon
                    $id = $_GET['id'];

                    // Mise à jour de la BDD
                    $this->model->update($id, $title, $introduction, $content, 1, 0);
                }
                // Redirection pour edition de l'article
                \Http::redirect("index.php?controller=admin&task=edit&id=" . $id);
                
                break;

            case 'publish':
                if(empty($_GET['id'])) // Si pas d'id dans l'url
                {
                    $this->model->insert($title, $introduction, $content, 0, 1);
                }
                else // ID dans l'url -> update
                {
                    $id = $_GET['id'];

                    $this->model->update($id, $title, $introduction, $content, 0, 1);  
                }  
                // Identification de l'article pour redirection
                $article = $this->model->getArticleBy($title);
                // Redirection
                \Http::redirect("index.php?controller=article&task=show&id=" . $article['id']);

                break;

            case 'preview':
                echo 'preview';
                $this->preview();
                break;
        }
    }
}

?>