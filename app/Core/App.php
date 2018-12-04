<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/12/4
 * Time: 14:42
 */

namespace App\Core;

class App
{
    public $url;

    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {

        $url = $this->parseUrl();
        if (file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {

            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $classname= "App\Controllers\\" . $this->controller;
        $this->controller = new $classname;

        if( isset($url[1]) ) {

            if (method_exists( $this->controller, $url[1] )) {

                $this->method = $url[1];
                unset($url[1]);
            }

        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {

        $request_url = isset($_SERVER['REQUEST_URI'])? $_SERVER['REQUEST_URI'] : '/';
        if ( '/' !== $request_url ){

            $url = rtrim( $request_url, '/' );
            $url = ltrim( $request_url, '/' );

            $url = filter_var( $url, FILTER_SANITIZE_URL );

            $url = explode('/', $url);

            return $url;

        }

    }

}
