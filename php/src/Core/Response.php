<?php

namespace App\Core;

class Response
{
    public static function json(array $data)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Content-type: application/json');
        echo json_encode($data);
        exit();
    }
    public static function error()
    {

        $data = [
            "error" => "not found"
        ];
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Content-type: application/json');
        echo json_encode($data);
        exit();
    }
}
