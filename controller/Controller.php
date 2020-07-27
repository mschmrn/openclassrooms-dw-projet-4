<?php

namespace Controller;

abstract class Controller
{
    protected $model;
    protected $modelName;

    protected $item;

    public function __construct()
    {

        $this->model = new $this->modelName(); // new \Model\Article()
        $this->session = \Session::getInstance();    
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
            $this->model->restore($id);
        }
        else
        {
            die('déjà restoré');
        }
        
        /*if($article['draft'] == '1')
        {
            $param = 'drafts';
        }*/
        
        \Http::redirect("index.php?controller=admin&task=viewTrash"); 
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
         * 3. Vérification de l'existence du commentaire
         */

        $item = $this->model->find($id);
        if (!$item)
        {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        /**
         * 4. Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */

        //$article_id = $comment['article_id'];

        /**
         * 5. Redirection vers l'article en question
         */
        //\Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
        
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