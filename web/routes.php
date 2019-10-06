
<?php


use app\controllers\PhpInfoController;

return [
    '/' => __DIR__ . '/../views/main_page.php',
    '/info' => [PhpInfoController::class, 'info'],
];
