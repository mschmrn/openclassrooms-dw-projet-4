<?php

namespace Controller;

class Admin extends Controller
{
    protected $modelName = \Model\Admin::class;
    protected $session;

    public function __construct()
    {
        $this->session = \Session::getInstance();
    }

    public function index()
    {
        \Renderer::render('backend','admin/home');
    }

    public function add()
    {
        if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password']))
        {
            // Récupérer le nom d'utilisateur, l'email, le mot de passe crypté et le type (user || admin)
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];

            $result = $_REQUEST['password'];
            $password = password_hash($result, PASSWORD_DEFAULT);

            $type = $_REQUEST['type'];
            
            // Ajout de l'utilisateur à la BDD
            $this->model->insert($username, $email, $type, $password);
        
            \Renderer::render('backend','admin/success');
        }
        else
        {
            \Renderer::render('backend','add_user');
        }
    }

    public function login()
    {
      
        /**
         * Display login page
         */
        \Renderer::render('backend','login');

        /**
         * Session begins
         */
        $this->session->startSession();

        /**
         * Vérifier données saisies
         */
        if (isset($_POST['username']))
        {
            $username = $_REQUEST['username'];

            // Attention à ce paramètre vérifié dans l'espace administration
            $_SESSION['username'] = $username;
            
            $password = $_REQUEST['password'];
            //$hash = '$2y$10$FlqjHjHXXrvlsE1sP3D9puYIRlRVzmOaLKkLR2Nl2H71LYNNx8pYK';
            //$password = password_verify($request, $hash);

            //if ($password)
            //{
                echo 'Le mot de passe est bon';
                $user = $this->model->find_user($username, $password);

                if ($user['type'] == 'admin') 
                {
                    \Renderer::render('backend','admin/home');
                }
                else
                {
                    \Http::redirect('index.php');		  
                }
            /*} 
            else 
            {
                echo 'Le mot de passe est incorrect';
            }*/
        }

        /*
        if (mysqli_num_rows($query) == 1) 
        {
            $user = mysqli_fetch_assoc($query);

            // vérifier si l'utilisateur est un administrateur ou un utilisateur
           
        }
        else
        {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }*/
    }

    public function logout()
    {
        $this->session->destroy();
        \Http::redirect('index.php');
    }
}