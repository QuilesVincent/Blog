<?php


namespace App\Frontend\Modules\Programme;



use General\HttpRequest;
use General\MainController;
use General\Models\ClassFactory;

class ProgrammeController extends MainController
{
    public function executeIndex()
    {
    }

    public function executeConnexionProgramme()
    {
    }

    public function executeUserconnexionCheck()
    {
        $request = $this->getApp()->getHttpRequest();
        if(isset($_SESSION['id'])) {
            $user = ClassFactory::getUserManager()->find('id_user', $_SESSION['id']);
        } else {
            $user = ClassFactory::getUserManager()->getUser($request->postData("email_connexion"), $request->postData("password_connexion"));
            session_start();
        }
        if($user && $user->isValid()){
            $_SESSION['id'] = $user->getIdUser();
            $_SESSION['userName'] = $user->getUserName();
            $this->executeFirstPage();
        } else {
            $this->getApp()->getHttpResponse()->redirect('http://localhost/code/blog/Public/index.php?module=Programme&action=ConnexionProgramme&err=y');
        }

    }

    public function executeFirstPage()
    {

    }

    public function executeUserDeco()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        $this->getApp()->getHttpResponse()->redirect('http://localhost/code/blog/Public/index.php');

    }



}