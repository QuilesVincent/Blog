<?php


namespace App\Backend;



use General\ApplicationComponent;
use General\FormatterUrl;

class formatterUrlBackend extends ApplicationComponent implements FormatterUrl
{
    protected $actionUrl;
    protected $moduleUrl;
    protected $varsUrl = [];

    public function formatURL(string $url): void
    {
        if (preg_match("/code\/blog\/Public\/index.php\/admin\/(\w*)-?(\D*)(\d*)/", $url, $match)) {
            $this->moduleUrl = ucfirst($match[1]);
            $this->actionUrl = ucfirst($match[2]);
            isset($match[3]) ? $this->varsUrl['id'] = $match[3] : [];
        } else {
            echo 'error';
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

    public function getVarsUrlKey($key)
    {
        return isset($this->varsUrl[$key]) ? $this->varsUrl[$key] : null;
    }


}