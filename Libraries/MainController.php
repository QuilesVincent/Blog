<?php


namespace General;


class MainController extends ApplicationComponent
{
    protected $action;
    protected $page;
    protected $module;
    protected $view;


    public function __construct(Application $app, $module, $action, Page $page)
    {
        parent::__construct($app);

        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);
        $this->page = $page;

    }

    public function execute()
    {
        $method = "execute" . ucfirst($this->action);

        if (!is_callable([$this, $method])) {
            throw new \RuntimeException("L'action {$method} n'est pas définie sur ce module");
        }

        $this->$method();

    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return Page
     */
    public function getPage(): Page
    {
        return $this->page;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @param mixed $module
     */
    public function setModule($module): void
    {
        $this->module = $module;
    }

    public function renderPage()
    {
        $this->page->setContentFile($this->app->getName(), $this->module, $this->view);
        $this->app->getHttpResponse()->setPage($this->page);
        $this->app->getHttpResponse()->send();
        //$this->page->render($this->app->getName(), $this->module, $this->view, $var);
    }

    /**
     * @param mixed $view
     */
    public function setView($view): void
    {
        $this->view = $view;
    }

}