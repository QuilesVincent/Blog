<?php


namespace General;


class HttpRequest extends ApplicationComponent
{

    public function cookieData($key)
    {
        return $_COOKIE[$key];
    }

    public function cookieExist($key)
    {
        return isset($_COOKIE[$key]);
    }

    public function getData($key)
    {
        return $_GET[$key];
    }

    public function getExist($key)
    {
        return isset($_GET[$key]);
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function requestURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function postData($key)
    {
        return $_POST[$key];
    }

    public function postExist($key)
    {
        return isset($_POST[$key]);
    }


}