<?php

namespace General;


abstract class Application
{
    protected $formatterUrl;
    protected $httpRequest;
    protected $httpResponse;
    protected $name;

    abstract public function run();

    public function getController()
    {

        $this->formatterUrl->formatUrl($this->getHttpRequest()->requestURI());

        $route = new Route(
            $this->getFormatterUrl()->getActionUrl(),
            $this->getFormatterUrl()->getModuleUrl(),
            $this->getHttpRequest()->requestURI(),
            $this->getFormatterUrl()->getVarsUrl()
        );


        $page = new Page($this);


        $controllerClass = "App\\{$this->name}\\Modules\\{$route->getModule()}\\{$route->getModule()}Controller";
        return new $controllerClass($this,$route->getModule(), $route->getAction(), $page);
        /*
        $c = new $controllerClass($this,$route->getModule(), $route->getAction(), $page);
        $cep = ucfirst($route->getAction());
        $method = "execute$cep";
        //var_dump($method);
        //var_dump($c);
        $result = $c->$method();
        //var_dump($result);
        Renderer::render($this->getName(), $route->getModule(), $route->getAction(), compact('result'));
        //$page->render($this->getName(),$route->getModule(), $route->getAction(), $result);*/

    }

    public function getFormatterUrl()
    {
        return $this->formatterUrl;
    }

    public function getHttpRequest()
    {
        return $this->httpRequest;
    }

    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param FormatterUrl $formatterUrl
     */
    public function setFormatterUrl(FormatterUrl $formatterUrl): void
    {
        $this->formatterUrl = $formatterUrl;
    }

    /**
     * @param HttpRequest $httpRequest
     */
    public function setHttpRequest(HttpRequest $httpRequest): void
    {
        $this->httpRequest = $httpRequest;
    }

    /**
     * @param HttpResponse $httpResponse
     */
    public function setHttpResponse(HttpResponse $httpResponse): void
    {
        $this->httpResponse = $httpResponse;
    }

}