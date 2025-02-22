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

        $sql = "SELECT 
                    forum.id AS forum_id, 
                    forum.name AS forum_name, 
                    post.id AS post_id, 
                    post.name AS post_title, 
                    post.createdAt,
                    user.name AS author_name
                FROM post 
                JOIN forum ON forum.id = post.forum_id 
                JOIN user ON post.author = user.id 
                WHERE forum.id = ?;";

        $fetch = Database::q($sql, [$forum_id])->fetchAll();

        if ($fetch) {
            $forum = $fetch[0];
        } else {
            Response::error();
        }

        $data = [
            'navigation' => [
                ['name' => 'Index', 'path' => '/'],
                ['name' => $forum['forum_name'], 'path' => "{$this->formatName(($forum['forum_name']))}-f{$forum['forum_id']}"]
            ],
            'post' => []
        ];

        foreach ($fetch as $index => $post) {
            $data['post'][] = [
                'post_id' => $post['post_id'],
                'title' => $post['post_title'],
                'authod' => $post['author_name'],
                'createdAt' => $post['createdAt'],
                'path' => "{$this->formatName(($post['post_title']))}-t{$post['post_id']}",
                'lastEntry' => $index == count($fetch) - 1
            ];
        }

        Response::json($data);
    }


    private function formatName($name)
    {
        $name = strtolower($name);
        $name = str_replace(' ', '-', $name);
        return preg_replace('/[^a-z0-9-]/', '', $name);
    }
}
