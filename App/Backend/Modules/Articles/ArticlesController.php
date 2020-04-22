<?php


namespace App\Backend\Modules\Articles;


use General\Models\ClassFactory;
use General\MainController;

class ArticlesController extends MainController
{

    public function executeConnexionAdmin()
    {

    }

    public function executeGestionArticles()
    {
        $request = $this->getApp()->getHttpRequest();
        if($request->postExist('email_connexion_admin')) {
            $user = ClassFactory::getUserManager()->getUser($request->postData('email_connexion_admin'), $request->postData('password_connexion_admin'));
            if(isset($user)) {
                if($user->isAdmin()) {
                    $_SESSION['id_user'] = $user->getIdUser();
                    $_SESSION['userName'] = $user->getUserName();
                    $articles = ClassFactory::getArticleManager()->findAll();
                } else {
                    echo 'error , vous n etes pas admin';
                }
            } else {
                echo "error, vous n'avez rentré les bons identifiants";
            }
        } else {
            $articles = ClassFactory::getArticleManager()->findAll();
        }

        return $articles;

    }

    public function executeDecoAdmin()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        $this->getApp()->getHttpResponse()->redirect('http://localhost/code/blog/Public/index.php');
    }


}