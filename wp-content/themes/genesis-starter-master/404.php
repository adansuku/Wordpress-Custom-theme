<?php
/**
 * Genesis Starter.
 *
 * This file adds the 404 page template to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  SeoThemes
 * @license GPL-2.0+
 * @link    https://seothemes.com/themes/genesis-starter/
 */

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'starter_404' );


wp_enqueue_script( 'glitch', get_stylesheet_directory_uri() . '/js/glitch.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

wp_enqueue_script( 'html2canvas', get_stylesheet_directory_uri() . '/js/html2canvas.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

wp_enqueue_script( '404', get_stylesheet_directory_uri() . '/js/404.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

wp_enqueue_style( '404-css', get_stylesheet_directory_uri() . '/404.css', array(), CHILD_THEME_VERSION );
/**
 * This function outputs a 404 "Not Found" error message.
 *
 * @since 1.6
 */
function starter_404() {

	echo '<div class="title-full"><h2 class="glitch" data-text="ERROR404">ERROR404</h2></div>';
	echo '<canvas id="tv"></canvas>';

}

genesis();
