<?php

use General\HttpRequest;
use General\HttpResponse;

require 'C:/xampp/htdocs/code/blog/vendor/autoload.php';


const FRONTEND_APP = "Frontend";
const BACKEND_APP = "Backend";

$_GET['app'] = FRONTEND_APP;

if(preg_match('/admin/', $_SERVER['REQUEST_URI'])) {
    $_GET['app'] = BACKEND_APP;
}

$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
$formatterUrl = "App\\{$_GET['app']}\\FormatterUrl{$_GET['app']}";


$app = new $appClass();
$app->setHttpResponse(new HttpResponse($app));
$app->setHttpRequest(new HttpRequest($app));
$app->setFormatterUrl(new $formatterUrl($app));
$app->run();