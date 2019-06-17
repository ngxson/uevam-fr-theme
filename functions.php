<?php
/*This file is part of catch-adaptive-child, catch-adaptive child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function catch_adaptive_child_enqueue_child_styles() {
	$theme = wp_get_theme('catch-adaptive');
	$version = $theme->get('Version');
	wp_enqueue_style(
		'parent-style',
		get_template_directory_uri().'/style.css',
		array(),
		$version
	);
	wp_enqueue_style(
		'override-style',
		get_stylesheet_directory_uri().'/css/override.css',
		array(),
		$version
	);
}
add_action( 'wp_enqueue_scripts', 'catch_adaptive_child_enqueue_child_styles' );

/*Write here your own functions */

function custom_header() {
    if (is_home() || is_front_page()) {
        echo do_shortcode('[recent_post_slider design="design-2"]');
    }
}

add_action('catchadaptive_header', 'custom_header', 60);
