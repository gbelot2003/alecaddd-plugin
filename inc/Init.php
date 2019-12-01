<?php

namespace Inc;

final class Init 
{

    public static function GetServices()
    {
        return [
            Pages\Admin::class, 
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }

    public static function register_services()
    {
        foreach(self::GetServices() as $class){
            $service = self::instantiate($class);
            if(method_exists($service, 'register'))
            {
                $service->register();
            }
        }
    }

    private static function instantiate($class)
    {
        return new $class;
    }
}