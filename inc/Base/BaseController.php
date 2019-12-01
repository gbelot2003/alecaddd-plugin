<?php
/**
 * @package AlecadddPlugin
 */

 namespace Inc\Base;

 class BaseController 
 {
    public $plugin_path;

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname( __DIR__ )); 
    }
 }