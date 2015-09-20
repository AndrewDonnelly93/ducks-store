<?php
namespace App\Utilities;

class Url
{
    private $page = 'main';

    public function __construct(){
        $request_uri = $_SERVER['REQUEST_URI'];
        echo $request_uri."<br>";
        $script_name = $_SERVER['SCRIPT_NAME'];
        echo $script_name."<br>";
        $page = str_replace($script_name, '', $request_uri);
        if (strpos($page, '?')) {
            $page = substr_replace($page, '', strpos($page, '?'));
        }
        echo $page." 1<br>";
        $page = trim($page, '/');
        echo $page." 2<br>";
        if ($page) {
            $this->page = $page;
        }
    }

    public function getPage()
    {
        return $this->page;
    }
}