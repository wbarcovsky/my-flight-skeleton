<?php

namespace app\core;

use Dotenv\Dotenv;
use Exception;
use Flight;
use Leafo\ScssPhp\Compiler;

/**
 * Class App
 * @package app\core
 * @method  static void route($pattern, $callback, $routeInfo = false) Maps a URL pattern to a callback.
 */
class App extends Flight
{
    use CacheTrait;

    /**
     * @var string Текст из этой переменной попадает в заголовок страницы (title)
     */
    public static $pageTitle = 'Hello, world!';

    /**
     * @var string Файл-оболочка (содержит повторяющиеся на всех других страницах стили и скрипты)
     */
    public static $layout = 'layout.php';

    /**
     * Эта функция запускается перед старом
     */
    public static function bootstrap()
    {
        // Загружаем конфиги
        $dotenv = new Dotenv(__DIR__ . '/../');
        $dotenv->load();
    }

    /**
     * Возвращает http-полный путь до указанного файла
     * @param $path
     * @return string
     * @throws Exception
     */
    public static function file($path)
    {
        if (!file_exists($path)) {
            throw new Exception("Файл {$path} не найден");
        }
        $path = rtrim(realpath($path), '/');
        return self::url($path) . '?' . md5_file($path);
    }

    /**
     * Возвращает url до файла в web-папке
     * @param string $path Путь до файла
     * @return mixed|string
     * @throws Exception
     */
    public static function url($path = '')
    {
        if (strpos($path, App::webPath()) === -1) {
            throw new Exception("Путь {$path} не может быть доступен по ссылке - он не находится в папке web");
        }
        $url = str_replace(App::webPath(), '', $path);
        if ($url[0] !== '/') {
            $url = '/' . $url;
        }
        return $url;
    }

    /**
     * Возвращает путь до доступной из web директории (app\web)
     * @return string абсолютный путь до папки
     */
    public static function webPath()
    {
        return realpath(dirname(__DIR__) . '/web/');
    }

    /**
     * Осуществляет вывод сформированного css-файла
     * @param $file
     * @return string
     */
    public static function scss($file)
    {
        $file = realpath($file);
        if (!$file) {
            return '';
        }
        /** @var Compiler $scss */
        $scss = new Compiler();
        $scss->setImportPaths(__DIR__ . '/../web/scss');
        $scss->setSourceMap(1);
        $scss->setSourceMapOptions([
            'sourceMapBasepath' => dirname($file),
            'sourceMapRootpath' => $_SERVER['HTTP_HOST'] . '/css/',
        ]);
        return $scss->compile(file_get_contents($file));
    }

    public static function backUrl($url): string
    {
        return trim(getenv('BACK_URL'), '/') . '/' . trim($url, '/');
    }
}
