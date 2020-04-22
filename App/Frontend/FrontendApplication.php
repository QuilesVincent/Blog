<?php


namespace App\Frontend;


use General\Application;
use General\Renderer;

class FrontendApplication extends Application
{
    public function __construct()
    {
        $this->name = "Frontend";
    }

    public function run()
    {
        //$this->getController();
        $controller = $this->getController();

        $result = $controller->execute();
        $pageTitle = "{$this->formatterUrl->getModuleUrl()}-{$this->formatterUrl->getActionUrl()}";
        if($this->getFormatterUrl()->getVarsUrlKey('id') ==! null){
            $pageTitle .= " numéro {$this->formatterUrl->getVarsUrlKey('id')}";
        };

        Renderer::render($this->getName(), $controller->getModule(), $controller->getAction(), compact('result', "pageTitle"));
        //$controller->getPage()->render($this->getName(),$controller->getModule(), $controller->getAction(), compact('result'));
        /*
        $this->getController();
        //var_dump($controller); //Affiche bien le controller//
        //$controller->execute();
        //$controller->renderPage();*/
    }
}