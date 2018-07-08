<?php
/**
 * Films Custom Post initiation and boot loaders
 */

define( 'UNITE_CHILD_DIR', get_template_directory() . '-child' ); // TextDomain for the theme

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/**
 * Include Films Configurations.
 */
include_once wp_normalize_path( UNITE_CHILD_DIR . '/inc/configs.php' );

/**
 * Include Main Films Class.
 */


include_once wp_normalize_path( UNITE_CHILD_DIR . '/films.php' );
Films::init();

