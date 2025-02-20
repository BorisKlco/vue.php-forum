<?php

namespace App\Api;

use App\Core\Database;
use App\Core\Response;

class Board
{
    public function index()
    {
        $q = "
            SELECT forum.name, forum.description, forum.link, category.name as category , category.id as id
            FROM forum 
            JOIN category ON forum.category_id = category.id 
            ORDER BY category.id, forum.id;
            ";

        $rows = Database::q($q)->fetchAll();
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

            $data[$category_id]['forums'][] = [
                'name' => $row['name'],
                'description' => $row['description'],
                'link' => $row['link'],
                'lastEntry' => $index == count($rows) - 1
            ];
        }

        Response::json($data);
    }
}
