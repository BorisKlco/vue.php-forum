<?php

use App\Core\Database;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = new Database();
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$res = [
    'categories' => [
        [
            'name' => 'Categorie 1',
            'forums' => [
                ['name' => 'Forum 1', 'description' => 'Description 1'],
                ['name' => 'Forum 2', 'description' => 'Description 2'],
                ['name' => 'Forum 3', 'description' => 'Description 3'],
            ]
        ],
        [
            'name' => 'Categorie 2',
            'forums' => [
                ['name' => 'Forum 1', 'description' => 'Description 1'],
                ['name' => 'Forum 2', 'description' => 'Description 2'],
                ['name' => 'Forum 3', 'description' => 'Description 3'],
            ]
        ],
        [
            'name' => 'Categorie 3',
            'forums' => [
                ['name' => 'Forum 1', 'description' => 'Description 1'],
                ['name' => 'Forum 2', 'description' => 'Description 2'],
                ['name' => 'Forum 3', 'description' => 'Description 3'],
            ]
        ]
    ]
];


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-type: application/json');
echo json_encode($res);
