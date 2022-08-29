<?php
/*This file is part of ProsperitySustainablePopulation, greennature child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/


if ( ! function_exists( 'propserity_sustainable_population_enqueue_child_styles' ) ) {
	function propserity_sustainable_population_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'greennature-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'greennature-style' );
	    // loading child style
	    wp_register_style(
	      'prosperity-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'prosperity-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'propserity_sustainable_population_enqueue_child_styles' );

/**
 * Registers a stylesheet.
 */
function  ptsustain_register_plugin_styles() {
    wp_register_style( 'ptsustain-responsive-css', get_stylesheet_directory_uri() . '/stylesheet/style-responsive.css' );
    wp_enqueue_style( 'ptsustain-responsive-css' );
}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'ptsustain_register_plugin_styles' );

add_action( 'wp_enqueue_scripts', 'propserity_sustainable_population_deregister_styles', 11 );
function propserity_sustainable_population_deregister_styles() {
	/* Deregister the parent theme stylesheet.
		This is quite a hack. Seems like using the admin to make sure they are not containing
		the wrong data would be a better solution.
	*/
	wp_dequeue_style( 'style-responsive-css' );
	wp_dequeue_style( 'style-custom-css' );
}

/**
 * Override GreenNature WooCommerce Nav Button
 */
function greennature_get_woocommerce_nav( $icon_style = 'dark' ){
	return null;
}
