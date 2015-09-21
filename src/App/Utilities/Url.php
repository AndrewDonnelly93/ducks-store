<?php
namespace App\Utilities;

class Url
{
    private $page = 'main';

    public function __construct(){
        $request_uri = $_SERVER['REQUEST_URI'];
        $script_name = $_SERVER['SCRIPT_NAME'];
        $page = str_replace($script_name, '', $request_uri);
        if (strpos($page, '?')) {
            $page = substr_replace($page, '', strpos($page, '?'));
        }
        $page = trim($page, '/');
        if ($page) {
            $this->page = $page;
        }
    }

    public function getPage()
    {
        return $this->page;
    }
}