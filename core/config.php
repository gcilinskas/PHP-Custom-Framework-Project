<?php

namespace App\Core;

use Dotenv\Dotenv;
use Twig_Environment;
use App\Twig\AppExtension;
use Twig_Loader_Filesystem;
use Zend\Diactoros\Response;
use Doctrine\ORM\Tools\Setup;
use AliseeksApi\Configuration;
use Doctrine\ORM\EntityManager;
use Aura\Router\RouterContainer;
use Twig\Extension\DebugExtension;
use Zend\Diactoros\ServerRequestFactory;
use Dotenv\Exception\InvalidPathException;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

try {
    $dotenv = Dotenv::create(base_path());
    $dotenv->load();
} catch (InvalidPathException $e) {
    dump($e);
}

return [
    'request' => function() {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    },
    'response' => new Response(),
    'emitter' =>  SapiEmitter::class,
    RouterContainer::class => function() {
        return new RouterContainer();
    },
    Twig_Environment::class => function()
    {
        $loader = new Twig_Loader_Filesystem(base_path('app/views'));

        $twig = new Twig_Environment($loader, [
            'cache' => env('APP_CACHE'),
            'debug' => env('APP_DEBUG')
        ]);

        $twig->addExtension(new DebugExtension);

        $container = MyContainer::get();
        $twig->addExtension(new AppExtension($container->get(EntityManager::class)));

        return $twig;
    },
    EntityManager::class => function()
    {
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(
            array(__DIR__."/app"), //path
            $isDevMode, // dev mode
            null, // proxy dir
            null, // cache
            false // use simple annotation reader
        );

        $conn = array(
            'dbname' => env('DB_NAME'),
            'user' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'driver' => env('DB_DRIVER'),
        );

        $entityManager = EntityManager::create($conn, $config);

        return $entityManager;
    },
    'app' => [
        'name' => env('APP_NAME'),
        'debug' => env('APP_DEBUG')
    ],
    'db' => [
        'driver' => env('DB_DRIVER'),
        'host' => env('DB_HOST'),
        'database' => env('DB_NAME'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD')
    ],
    Configuration::class => Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', env('ALISEEKS_API')),


];