<?php

namespace App\Api;

use App\Core\Database;
use App\Core\Response;

class Board
{
    public function index()
    {
        $q = "
            SELECT 
                forum.id as forum_id, 
                forum.name, 
                forum.description, 
                category.name as category, 
                category.id as category_id, 
                COUNT(DISTINCT post.id) as posts, 
                COUNT(comment.id) as replies,
                MAX(comment.createdAt) as last_comment
            FROM forum 
            JOIN category ON forum.category_id = category.id 
            LEFT JOIN post ON forum.id = post.forum_id 
            LEFT JOIN comment ON post.id = comment.post_id
            GROUP BY forum.id, category.id
            ORDER BY category.id, forum.id
            ";

        $rows = Database::q($q)->fetchAll();
        $data = ['navigation' => [['name' => 'Index', 'path' => '/']], 'categories' => []];

        foreach ($rows as $index => $row) {
            $category = $row['category'];
            $category_id = $row['category_id'];

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
                'link' => "{$this->formatName(($row['name']))}-forum{$row['forum_id']}",
                'lastReply' => $row['last_comment'],
                'lastEntry' => $index == count($rows) - 1
            ];
        }

        Response::json($data);
    }

    public function forum()
    {
        $forum_id = $_GET['id'] ?? false;
        $page = $_GET['page'] ?? 1;

        if (
            filter_var($forum_id, FILTER_VALIDATE_INT) != true
        ) {
            Response::error();
        }

        $postCount = Database::q(
            "SELECT COUNT(*) as total FROM post WHERE forum_id = ?",
            [$forum_id]
        )->fetch()['total'] ?? Response::error();

        $perPage = 4;
        $totalPages = (int)ceil($postCount / $perPage);
        $page = max(1, min($page, $totalPages));
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT 
                    forum.id AS forum_id, 
                    forum.name AS forum_name, 
                    post.id AS post_id, 
                    post.name AS post_title, 
                    post.createdAt,
                    user.name AS author_name,
                    COUNT(comment.id) as replies
                FROM post 
                JOIN forum ON forum.id = post.forum_id 
                JOIN user ON post.author = user.id 
                LEFT JOIN comment ON comment.post_id = post.id
                WHERE forum.id = ?
                GROUP BY post.id
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
                ['name' => $forum['forum_name'], 'path' => "{$this->formatName(($forum['forum_name']))}-forum{$forum['forum_id']}"]
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
                'author' => $post['author_name'],
                'replies' => $post['replies'],
                'createdAt' => $post['createdAt'],
                'path' => "{$this->formatName(($post['post_title']))}-topic{$post['post_id']}",
                'lastEntry' => $index == count($fetch) - 1
            ];
        }

        Response::json($data);
    }


    public function topic()
    {

        $post_id = $_GET['id'] ?? false;
        $page = $_GET['page'] ?? 1;

        if (
            filter_var($post_id, FILTER_VALIDATE_INT) != true
        ) {
            Response::error();
        }

        $postCount = Database::q(
            "SELECT COUNT(*) as total FROM comment WHERE comment.post_id = ?",
            [$post_id]
        )->fetch()['total'] ?? Response::error();


        $nav_sql = "SELECT 
                            post.name as post_name, 
                            post.id as post_id, 
                            forum.name as forum_name, 
                            forum.id as forum_id
                        FROM comment 
                        JOIN post ON post.id = comment.post_id
                        JOIN forum ON comment.forum_id = forum.id
                        WHERE comment.post_id = ?;";

        $navigation = Database::q($nav_sql, [$post_id])->fetch();

        $perPage = 3;
        $totalPages = (int)ceil($postCount / $perPage);
        $page = max(1, min($page, $totalPages));
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT 
                    comment.id as comment_id, 
                    comment.comment as reply, 
                    comment.createdAt as createdAt,
                    user.name as user 
                FROM comment 
                JOIN post ON post.id = comment.post_id
                JOIN user ON comment.user_id = user.id
                WHERE comment.post_id = ?
                LIMIT $perPage OFFSET $offset;";

        $fetch = Database::q($sql, [$post_id])->fetchAll();

        $data = [
            'navigation' => [
                ['name' => 'Index', 'path' => '/'],
                ['name' => $navigation['forum_name'], 'path' => "{$this->formatName(($navigation['forum_name']))}-forum{$navigation['forum_id']}"],
                ['name' => $navigation['post_name'], 'path' => "{$this->formatName(($navigation['post_name']))}-topic{$navigation['post_id']}"]
            ],
            'page' => [
                'current' => $page,
                'max' => $totalPages
            ],
            'comments' => []
        ];

        foreach ($fetch as $index => $comment) {
            $data['comments'][] = [
                'comment_id' => $comment['comment_id'],
                'reply' => $comment['reply'],
                'author' => $comment['user'],
                'createdAt' => $comment['createdAt'],
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
