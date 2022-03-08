<?php

function TornusRegisterStyles()
{
    $version = wp_get_theme()->get("Version");
    wp_enqueue_style("tornus-bootstrap", get_template_directory_uri() . "/assets/css/bootstrap/bootstrap.min.css", array(), "5.1.3");
    wp_enqueue_style("tornus-style", get_template_directory_uri() . "/style.css", array("tornus-bootstrap"), $version);
}

function TornusRegisterScripts()
{
    $version = wp_get_theme()->get("Version");
    wp_enqueue_script("tornus-bootstrap-js", get_template_directory_uri() . "/assets/js/bootstrap/bootstrap.min.js", array(), "5.1.3", false);
    wp_enqueue_script("tornus-main-js", get_template_directory_uri() . "/assets/js/main.js", array("tornus-bootstrap-js"), $version, false);
}

function TornusRegisterMenuLocations()
{
    register_nav_menus(
        array(
            'header_menu' => __('Header Menu'),
            'header_menu_logged_in' => __('Header Menu Logged In'),
            'footer_menu_left' => __('Footer Menu Left'),
            'footer_menu_right' => __('Footer Menu Right'),
            'footer_menu_middle' => __('Footer Menu Middle')
        )
    );
}

function TornusThemeSupports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('init', 'TornusRegisterMenuLocations');
add_action('after_setup_theme', 'TornusThemeSupports');
add_action('wp_enqueue_scripts', 'TornusRegisterStyles');
add_action('wp_enqueue_scripts', 'TornusRegisterScripts');

?>