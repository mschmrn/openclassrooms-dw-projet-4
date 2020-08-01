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
        $this->userModel = new \Model\User();
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
                        $_SESSION["username"] = $username;

                        $this->admin = true;
                        $this->index();
                    }
                    else if ($user['type'] == 'user')
                    {
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

    public function index()
    {
        if ($this->admin)
        {
            $user = $this->model->find_user($_SESSION['username']);
            $_SESSION['name'] = $user['name'] ;
            $_SESSION['surname'] = $user['surname'];

            $pageTitle = "Bienvenue";
            $articles = $this->articleModel->findAll("chapters DESC LIMIT 5");
            $comments = $this->commentModel->findAll("created_at DESC LIMIT 3");
            $_SESSION['last_view'] = null;

            \Renderer::render('backend','index', compact('pageTitle','articles','comments','user'));
        }
        else
        {
          $this->login();
        }
    }

    public function index_options()
    {
        if($this->admin)
        {
            switch($_POST['index'])
            {
                case 'back':
                    \Http::redirect('index.php');
                break;

                case 'user':
                    $this->add();
                break;
                
                case 'logout':
                    $this->logout();
                break;
            }
        }
    }

    public function editArticle()
    {
        if ($this->admin) // Admin protection
        {
            if (empty($_GET['id'])) // No ID
            {            
                $new = $this->articleModel->newChapter();
                $pageTitle = "Ajouter un article";
                // Recherche d'un id dans l'url
                \Renderer::render('backend','articles/edit', compact('pageTitle','new'));
            }
            else // ID
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
        if ($this->admin)
        {
            $pageTitle = "Liste des articles";
            $articles = $this->articleModel->getAll("chapters DESC");

            \Renderer::render('backend','articles/index', compact('pageTitle', 'articles'));
            $_SESSION['last_view'] = 'articles';
        }
    }

    public function viewDrafts()
    {
        if ($this->admin)
        {
            $pageTitle = "Liste des brouillons";
            $drafts = $this->articleModel->getAll('drafts');

            \Renderer::render('backend','articles/drafts', compact('pageTitle', 'drafts'));
            $_SESSION['last_view'] = 'drafts';
        }
    }

    public function viewComments()
    {       
        if ($this->admin)
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

            \Renderer::render('backend','comments', compact('pageTitle', 'comments', 'reported', 'pending', 'param'));
        }
    }
 
    public function viewUsers()
    {  
        if ($this->admin)
        {
            if(isset($_POST['user_type']))
            {
                $type = $_POST['user_type'];
            }
            else
            {
                $type = "admin";
            }

            $pageTitle = "Liste des utilisateurs";
            $users = $this->userModel->getAll();
            $admin = $this->userModel->getAll('admin');

            \Renderer::render('backend','users', compact('pageTitle', 'users', 'admin', 'type'));
        }
    }

    public function viewTrash()
    {      
        if ($this->admin)
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

    public function logout()
    {
        $this->session->destroy();
        \Http::redirect('index.php');
    }
}

?>