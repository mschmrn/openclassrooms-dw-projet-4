<?php

namespace Controller;

class Admin extends Controller
{
    protected $modelName = \Model\Admin::class;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new \Model\User();
        $this->articleModel = new \Model\Article();
        $this->commentModel = new \Model\Comment();
    }

    public function edit()
    {
        if (isset($_SESSION["username"])) // Admin only
        {
            if (empty($_GET['id'])) // Il n'y a pas d'id enregistré dans la session ni dans l'url
            {
                $pageTitle = "Ajouter un article";
                // Recherche d'un id dans l'url
                \Renderer::render('backend','articles/edit', compact('pageTitle'));
            }
            else // Il y a un id dans l'url
            {
                $pageTitle = "Editer un article";
                $id = $_GET['id'];
                $draft = $this->articleModel->find($id);
                \Renderer::render('backend','articles/edit', compact('pageTitle','draft'));
            }
        }
        else 
        {
            $this->index();
        }
    }

    public function viewArticles()
    {
        if (isset($_SESSION["username"]))
        {
            $pageTitle = "Liste des articles";
            $articles = $this->articleModel->getAll("chapters DESC");

            \Renderer::render('backend','articles/index', compact('pageTitle', 'articles'));
            $_SESSION['last_view'] = 'articles';
        }
    }

    public function viewDrafts()
    {
        if (isset($_SESSION["username"]))
        {
            $pageTitle = "Liste des brouillons";
            $drafts = $this->articleModel->getAll('drafts');

            \Renderer::render('backend','articles/drafts', compact('pageTitle', 'drafts'));
            $_SESSION['last_view'] = 'drafts';
        }
    }

    public function viewTrash()
    {           
        if(isset($_POST['trash']))
        {
            $param = $_POST['trash'];
        }
        else if(isset($_SESSION['last_view']))
        {
            $param = $_SESSION['last_view'];
        }
        else
        {
            $param = "articles";
        }

        $pageTitle = "Corbeille";

        $articles = $this->articleModel->getAll("articles_trash");
        $drafts = $this->articleModel->getAll("drafts_trash");

        $comments = $this->commentModel->getAll();
        $comments_in_trash = $this->commentModel->get('trash');

        \Renderer::render('backend','trash', compact('pageTitle', 'articles','drafts', 'comments', 'param','comments_in_trash'));
    }

    public function viewComments()
    {            
        if(isset($_POST['comment']))
        {
            $param = $_POST['comment'];
        }
        else
        {
            $param = "comments";
        }

        $pageTitle = "Commentaires";
        $_SESSION['last_view'] = 'comments';

        $comments = $this->commentModel->getAll();
        $reported = $this->commentModel->get('reported');
        $pending = $this->commentModel->get('pending');

        \Renderer::render('backend','comments', compact('pageTitle', 'comments','reported','pending','param'));
    }

    public function index()
    {
        if (isset($_SESSION["username"]))
        {
            $pageTitle = "Bienvenue";
            $_SESSION['last_view'] = null;

            $user = $this->model->find_user($_SESSION['username']);
            $_SESSION['name'] = $user['name'] ;
            $_SESSION['surname'] = $user['surname'];

            $articles = $this->articleModel->findAll("chapters DESC LIMIT 5");
            $comments = $this->commentModel->findAll("created_at DESC LIMIT 3");

            \Renderer::render('backend','index', compact('pageTitle','articles','comments','user'));
        }
        else
        {
            $this->login();
        }
    }

    public function add()
    {
        if (isset($_SESSION["username"]))
        {
            if (isset($_POST['username'], $_POST['email'], $_POST['type'], $_POST['password']))
            {
                // Récupérer le nom d'utilisateur, l'email, le mot de passe crypté et le type (user || admin)
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $type = $_POST['type'];
                
                // Ajout de l'utilisateur à la BDD
                $this->model->insert($username, $email, $type, $password);
                
                $pageTitle = "Création d'un nouvel utilisateur";
                \Renderer::render('backend','admin/success', compact('pageTitle'));
            }
            else
            {
                $pageTitle = "Nouvel utilisateur";
                \Renderer::render('backend','add_user', compact('pageTitle'));
            }
        }
        else
        {
            $this->index();
        }
    }

    public function login()
    {
        if (!isset($_SESSION["username"]))
        {
            $pageTitle = "Se connecter";
            $admin = false;
            \Renderer::render('backend','login', compact('pageTitle', 'admin'));
        }
        else
        {
            $this->index();
        }
    }

    public function verify()
    {
        if (!isset($_SESSION["username"]))
        {
            // Vérifier le username entré
            $username = htmlspecialchars($_POST['username']);
            // Chercher l'utilisateur dans la BDD
            $user = $this->model->find_user($username);

            if ($user)
            {
                if (password_verify($_POST['password'], $user['password']))
                {
                    if ($user['type'] == 'admin') 
                    {
                        //$this->session->startSession();
                        $_SESSION["username"] = $username;
                        $this->index();
                    }
                    else
                    {
                        die('Vous n\'êtes pas admin');
                        \Http::redirect('index.php');
                    }        
                }
                else
                {
                    die('Login ou mot de passe incorrect');
                }
            }
            else
            {
                die("Aucun utilisateur enregistré comme" . $_POST['username'] . "n'a été trouvé");
            }
        }
        else
        {
            $this->index();
        }     
    }

    public function logout()
    {
        $this->session->destroy();
        \Http::redirect('index.php');
    }
}

?>