<?php


/**
 * Functions for the Verona Books Theme
 */
if( ! defined( 'ABSPATH' ) ) {
	return;
}

if ( ! function_exists( 'books_setup' ) ) :
	/**
	 * Verona Books Theme Setup
	 * @return void
	 */
	function books_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'books', get_template_directory() . '/languages' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary' 	=> __( 'Primary Menu', 'books' ),
			'footer' 	=> __('Footer Menu', 'books' )
		) );
	}
endif;
add_action( 'after_setup_theme', 'books_setup' );

add_action( 'wp_enqueue_scripts', 'books_enqueue_scripts_styles' );
function books_enqueue_scripts_styles() {
	wp_enqueue_style( 'books-style', get_stylesheet_uri() );
}

/**
 * Filter the excerpt length to 50 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function books_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'books_excerpt_length', 999 );
