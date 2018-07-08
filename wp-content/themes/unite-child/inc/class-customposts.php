<?php
/**
 * The class that handles custom.
 *
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Avoid duplication!
if ( ! class_exists( 'Customposts' ) ) {

	class Customposts {

		/**
		 * Load admin custom posts configurations
		 *
		 * @static
		 * @access public
		 * @var array
		 */
		public static $customposts = array( );

		/**
		 * Contains list of all active custom post types
		 *
		 * @since 1.0.0
		 * @var array
		 */
		protected static $cpt_configs = array();

		/**
		 * Contains list of all taxonomies for custom post type(s)
		 *
		 * @since 1.0.0
		 * @var array
		 */
		protected static $cpt_taxonomies = array();

		public function __construct(){
			self::$customposts = apply_filters( "customposts::config" , self::$customposts );
			self::init_cpts();
		}

		private static function init_cpts( $customposts = array() ) {
			if( empty( $customposts ) ) {
				$customposts = self::$customposts;
			}

			if( !empty( $customposts ) ) {
				foreach( $customposts as $key => $custompost ) {
					if( isset( $custompost["postargs"] ) ) {
						self::$cpt_configs[$key] = $custompost["postargs"];
					}
					if( isset( $custompost["taxonomies"] ) ) {
						self::$cpt_taxonomies[$key] = $custompost["taxonomies"];
					}
				}
			}

			self::register_cpt( self::$cpt_configs );
			self::register_cpt_taxonomies( self::$cpt_taxonomies );

		}

		public static function register_cpt( $cptargs = array() ){
			if( empty( $cptargs ) ){
				return;
			}

			foreach ($cptargs as $key => $value) {
				register_post_type( $key , $value );
			}
		}

		public static function register_cpt_taxonomies( $taxonomies = array() ){
			if( empty( $taxonomies ) ){
				return;
			}
			foreach ($taxonomies as $key => $taxonomy ) {
				foreach ($taxonomy as $tx ) {
					register_taxonomy( $tx["taxonomy"] , $tx["posttype"] , $tx["args"] );
				}
			}
		}
	}
}