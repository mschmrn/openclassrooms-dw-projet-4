<?php

namespace Controller;

abstract class Controller
{
    /**
     * @property model Creates a new model 
     * @property modelName Name of the model
     * @property item Item condition for restore @method
     
     * @method restore Restores an item from SQL Database
     * @method delete Delete an item from SQL Database
     */

    protected $model;
    protected $modelName;
    protected $item;

    public function __construct()
    {
        $this->model = new $this->modelName(); // new \Model\Article()
        $this->session = \Session::getInstance();    
        $this->admin = \Admin::checkAdmin(); //
    }

    public function restore() // Delete an article
    {   
        /**
         * On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) 
        {
            die("Vous n'avez pas précisé l'id de l'article !");
        }
        $id = $_GET['id'];
        
        /**
         * Vérification que l'article existe bel et bien
         */
        $item = $this->model->find($id);
        if (!$item) 
        {
            die("L'article ou le commentaire $id n'existe pas, vous ne pouvez donc pas le restaurer !");
        }

        /**
         * Si article dans corbeille on restore
         */
        if($item['trash'] != 0)
        {
            if($item == ('draft' || 'comment'))
            {
                $this->model->restore($id, false);
            }
            else 
            {
                $this->model->restore($id, true);
            }
        }
        else
        {
            die('déjà restoré');
        }
        
        \Http::redirect("index.php?controller=admin&task=viewTrash"); 
    }

    public function delete() // Delete a comment
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) 
        {
            die("Veillez à préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        $item = $this->model->find($id);
        if (!$item)
        {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        if($item['trash'] != 0)
        {
            $this->model->delete($id);
            \Http::redirect("index.php?controller=admin&task=index");
        }
        else
        {
            $this->model->trash($id);
            \Http::redirect("index.php?controller=admin&task=viewTrash");
        }
    }
}
?>