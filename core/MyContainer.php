<?php

namespace App\Core;

use DI\ContainerBuilder;

class MyContainer
{

    protected static $container;

    public static function build()
    {
        // Build Container
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(base_path('core/config.php'));
        self::$container = $containerBuilder->build();

        return self::$container;
    }
    public static function get()
    {
        return self::$container;
    }
}