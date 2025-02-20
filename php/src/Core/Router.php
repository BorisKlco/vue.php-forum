<?php

namespace App\Core;

use App\Core\Response;

class Router
{

    public function __construct(public array $routes = []) {}

    public function register(string $method, string $route, array $action): self
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $route,
            'action' => $action
        ];

        return $this;
    }

    public function resolve(string $method, string $path)
    {
        $uri = parse_url($path)['path'];
        $action = null;

        foreach ($this->routes as $route) {
            if ($route['path'] == $uri && $route['method'] == $method) {
                $action = $route['action'];
            }
        }

        if (!$action) {
            Response::error();
        }

        [$class, $fn] = $action;
        $controller = new $class();
        call_user_func([$controller, $fn]);
        exit();
    }
}
