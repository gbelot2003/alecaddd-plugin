<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi; 
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    private $settings; 
    private $pages;
    private $subPages;
    private $callbacks;

    /**
     * register function
     *
     * @return void
     */
    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks(); 

        $this->setPages();
        $this->setSubPages();
        $this->settings->addPages($this->pages)
        ->withSubPage('dashboard')
        ->addSubPages($this->subPages)
        ->register();
    }

    public function setPages()
    {
        $this->pages = [
            $this->adminPage(),
        ];
    }

    public function setSubPages()
    {
        $this->subPages = [
            $this->customPostType(),
            $this->customTaxonomy(),
            $this->customWidgets(),
        ];
    }

    /**
     * Pagina principal function
     *
     * @return void
     */
    private function adminPage()
    {
        return [
            'page_title' => 'Alecaddd Plugin',
            'menu_title' => 'Alecaddd',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_plugin',
            'callback' => array($this->callbacks, 'adminDashboard'),
            'icon_url' => 'dashicons-store',
            'position' => '110'
            ];
    }

    /**
     * Pagina de CPT function
     *
     * @return void
     */
    private function customPostType()
    {
        return [
            'parent_slug' => 'alecaddd_plugin',
            'page_title' => 'Custom Post Types',
            'menu_title' => 'CPT',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_cpt',
            'callback' => function(){echo '<h1>CPT</h1>';},
        ];
    }

    /**
     * Pagina de Taxonomies function
     *
     * @return void
     */
    private function customTaxonomy()
    {
        return [
            'parent_slug' => 'alecaddd_plugin',
            'page_title' => 'Custom Taxonomies',
            'menu_title' => 'Taxonomies',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_taxonomies',
            'callback' => function(){echo '<h1>Taxonomies</h1>';},
        ];
    }

    /**
     * Pagina de Widgets function
     *
     * @return void
     */
    private function customWidgets()
    {
        return [
            'parent_slug' => 'alecaddd_plugin',
            'page_title' => 'Custom Widgets',
            'menu_title' => 'Widgets',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_widgets',
            'callback' => function(){echo '<h1>Widgets</h1>';},
        ];
    }

}