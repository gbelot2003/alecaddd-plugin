<?php

namespace Inc\Base;

class SettingsLinks {

    private $pluginName;

    public function __construct()
    {
        // Para este caso particular
        $this->pluginName = PLUGIN_NAME;
    }

    public function register()
    {
        add_filter("plugin_action_links_$this->pluginName", array($this, 'settings_links'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function settings_links($links)
    {
        $settings_links = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
        array_push($links, $settings_links);
        return $links;
    }
}