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
 * Localize Script.
 *
 * Send required variables as javascript object.
 *
 * @return void
 */
function propserity_sustainable_population_localize_script() {

	$pop_count_vars = [
		'population_count_copy' => __('Many billion and counting...', 'prosperity-through-sustainable-population')
	];

	wp_localize_script('prosperity-population-js', 'ptsp_script_vars', $pop_count_vars);
}

function propserity_sustainable_population_enqueue_scripts(){

	wp_register_script( 'prosperity-population-js', get_stylesheet_directory_uri() . '/js/main.js', ['jquery'], '1.0.0', true );
	wp_enqueue_script( 'prosperity-population-js' );

	propserity_sustainable_population_localize_script();

}
add_action( 'wp_enqueue_scripts', 'propserity_sustainable_population_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'propserity_sustainable_population_enqueue_scripts' );


/**
 * Population Count Shortcode
 */
add_shortcode('population-count', function($atts, $content){
	$atts = shortcode_atts(
		array(
				'id' => 'population-count-container'
		), $atts);

	return sprintf('<span id="%1$s" class="population-count-count"></span>',
									$atts['id'],
								);
});

/**
 * Override GreenNature WooCommerce Nav Button
 */
function greennature_get_woocommerce_nav( $icon_style = 'dark' ){
	return null;
}
