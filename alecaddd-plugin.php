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

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php'))
{
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));

define('PLUGIN_URL', plugin_dir_url(__FILE__));

define('PLUGIN_NAME', plugin_basename(__FILE__));

register_activation_hook(__FILE__ , array(Inc\Base\Activate::class, 'activate'));
register_deactivation_hook(__FILE__ , array(Inc\Base\Deactivate::class, 'deactivate'));

if (class_exists('Inc\\Init'))
{
    Inc\Init::register_services();
}
