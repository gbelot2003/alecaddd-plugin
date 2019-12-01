<?php

namespace Inc\Base;

class Posttypes {

    public function register()
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
    
}