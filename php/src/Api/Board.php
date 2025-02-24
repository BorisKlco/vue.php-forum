<?php

namespace App\Api;

use App\Core\Database;
use App\Core\Response;

class Board
{
    public function index()
    {
        $q = "
            SELECT forum.id as forum_id, forum.name, forum.description, category.name as category , category.id as id, COUNT(post.id) as posts, COUNT(comment.id) as replies
            FROM forum 
            JOIN category ON forum.category_id = category.id 
            LEFT JOIN post ON forum.id = post.forum_id 
            LEFT JOIN comment ON forum.id = comment.forum_id
            GROUP BY forum.id, category.id
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
                'id' => $row['forum_id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'posts' => $row['posts'],
                'replies' => $row['replies'],
                'link' => "{$this->formatName(($row['name']))}-f{$row['forum_id']}",
                'lastEntry' => $index == count($rows) - 1
            ];
        }

        Response::json($data);
    }

    public function forum()
    {
        $forum_id = $_GET['id'] ?? false;
        $page = (int)$_GET['page'] ?? 1;

        if (
            filter_var($forum_id, FILTER_VALIDATE_INT) != true
            || filter_var($page, FILTER_VALIDATE_INT) != true
        ) {
            Response::error();
        }

        $postCount = Database::q(
            "SELECT COUNT(*) as total FROM post WHERE forum_id = ?",
            [$forum_id]
        )->fetch()['total'] ?? Response::error();

        $perPage = 10;
        $totalPages = (int)ceil($postCount / $perPage);
        $page = max(1, min($page, $totalPages));
        $offset = ($page - 1) * $perPage;

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
                WHERE forum.id = ?
                LIMIT $perPage OFFSET $offset;";

        $fetch = Database::q($sql, [$forum_id])->fetchAll();

        // echo '<pre>';
        // var_dump($postCount, $totalPages, $page);
        // exit();

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
            'page' => [
                'current' => $page,
                'max' => $totalPages
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
