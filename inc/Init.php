<?php

namespace Inc;

final class Init 
{

    /**
     * GetServices function
     *
     * @return void
     * Creamos array con lista de servicios
     * registrados
     */
    public static function GetServices()
    {
        return [
            Pages\Admin::class, 
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\Posttypes::class,
        ];
    }

    /**
     * register_services function
     *
     * @return void
     * Mediante un loop instanciamos todos 
     * los servicios registrados en GetServices
     */
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

    /**
     * instantiate function
     *
     * @param [type] $class
     * @return void
     * Metodo para auto instanciar 
     * los servicios de esta clase
     */
    private static function instantiate($class)
    {
        return new $class;
    }
}