<?php

namespace Inc\Pages;

class Admin 
{

    public function register()
    {
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
        require_once PLUGIN_PATH . 'templates/admin.php';
    }


}