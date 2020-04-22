<?php


namespace General;


class Page extends ApplicationComponent
{
    protected $contentFile;
    protected $varRender = [];

    public function getContentFile()
    {
        return $this->contentFile;
    }

    public function getVarRender(): array
    {
        return $this->varRender;
    }

    public function render(string $name, string $module, string $view,array $var)
    {
        extract($var);
        ob_start();
        if (file_exists("App/$name/Modules/$module/Views/$view.php")) {
            require("App/$name/Modules/$module/Views/$view.php");
        } else {
            throw new \Exception();
        }
        $pageContent = ob_get_clean();
        require("App/Templates/layout.php");
    }

    public function setContentFile(string $name, string $module, string $view)
    {
        $this->contentFile = $this->render($name, $module, $view, $this->varRender);
    }

    public function setVarRender($key, $value)
    {
        $this->varRender[$key] = $value;
    }
}