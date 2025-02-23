<?php

namespace App\Api;

use App\Core\Database;
use App\Core\Response;

class Board
{
    public function index()
    {
        $q = "
            SELECT forum.id as forum_id, forum.name, forum.description, forum.link, category.name as category , category.id as id
            FROM forum 
            JOIN category ON forum.category_id = category.id 
            ORDER BY category.id, forum.id;
            ";

        $rows = Database::q($q)->fetchAll();
        $data = ['navigation' => [['name' => 'Index', 'path' => '/']], 'categories' => []];

        foreach ($rows as $index => $row) {
            $category = $row['category'];
            $category_id = $row['id'];

            if (!isset($data['categories'][$category_id])) {
                $data['categories'][$category_id] = [
                    'name' => $category,
                    'forums' => []
                ];
            }

            $data['categories'][$category_id]['forums'][] = [
                'name' => $row['name'],
                'description' => $row['description'],
                'link' => "{$this->formatName(($row['name']))}-f{$row['forum_id']}",
                'lastEntry' => $index == count($rows) - 1
            ];
        }

        Response::json($data);
    }

    public function forum()
    {
        $forum_id = $_GET['id'] ?? false;

        if (filter_var($forum_id, FILTER_VALIDATE_INT) != true) {
            Response::error();
        }

        $sql = "select forum.id as forum_id, forum.name from forum where forum.id = ?;";
        $forum = Database::q($sql, [$forum_id])->fetchAll();

        if ($forum) {
            $forum = $forum[0];
        } else {
            Response::error();
        }
        // echo '<pre>';
        // var_dump($forum);
        // exit();

        $data = [
            'navigation' => [
                ['name' => 'Index', 'path' => '/'],
                ['name' => $forum['name'], 'path' => "{$this->formatName(($forum['name']))}-f{$forum['forum_id']}"]
            ],
            'forum' => [
                'name' => $forum['name']
            ]
        ];

        Response::json($data);
    }


    private function formatName($name)
    {
        $name = strtolower($name);
        $name = str_replace(' ', '-', $name);
        return preg_replace('/[^a-z0-9-]/', '', $name);
    }
}
