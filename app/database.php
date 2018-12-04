<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/12/5
 * Time: 0:27
 */

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => getenv('DB_CONNECTION'),
    'host'      => env('DB_HOST'),
    'username'  => env('DB_USERNAME'),
    'password'  => env('DB_PASSWORD'),
    'database'  => env('DB_DATABASE'),
    'charset'   => env('DB_CHARSET'),
]);


$capsule->bootEloquent();
