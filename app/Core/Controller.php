<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/12/4
 * Time: 14:45
 */

namespace App\Core;


class Controller
{

    public function __construct()
    {
    }


    public function model($model){

        require_once '../app/Models/' . $model. '.php';

        $model= 'App\Models\\' . $model;

        return new $model;
    }

    public function view($view, $data = []) {

        $view = str_replace('.', '/', $view);
        require_once '../app/Views/' . $view . '.php';
    }
}
