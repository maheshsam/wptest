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
		}

	}
}