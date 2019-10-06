<?php

namespace app\cmd;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HelloWorldCommand
 * @package app\cmd
 */
class ServeCommand extends BaseCommand {

    public static function command(): string
    {
        return 'serve ';
    }

    public static function desc(): ?string
    {
        return 'Команда запуска тестового сервера';
    }

    public function run(OutputInterface $output)
    {
        $port = getenv('APP_PORT');
        $host = 'localhost';
        $path = realpath(__DIR__ . '/../web');
        $output->writeln("Server started on http://{$host}:{$port}/");
        passthru("php -S {$host}:{$port} -t {$path}");
    }
}
