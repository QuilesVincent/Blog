<?php


namespace App\Frontend;


use General\ApplicationComponent;
use General\FormatterUrl;

class FormatterUrlFrontend extends ApplicationComponent implements FormatterUrl
{
    protected $actionUrl;
    protected $moduleUrl;
    protected $varsUrl;

    public function formatURL(string $url): void
    {
        if (preg_match("/code\/testBlogPersoInjectionInterfaceRouterETC\/Public\/index.php\/(\w*)-?(\D*)(\d*)/", $url, $match)) {
            $this->moduleUrl = $match[1];
            $this->actionUrl = $match[2];
            isset($match[3]) ? $this->varsUrl = $match[3] : null;
        } else {
            $this->moduleUrl = "Articles";
            $this->actionUrl = "index";
        }
    }

    public function getModuleUrl()
    {
        return $this->moduleUrl;
    }

    public function getActionUrl()
    {
        return $this->actionUrl;
    }

    public function getVarsUrl()
    {
        return isset($this->varsUrl) ? $this->varsUrl : null;
    }


}