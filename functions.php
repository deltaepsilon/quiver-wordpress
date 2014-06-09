<?php

/*
 * Register Menus
 */

function register_my_menus() {
    register_nav_menus(array(
        'nav-menu' => __('Nav Menu'),
        'sidebar-menu' => __('Sidebar Menu'),
        'footer-menu' => __('Footer Menu'),
    ));
}
add_action('init', 'register_my_menus');

/*
 * Custom Header
 */

add_theme_support('custom-header');