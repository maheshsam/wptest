<?php

define( 'UNITE_TD', 'unitechild' ); // TextDomain for the theme

add_filter( 'customposts::config', 'load_customposts_configs' );

if ( ! function_exists( 'load_customposts_configs' ) ) {
	/**
	 * Configuration for Custom Post Types
	 *
	 * @return array
	 */
	function load_customposts_configs() {
		return array(
			'film' => array(
				'postargs' => array(
						'labels' 	=> array(
							'name'               => _x( 'Films', 'post type general name', UNITE_TD ),
							'singular_name'      => _x( 'Film', 'post type singular name', UNITE_TD ),
							'menu_name'          => _x( 'Films', 'admin menu', UNITE_TD ),
							'name_admin_bar'     => _x( 'Film', 'add new on admin bar', UNITE_TD ),
							'add_new'            => _x( 'Add New', 'film', UNITE_TD ),
							'add_new_item'       => __( 'Add New Film', UNITE_TD ),
							'new_item'           => __( 'New Film', UNITE_TD ),
							'edit_item'          => __( 'Edit Film', UNITE_TD ),
							'view_item'          => __( 'View Film', UNITE_TD ),
							'all_items'          => __( 'Film', UNITE_TD ),
							'search_items'       => __( 'Search Films', UNITE_TD ),
							'parent_item_colon'  => __( 'Parent Film:', UNITE_TD ),
							'not_found'          => __( 'No film found.', UNITE_TD ),
							'not_found_in_trash' => __( 'No film found in Trash.', UNITE_TD )
						),	
				        'public' 			=> true,
				        'show_ui' 			=> true,
				        'capability_type' 	=> 'post',
				        'hierarchical' 		=> false,
				        'rewrite' 			=> array( 'slug' => 'film' ),
				        'query_var' 		=> true,
				        'menu_icon' 		=> 'dashicons-format-video',
				        'supports' 			=> array(
				            'title',
				            'editor',
				            'excerpt',
				            'trackbacks',
				            'custom-fields',
				            'comments',
				            'revisions',
				            'thumbnail',
				            'author',
				            'page-attributes',
				        ),
				    ),
				'taxonomies' => array(
					array(
					 	'taxonomy' => 'film-genre',
						'posttype' => 'film',
						'args' => array(
							'label' => __( 'Film Genre' , UNITE_TD ),
							'rewrite' => array( 'slug' => 'film-genre' ),
							'hierarchical' => true,
						)
					),
					array(
					 	'taxonomy' => 'film-country',
						'posttype' => 'film',
						'args' => array(
							'label' => __( 'Film Country' , UNITE_TD ),
							'rewrite' => array( 'slug' => 'film-country' ),
							'hierarchical' => true,
						)
					),
					array(
					 	'taxonomy' => 'film-year',
						'posttype' => 'film',
						'args' => array(
							'label' => __( 'Film Year' , UNITE_TD ),
							'rewrite' => array( 'slug' => 'film-year' ),
							'hierarchical' => true,
						)
					),
					array(
					 	'taxonomy' => 'film-actor',
						'posttype' => 'film',
						'args' => array(
							'label' => __( 'Film Actor' , UNITE_TD ),
							'rewrite' => array( 'slug' => 'film-actor' ),
							'hierarchical' => true,
						)
					),
				),
			),
		);
	}
}