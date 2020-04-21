<?php


namespace General;


/**
 * Class Route
 * @package General
 */
class Route
{
    /**
     * @var
     */
    protected $action;
    /**
     * @var array
     */
    protected $error = [];
    /**
     * @var
     */
    protected $module;
    /**
     * @var
     */
    protected $url;
    /**
     * @var array
     */
    protected $vars = [];


    /**
     * Route constructor.
     * @param string $action
     * @param string $module
     * @param string $url
     * @param array|null $vars
     */
    public function __construct(string $action, string $module, string $url, ? array $vars = null)
    {
        $this->setAction($action);
        $this->setModule($module);
        $this->setUrl($url);
        $this->setVars($vars);

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
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return empty($this->error);
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        is_string($action) ? $this->action = $action : $this->error['action'] = "l'action doit obligatoirement être une chaine de caractère";
    }

    /**
     * @param mixed $module
     */
    public function setModule($module): void
    {
        is_string($module) ? $this->module = $module : $this->error['module'] = "le module doit obligatoirement être une chaine de caractère";
        $this->module = $module;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        is_string($url) ? $this->url = $url : $this->error['url'] = "l'url doit obligatoirement être une chaine de caractère";
    }

    /**
     * @param array $vars
     */
    public function setVars(? array $vars = null): void
    {
        if($vars !== null){
            foreach($vars as $key => $value){
                $vars[$key] = $value;
            }
        }
    }

}