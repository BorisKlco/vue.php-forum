<?php

use App\Api\Board;
use App\Core\Database;
use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = new Database();
$router = new Router();
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->register('GET', '/', [Board::class, 'index']);

$router->resolve($method, $uri);
