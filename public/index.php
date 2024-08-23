<?php


use database\DBConnection;

define('APP_ROOT', dirname(__DIR__));
require_once dirname(__DIR__) . '/config/DBConfig.php';
require_once dirname(__DIR__) . '/database/connect.php';

$pdo  = DBConnection::getInstance();
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/App/Core/Router.php';
require_once dirname(__DIR__) . '/App/Core/Router.php';
require_once dirname(__DIR__) . '/Routes/dashboard.php';





