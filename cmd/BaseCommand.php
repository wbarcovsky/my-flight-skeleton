<?php

namespace app\cmd;

abstract class BaseCommand
{
    public static function commands()
    {
        return [
            HelloWorldCommand::class,
            ServeCommand::class,
        ];
    }

    abstract public static function command(): string;

    public static function desc(): ?string
    {
        return null;
    }
}
