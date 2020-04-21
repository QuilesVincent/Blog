<?php


namespace General;


class HttpResponse extends ApplicationComponent
{
    protected $page;

    public function addHeader($header)
    {
        header($header);
    }

    public function redirect($url)
    {
        header("Location:$url");
        exit;
    }

    public function redirect404()
    {
        http_response_code(404);
    }

    public function setStatusCode($code)
    {
        return http_response_code($code);
    }


    public function send()
    {
        $this->page->getContentFile();
    }

    public function setPage(Page $page)
    {
        $this->page = $page;
    }

}