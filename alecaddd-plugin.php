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
    public function __construct()
    {
       add_action('init', array($this, 'custom_post_type'));
    }

    public function register_admin_scripts()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function register_wp_scripts()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }

    public function activate()
    {
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }

    public function custom_post_type()
    {
        register_post_type('book', [
            'public' =>  true, 
            'label' => 'books',
            'description' => 'short descriptive summary of the post type',
            'show_in_menu' => true

        ]);
    }

    public function enqueue()
    {
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
    }
}

if(class_exists('AlecadddPlugin')){
    $alecadddPlugin = new AlecadddPlugin();
    $alecadddPlugin->register_admin_scripts();
    $alecadddPlugin->register_wp_scripts();
}

// Activation
register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array($alecadddPlugin, 'deactivate'));