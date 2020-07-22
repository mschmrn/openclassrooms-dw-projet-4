<?php

namespace Controller;

class Admin extends Controller
{
    protected $modelName = \Model\Admin::class;

    public function __construct()
    {
        parent::__construct();
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
            $articles = $this->articleModel->findAll("chapters DESC");
            \Renderer::render('backend','articles/index', compact('pageTitle', 'articles'));
        }
    }

    public function viewDrafts()
    {
        if (isset($_SESSION["username"]))
        {
            $pageTitle = "Liste des brouillons";
            $drafts = $this->articleModel->getDrafts(1);

            //$drafts = $this->articleModel->findAll("draft");

            \Renderer::render('backend','articles/drafts', compact('pageTitle', 'drafts'));
        }
    }

    public function viewTrash()
    {
        if (isset($_SESSION["username"]))
        {
            $pageTitle = "Corbeille";
            $articles = $this->articleModel->getTrash(1);

            //$drafts = $this->articleModel->findAll("draft");

            \Renderer::render('backend','trash', compact('pageTitle', 'articles'));
        }
    }

    public function index()
    {
        if (isset($_SESSION["username"]))
        {
            $pageTitle = "Bienvenue";

            $articles = $this->articleModel->findAll("chapters DESC LIMIT 4");
            $comments = $this->commentModel->findAll("created_at DESC LIMIT 3");

            \Renderer::render('backend','index', compact('pageTitle','articles','comments'));
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
            \Renderer::render('backend','login', compact('pageTitle'));
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