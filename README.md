# Инструкция по развертыванию:

1. Установить php + php-cli
2. Выполнить `php composer.phar install`
3. Скопировать файл `.env` из `.env.example`
4. Выполнить `php -S localhost:4242 -t web/`  
 --- или ---  
4. Настроить свой веб-сервер по папку `web/`
5. Profit!

6. Для загрузки данных на тестовый сервер `php cmd/upload.php`
7. Для загрузки данных на основной `php cmd/upload.php --prod`