<?php

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi; 

class Admin extends BaseController
{
    private $settings; 
    private $pages;

    
    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->pages = [
            $this->adminPage()
        ];
    }


    public function register()
    {
        $this->settings->addPages($this->pages)->register();
    }


    private function adminPage()
    {
        return [
            'page_title' => 'Alecaddd Plugin',
            'menu_title' => 'Alecaddd',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_plugin',
            'callback' => function(){echo '<h1>Alecaddd-plugin</h1>';},
            'icon_url' => 'dashicons-store',
            'position' => '110'
            ];
    }


}