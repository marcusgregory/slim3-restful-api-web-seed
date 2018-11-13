<?php

use Slim\App;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Dotenv\Exception\PathException;

require_once __DIR__.'/../vendor/autoload.php';

// The check is to ensure we don't use .env in production
if (!getenv('APP_ENV')) {
    try {
        (new Dotenv())->load(__DIR__.'/../.env');
    } catch (PathException $ex) {
        echo $ex->getMessage();
        exit(1);
    }
}

$app = new App([
    'settings' => [
        'displayErrorDetails' => 'dev' === getenv('APP_ENV'),
        'app' => [
            'name' => getenv('APP_NAME'),
        ],
        'cors' => [
            'origin' => getenv('CORS_ALLOW_ORIGIN'),
            'methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'],
            'headers.allow' => ['X-Requested-With', 'Content-Type', 'Accept', 'Origin', 'Authorization'],
            'headers.expose' => ['Authorization', 'Etag'],
            'credentials' => true,
            'cache' => 0,
        ],
        'db' => [
            'driver' => 'mysql',
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'database' => getenv('DB_DATABASE'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__.'/../logs/app.log',
            'level' => Monolog\Logger::DEBUG,
        ],
    ],
]);

$container = $app->getContainer();
