<?php


namespace App\Backend;


use General\Application;
use General\FormatterUrl;
use General\HttpRequest;
use General\HttpResponse;

class BackendApplication extends Application
{
    public function __construct()
    {
        parent::__construct();
        $this->name = "Frontend";
    }

    public function run()
    {
        // TODO: Implement run() method.
    }

}