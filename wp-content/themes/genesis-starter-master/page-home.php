<?php

/**
* Template Name: Home
* Description: Used as a page template to show page contents, followed by a loop 
* through the "Home" category
*/
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_parallax_script' );
		function parallax_enqueue_parallax_script() {
				wp_enqueue_script( 'parallax-script', get_bloginfo( 'stylesheet_directory' ) . '/js/home.js', array( 'jquery' ), '1.0.0' );
		}
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action ('genesis_loop', 'home');

function home() {
	echo '<div class="black">
		<h1>W<span class="animated-letter-h1">e</span>lcome</h1>
	</div>';
}


genesis();