<?php
/**
 * @var string $content
 * @var array $params
 * @var $route \flight\net\Route
 */

use app\core\App;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- head-->
    <title><?= App::$pageTitle ?></title>
    <!-- styles-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="yandex-verification" content="404d3eb76f321ff9" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <style><?= App::scss(__DIR__ . '/../web/scss/main.scss') ?></style>
</head>
<body>
<!-- wrapper -->
<div class="wrapper">
    <div class="container">
        <main>
            <?= $content ?>
        </main>
    </div>
</div>
</body>
<!-- scripts -->
    <script src="<?= App::file(__DIR__ . '/../web/js/jquery-3.4.1.min.js') ?>"></script>
    <script src="<?= App::file(__DIR__ . '/../web/js/script.js') ?>"></script>
</html>
