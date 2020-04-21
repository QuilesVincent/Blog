<?php

namespace General;


class Renderer
{

    public static function render(string $name, string $module, string $view, ? array $var = null)
    {
        if(isset($var)){
            extract($var);
        }
        ob_start();
        if (file_exists("App/$name/Modules/$module/Views/$view.php")) {
            require("App/$name/Modules/$module/Views/$view.php");
        } else {
            throw new \Exception();
        }
        $pageContent = ob_get_clean();
        require("App/templates/layout.php");
    }
}