<?php

require 'helpers.php';

use App\Core\MyContainer;
use Middlewares\AuraRouter;
use Zend\Diactoros\Response;
use WoohooLabs\Harmony\Harmony;
use Aura\Router\RouterContainer;
use App\Middleware\AuthMiddleware;
use App\Middleware\UserAuthenticator;
use App\Middleware\AdminAuthenticator;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use WoohooLabs\Harmony\Condition\PathPrefixCondition;
use WoohooLabs\Harmony\Middleware\DispatcherMiddleware;
use WoohooLabs\Harmony\Middleware\HttpHandlerRunnerMiddleware;


$container = MyContainer::build();
$request = $container->get('request');

// PSR-7 router
$routerContainer = $container->get(RouterContainer::class);
$map = $routerContainer->getMap();

// Routes name url file
require_once base_path('app/routes/web.php');

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'Route not found';
} else {
    $emitter = new SapiEmitter();
    try {
        $harmony = new Harmony($request, new Response());

        $harmony
            ->addMiddleware(new HttpHandlerRunnerMiddleware(new SapiEmitter()));
        $harmony
            ->addMiddleware(new AuraRouter($routerContainer));
            $harmony->addMiddleware(new DispatcherMiddleware($container, 'request-handler'));

        $harmony->addCondition(
            new PathPrefixCondition(["/cart","/admin"]),
            function (Harmony $harmony) {
                $harmony->addMiddleware(new AuthMiddleware('/cart',new UserAuthenticator, new Response()))
                        ->addMiddleware(new AuthMiddleware('/admin',new AdminAuthenticator, new Response()));
            }
        );

        $harmony();
    } catch (Exception $e) {
        dump($e);
    }
}


