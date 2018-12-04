<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/12/4
 * Time: 14:32
 */
require_once '../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));

$dotenv->load();

require_once 'database.php';
require_once 'Core/App.php';
require_once 'Core/Controller.php';
