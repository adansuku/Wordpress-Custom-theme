<?php
/**
* Template Name: Works
* Description: Used as a page template to show page contents, followed by a loop 
* through the "Works" category
*/
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_parallax_script' );
            function parallax_enqueue_parallax_script() {
                        wp_enqueue_script( 'parallax-script', get_bloginfo( 'stylesheet_directory' ) . '/js/works.js', array( 'jquery' ), '1.0.0' );
                        wp_enqueue_script( 'pleaserotate', get_stylesheet_directory_uri() . '/js/pleaserotate.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
            }
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action('genesis_loop', 'works');

function works() {
$lastposts = get_posts( array(
    'post_type'   => 'works',
    'numberposts' => -1,
    'order' => 'ASC'
) );

echo '<div class="title-full"><h2>Wo<span class="animated-letter-h2-static">r</span>ks</h2></div>';
echo '<div id="fullpage-works">';
                  echo '<span class="text-1">PUERTA 6</span>';
                  echo '<span class="text-3">DESIGN AITOR GONZALEZ</span>';
echo '<div class="section black" data-anchor="project">';
	if ( $lastposts ) {
    $i = 1;
    $count = wp_count_posts($post_type = 'works')->publish;
    	foreach ( $lastposts as $post ) {
      	 	    $postID = $post->ID;
      	 	    $cliente   = get_post_meta( $postID, 'p6_cliente', true );
      	 	    $subtitulo   = get_post_meta( $postID, 'p6_subtitulo', true );
                      $year   = get_post_meta( $postID, 'p6_year', true );
      	 	    $spot = get_post_meta( $postID, 'as_spot', true );
                      $postcat = get_the_category( $post->ID );
                      $link = get_post_permalink( $post->ID );
      	 	    echo '<div class="slide" style="background:url('.get_the_post_thumbnail_url($postID).');background-position:50% 50%; background-size: cover;" data-anchor="'.$post->post_name.'">';
              echo '<div class="counter"><span>'.$i.' of '.$count.'</span></div>';
                        echo '<div class="wrap">';
      			echo '<div class="texto">';
      			echo '<a href="'.$link.'"><h1>'.get_the_title($postID).'</h1></a>';
                        echo '<h3>'.$subtitulo.'</h3>';
                        echo '<h3>CLIENT: '.$cliente.'</h3>';
                        echo '<h3>'.$postcat[0]->name.'</h3>';
                        echo '<h3>'.$year.'</h3>';
      			//echo '<p><span>'.do_shortcode($post->post_content).'</span>';
      			echo '</div>'; //Cierra texto
                        echo '</div>'; // Cierra Wrap
                        echo '<a class="a-project" href="'.$link.'"><span class="acc-project"></span></a>';
      			echo '</div>'; //Cierra Slide
            $i++;
    	}
      echo '</div>';

	}
echo '</div>';
}

genesis();