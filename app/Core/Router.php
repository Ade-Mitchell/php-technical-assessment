<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    public function __construct(private array $routes)
    {
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as [$routeMethod, $routePath, $handler]) {
            if ($routeMethod === $method && $routePath === $path) {
                if (is_callable($handler)) {
                    $handler();
                    return;
                }

                if (is_array($handler) && count($handler) === 2) {
                    [$controller, $action] = $handler;
                    $instance = new $controller();
                    $instance->$action();
                    return;
                }
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }
}