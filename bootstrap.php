<?php
use Dotenv\Dotenv;

define('BASE_URL_PATH', '/');
session_start();

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$database = new \Illuminate\Database\Capsule\Manager();
$database->addConnection([
	'driver' => 'mysql',
	'host' => $_ENV['DB_HOST'],
	'database' => $_ENV['DB_NAME'],
	'username' => $_ENV['DB_USER'],
	'password' => $_ENV['DB_PASS']
]);

$database->setAsGlobal();
$database->bootEloquent();
