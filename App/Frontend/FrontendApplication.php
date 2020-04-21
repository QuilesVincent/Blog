<?php


namespace App\Frontend;


use General\Application;

class FrontendApplication extends Application
{
    public function __construct()
    {
        $this->name = "Frontend";
    }

    public function run()
    {
        $controller = $this->getController();
        $controller->execute();
        $controller->renderPage();
        // TODO: Implement run() method.
    }
}