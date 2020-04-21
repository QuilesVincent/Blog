<?php


namespace App\Frontend\Modules\Articles;


use General\HttpRequest;
use General\MainController;
use General\Models\ClassFactory;
use General\Renderer;

class ArticlesController extends MainController
{

    public function executeIndex()
    {
        $articles = ClassFactory::getArticleManager()->findAllObj();
        var_dump($articles); //Ici, rien n'est affiché //
        //Renderer::render($this->getApp()->getName(), $this->getModule(), $this->getView(), compact($articles, $pageTitle));
        $this->page->setVarRender('articles', $articles);
        $this->page->setVarRender('pageTitle', 'index');

    }

}