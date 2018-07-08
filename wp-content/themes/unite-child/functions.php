<?php
/**
 * Films Custom Post initiation and boot loaders
 */

define( 'UNITE_CHILD_DIR', get_template_directory() . '-child' ); // TextDomain for the theme

/**
 * Include Films Configurations.
 */
include_once wp_normalize_path( UNITE_CHILD_DIR . '/inc/configs.php' );

/**
 * Include Main Films Class.
 */


include_once wp_normalize_path( UNITE_CHILD_DIR . '/films.php' );
Films::init();