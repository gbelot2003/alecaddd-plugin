<?php

namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        // Esto para paginas administrativas
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        // Esto para agregar en el template
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }

    /**
     * enqueue function
     *
     * @return void
     */
    public function enqueue()
    {
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assets/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL  . '/assets/myscript.js');
    }
}