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
 * Register Sidebars
 */

function register_my_sidebars() {
    register_sidebar(array(
        'id' => 'right-top-sidebar',
        'name' => 'Right Top Sidebar',
        'description' => 'This sidebar is to the right of the post content and above the Sidebar Menu'
    ));

    register_sidebar(array(
        'id' => 'right-bottom-sidebar',
        'name' => 'Right Bottom Sidebar',
        'description' => 'This sidebar is to the right of the post content and below the Sidebar Menu'
    ));

    register_sidebar(array(
        'id' => 'footer-sidebar',
        'name' => 'Footer Sidebar',
        'description' => "It's the footer, just below the Footer Menu."
    ));
}

add_action('init', 'register_my_sidebars');

/*
 * Custom Header
 */

add_theme_support('custom-header');