<?php

/**
 * @package AlecadddPlugin
 */

/*
Plugin Name: Alecaddd Plugin
Plugin URI: http://alecaddd.com/plugin
Description: Primera prueba de creación de un plugin
Version: 0.0.1
Author: Gerardo Belot
Author URI: http://gerardobelot.me
License: GPLv2 or later
Text Domain: alecaddd-plugin
*/

/**
 * AlecadddPlugin
 *
 * Plugin Name: AlecadddPlugin
 * Plugin URI:  https://wordpress.org/plugins/classic-editor/
 * Description: Enables the WordPress classic editor and the old-style Edit Post screen with TinyMCE, Meta Boxes, etc. Supports the older plugins that extend this screen.
 * Version:     1.5
 * Author:      WordPress Contributors
 * Author URI:  https://github.com/WordPress/classic-editor/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: classic-editor
 * Domain Path: /languages
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

defined('ABSPATH') or die('No nonono sir, dont do that!!');

class AlecadddPlugin
{

    /**
     * activate function
     *
     * @return void
     */
    public function activate()
    {
        $this->custom_post_type();
        require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-activate.php';
        AlecadddPluginActivate::activate();
    }

    /**
     * deactivate function
     *
     * @return void
     */
    public function deactivate()
    {
        require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-deactivate.php';
        AlecadddPluginDeactivate::deactivate();
    }

    /**
     * register function
     *
     * @return void
     */
    public function register()
    {
        $this->register_post_type();
        $this->register_admin_scripts();
        $this->register_wp_scripts();
    }

    /**
     * register_admin_scripts function
     *
     * @return void
     */
    public function register_admin_scripts()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    /**
     * add_admin_pages function
     *
     * @return void
     */
    public function add_admin_pages()
    {
        // especificaciones de la pagina de administración del plugin
        add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin',
                                    array($this, 'admin_index'), 'dashicons-store', 110);
    }

    /**
     * admin_index function
     * callback from add_admin_page()
     *
     * @return void
     */
    public function admin_index()
    {

    }

    /**
     * register_wp_scripts function
     *
     * @return void
     */
    public function register_wp_scripts()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }

    /**
     * register_post_type function
     *
     * @return void
     */
    private function register_post_type()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    /**
     * custom_post_type function
     *
     * @return void
     */
    public function custom_post_type()
    {
        register_post_type('book', [
            'public' =>  true, 
            'label' => 'books',
            'description' => 'short descriptive summary of the post type',
            'show_in_menu' => true
        ]);
    }

    /**
     * enqueue function
     *
     * @return void
     */
    public function enqueue()
    {
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));

    }
}

if(class_exists('AlecadddPlugin')){
    $alecadddPlugin = new AlecadddPlugin();
    $alecadddPlugin->register();
}

/**
 * Activation hook
 */
register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));

/**
 * deactivate hook
 */
register_deactivation_hook(__FILE__, array($alecadddPlugin, 'deactivate'));