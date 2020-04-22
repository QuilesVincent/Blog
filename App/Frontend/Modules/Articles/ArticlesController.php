<?php


namespace App\Frontend\Modules\Articles;


use General\HttpRequest;
use General\MainController;
use General\Models\ArticleManager;
use General\Models\ClassFactory;
use General\Renderer;

class ArticlesController extends MainController
{

    public function executeIndex()
    {
        //$article = ClassFactory::getArticleManager()->find('1', 'article_id');
        $articles = ClassFactory::getArticleManager()->findAll();
        return $articles;
        //$articles = ClassFactory::getArticleManager()->findAllObj();
        //$this->page->setVarRender('articles', $articles);
        //Renderer::render($this->getApp()->getName(), 'Articles', 'index', compact('article'));
        //return $article;
        /*
        var_dump($articles); //Ici, rien n'est affiché //
        //Renderer::render($this->getApp()->getName(), $this->getModule(), $this->getView(), compact($articles, $pageTitle));
        $this->page->setVarRender('articles', $articles);
        $this->page->setVarRender('pageTitle', 'index');*/

    }

    public function executeShowArticle()
    {
        $request = $this->app->getHttpRequest();
        $article = ClassFactory::getArticleManager()->find($this->getApp()->getFormatterUrl()->getVarsUrlKey('id'), 'article_id');
        return $article;
    }

}