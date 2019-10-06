<?php

namespace app\core;

use ReflectionFunction;

/**
 * Трейт, который описывает одну кеширующую фукнцию
 * @package app\core
 */
trait CacheTrait
{
    protected static $__cache = [];

    protected static function cache($createFunction, $id = null)
    {
        if ($id === null) {
            $funcInfo = new ReflectionFunction($createFunction);
            $source = file($funcInfo->getFileName());
            $body = implode("", array_slice($source, $funcInfo->getStartLine(), $funcInfo->getEndLine()));
            $id = md5($body);
        }
        if (isset(static::$__cache[$id])) {
            return static::$__cache[$id];
        }
        $object = $createFunction();
        static::$__cache[$id] = $object;
        return $object;
    }
}