<?php

require __DIR__ . '/../vendor/autoload.php';

use app\core\App;

Flight::set('flight.views.path', realpath(__DIR__ . '/../views/'));

session_start();

App::bootstrap();

$routes = require(__DIR__ . '/routes.php');
// Загружаем все роуты из `routes.php`
foreach ($routes as $path => $viewFile) {
    App::route($path, function () use ($viewFile) {
        $params = func_get_args();
        if (is_array($viewFile)) {
            $controller = new $viewFile[0];
            call_user_func($viewFile, $params);
        } else {
            $route = array_pop($params);
            $data = ['route' => $route];
            App::render($viewFile, $data, 'content');
            App::render(App::$layout, $data);
        }
    }, true);
}

App::start();
