<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Api;

class SettingsApi 
{
    public $admin_pages = array();

    public $adminSub_pages = array();


    public function register()
    {
        if(!empty($this->admin_pages)){
            add_action('admin_menu', array($this, 'addAdminMenu'));
        }
    }


    public function addPages(array $pages)
    {
        $this->admin_pages = $pages;

        return $this;
    }


    public function withSubPage(string $title = null)
    {
        if(empty($this->admin_pages)){
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $sub_page = array(
            [
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Alecaddd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' => function(){echo '<h1>SubPage</h1>';},
            ]
        );

        $this->adminSub_pages = $sub_page;

        return $this;
    }

    public function addSubPages(array $pages)
    {
        $this->adminSub_pages = array_merge($this->adminSub_pages, $pages);
        return $this;
    }


    public function addAdminMenu()
    {
        foreach($this->admin_pages as $page){
            add_menu_page(
                $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'],
                $page['callback'], $page['icon_url'], $page['position']);
        }

        foreach($this->adminSub_pages as $page){
            add_submenu_page(
                $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'],
                $page['menu_slug'], $page['callback'],
            );
        }
    }

}