<?php

namespace app\cmd;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HelloWorldCommand
 * @package app\cmd
 */
class HelloWorldCommand extends BaseCommand {

    public static function command(): string
    {
        return 'hello [name] [--yell]';
    }

    public static function desc(): ?string
    {
        return 'Тестовая команда';
    }

    public function run($name, bool $yell, OutputInterface $output)
    {
        if ($name) {
            $text = 'Hello, '.$name;
        } else {
            $text = 'Hello';
        }

        if ($yell) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }
}
