<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Avoid duplication!
if ( ! class_exists( 'Films' ) ) {

	class Films {

		function __construct(){
			
		}

		public function init(){
			include_once wp_normalize_path( UNITE_CHILD_DIR . '/inc/class-customposts.php' );
			new Customposts();

			call_user_func( 'add_shortcode', "last5films", array( __CLASS__, 'handle_shortcode' ) );
		}

		/**
		 * Handle shortcode
		 *
		 * @param $atts
		 * @param $content
		 *
		 * @return string
		 */
		function handle_shortcode( $atts, $content ) {

			$atts['shortcode-id'] = "last5films"; // adds shortcode id to atts for using it inside filters

			return self::display_shortcode( $atts, $content );
		}

		/**
		 * Handle displaying of shortcode
		 *
		 * @param array  $atts
		 * @param string $content
		 *
		 * @return string
		 */
		public static function display_shortcode( array $atts, $content = '' ) {

			if ( ! empty( $content ) ) {
				$atts['content'] = $content;
			}


			self::app_set_prop( 'shortcode_'.$atts["shortcode-id"].'_atts', $atts );

			// If file name passed as folder argument for short method call
			if ( ! empty( $folder ) && empty( $file ) ) {
				$file   = $folder;
				$folder = '';
			}

			if ( $echo == FALSE ) {
				ob_start();
			}

			if ( file_exists( UNITE_CHILD_DIR . '/inc/shortcodes/'.$atts["shortcode-id"] . '.php' ) ) {
				include UNITE_CHILD_DIR . '/inc/shortcodes/'.$atts["shortcode-id"] . '.php';
			}

			if ( $echo == FALSE ) {
				return ob_get_clean();
			}

			self::app_clear_props();

			return $output;
		}

		/**
		 * Used to set a block property value.
		 *
		 * @param   string $id
		 * @param   mixed  $value
		 */
		public static function app_set_prop( $id, $value ) {

			global $app_core_props_cache;

			$app_core_props_cache[ $id ] = $value;
		}

		/**
		 * Used to get a block property value.
		 *
		 * @param   string $id
		 * @param   mixed  $value
		 */
		public static function app_get_prop( $id, $default = NULL ) {

			global $app_core_props_cache;

			if ( isset( $app_core_props_cache[ $id ] ) ) {
				return $app_core_props_cache[ $id ];
			} else {
				return $default;
			}
		}

		/**
		 * Used to clear all properties.
		 *
		 * @return  void
		 */
		public static function app_clear_props() {

			global $app_core_props_cache;

			$app_core_props_cache = array();
		}

	}
}