#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\cmd\BaseCommand;
use app\cmd\HelloWorldCommand;
use app\cmd\ServeCommand;
use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$app = new Silly\Application();

foreach (BaseCommand::commands() as $command) {
    $object = new $command();
    $app->command($command::command(), [$object, 'run'])->descriptions($command::desc());
}

$app->run();
