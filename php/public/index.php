<?php

use App\Core\Database;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = new Database();
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$q = "
    SELECT forum.name, forum.description, forum.link, category.name as category , category.id as id
    FROM forum 
    JOIN category ON forum.category_id = category.id 
    ORDER BY category.id, forum.id;
    ";

$rows = $db->q($q)->fetchAll();
$data = [];

foreach ($rows as $index => $row) {
    $category = $row['category'];
    $category_id = $row['id'];

    if (!isset($data[$category_id])) {
        $data[$category_id] = [
            'name' => $category,
            'forums' => []
        ];
    }

    if ($index == count($rows) - 1) {
        $data[$category_id]['forums'][] = [
            'name' => $row['name'],
            'description' => $row['description'],
            'link' => $row['link'],
            'lastEntry' => true
        ];
    } else {
        $data[$category_id]['forums'][] = [
            'name' => $row['name'],
            'description' => $row['description'],
            'link' => $row['link']
        ];
    }
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-type: application/json');
echo json_encode($data);
