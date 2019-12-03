<?php

namespace Inc\Base;

class Uninstall {

    public function uninstall()
    {
        /** Variable nativa de WP para querys en DB */
        global $wpdb;
        
        /** Borramos todos los post de tipo book */
        $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
        
        /** Borramos cualquier informacion relacionada con Books */
        $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
    }
}