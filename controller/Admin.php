<?php

namespace Controller;

class Admin extends Controller
{
    protected $modelName = \Model\Admin::class;
    protected $session;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($_SESSION["username"]))
        {
            \Renderer::render('backend','admin/home');
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
            
                \Renderer::render('backend','admin/success');
            }
            else
            {
                \Renderer::render('backend','add_user');
            }
        }
        else
        {
            $this->index();
        }
    }

    public function login()
    {
        if (isset($_SESSION["username"]))
        {
            $this->index();
        }
        else
        {
            \Renderer::render('backend','login');
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
                        $_SESSION['username'] = $username;
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