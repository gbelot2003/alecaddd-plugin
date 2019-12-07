<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Api;

class SettingsApi 
{
    public $admin_pages = array();

    public $adminSub_pages = array();

    public $settings = array();

    public $sections = array();

    public $fields = array();


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
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback'],
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


    public function addSettings(array $settings)
    {
        $this->settings = $settings;

        return $this;
    }


    public function addSections(array $sections)
    {
        $this->sections = $sections;

        return $this;
    }


    public function addFields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    
    public function registerCustomFields()
    {
        foreach($this->settings as $setting){
            // register the settings
            register_setting($setting["option_group"], $setting['option_name'], 
            (isset($setting['callback']) ? $setting["callback"] : null));
        }
        
        foreach ($this->sections as $section){
            // add settings section
            add_settings_section( $section['id'], $section['title'], 
            (isset($section['callback']) ? $section['callback'] : null), $section['page'] );
        }
        
        foreach($this->fields as $field){
            // add settings fields
            add_settings_field( $field['id'], $field['title'], 
            (isset($field['callback']) ? $field['callback'] : null), $field['page'], $field['section'], 
            (isset($field['args']) ? $field['args'] : null));
        }
        
    }

}