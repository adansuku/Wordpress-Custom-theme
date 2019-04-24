<?php

add_action( 'wp_enqueue_scripts', 'parallax_enqueue_parallax_script' );
		function parallax_enqueue_parallax_script() {
				wp_enqueue_script( 'work-script', get_bloginfo( 'stylesheet_directory' ) . '/js/work.js', array( 'jquery' ), '1.0.0' );
				wp_enqueue_script( 'player-script', get_bloginfo( 'stylesheet_directory' ) . '/js/player.js', array( 'jquery' ), '1.0.0' );
				wp_enqueue_script( 'pleaserotate', get_stylesheet_directory_uri() . '/js/pleaserotate.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
		}

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action('genesis_loop', 'work_template');

function work_template() {
	if (is_singular( 'works' ) ) {



			//echo '<div class="your-class">
  			//		<div>your content</div>
  			//		<div>your content</div>
  			//		<div>your content</div>
  			//	</div>';

			
			
			$postID = get_the_ID();
      	 	$cliente   = get_post_meta( $postID, 'p6_cliente', true );
      	 	$subtitulo   = get_post_meta( $postID, 'p6_subtitulo', true );
            $year   = get_post_meta( $postID, 'p6_year', true );
            $fecha   = get_post_meta( $postID, 'p6_fecha', true ); 
            $text   = get_post_meta( $postID, 'p6_text', true );
            $vimeo   = get_post_meta( $postID, 'p6_vimeo', true );
            $postcat = get_the_category( $post->ID );
            // Get the queried object and sanitize it
			$current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
			// Get the page slug
			$slug = $current_page->post_name;


    echo '<a id="arrow-up" href="'. get_site_url() .'/works/#project/'.$slug.'"><span class="acc-project"></span></a>';
    echo '<span class="acc-down"></span>';        
 	echo '<div id="fullpage-work" >';
 	// echo '<div class="overlay"></div>';
 	// Retrieve the first gallery in the post
 	$gallery = get_post_gallery_images( $post );


	// Loop through each image in each gallery
	foreach( array_chunk($gallery, 2) as $image_url ) {

		$valoresA = getimagesize($image_url[0]);
		$widthA =  $valoresA[0];
		$heightA = $valoresA[1];

		if ($image_url[1] != null) { 
		$valoresB = getimagesize($image_url[1]);
		$widthB =  $valoresB[0];
		$heightB = $valoresB[1];

		if ( $widthA > $heightA || $widthB > $heightB) {
					$image_list = '<div class="section white">';
					$image_list .=  '<span class="text-3">PROJECT DETAILS</span>';
                  	$image_list .=  '<span class="text-4">'.get_the_title().'/ DATE '.$fecha.'</span>';
					$image_list .= '<span class="comp-image" style="width: 100%;background: #fff;display: inline-block;text-align: center;">';
					//$image_list .= '<img style="max-height:500px;display:inherit" src="' . $image_url . '">';
					$image_list .= '<img style="max-height:500px;display:inherit;margin-right:2px;" src="' .$image_url[0]. '">';
					$image_list .= '</span>';
					$image_list .= '</div>';

					$image_list .= '<div class="section white">';
										$image_list .=  '<span class="text-3">PROJECT DETAILS</span>';
                  	$image_list .=  '<span class="text-4">'.get_the_title().'/ DATE '.$fecha.'</span>';
					$image_list .= '<span class="comp-image" style="width: 100%;background: #fff;display: inline-block;text-align: center;">';
					//$image_list .= '<img style="max-height:500px;display:inherit" src="' . $image_url . '">';
					$image_list .= '<img style="max-height:500px;display:inherit;margin-right:2px;" src="' .$image_url[1]. '">';
					$image_list .= '</span>';
					$image_list .= '</div>';

					echo $image_list;
		} else {
						$image_list = '<div class="section white">';
											$image_list .=  '<span class="text-3">PROJECT DETAILS</span>';
                  	$image_list .=  '<span class="text-4">'.get_the_title().'/ DATE '.$fecha.'</span>';
		$image_list .= '<span class="comp-image" style="width: 100%;background: #fff;display: inline-block;text-align: center;">';
		//$image_list .= '<img style="max-height:500px;display:inherit" src="' . $image_url . '">';
		$image_list .= '<img style="max-height:500px;display:inherit;margin-right:2px;" src="' . implode('"><img style="max-height:500px;display:inherit" src="', $image_url).'">';
		$image_list .= '</span>';
		$image_list .= '</div>';
			echo $image_list;

		}

	} else {
		$image_list = '<div class="section white">';
							$image_list .=  '<span class="text-3">PROJECT DETAILS</span>';
                  	$image_list .=  '<span class="text-4">'.get_the_title().'/ DATE '.$fecha.'</span>';
		$image_list .= '<span class="comp-image" style="width: 100%;background: #fff;display: inline-block;text-align: center;">';
		//$image_list .= '<img style="max-height:500px;display:inherit" src="' . $image_url . '">';
		$image_list .= '<img style="max-height:500px;display:inherit;margin-right:2px;" src="' .$image_url[0]. '">';
		$image_list .= '</span>';
		$image_list .= '</div>';
			echo $image_list;

	}

	}
	if ($vimeo != '') {
	echo '<div class="section black vimeo">';
		echo '<iframe style="border:none; position: relative; padding: 0%; height: 40%; width: 60%; margin: 0 auto;" src="https://player.vimeo.com/video/'.$vimeo.'" width="100%" height="100%" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	echo '</div>';
	}


	echo '<div class="section white large">';
	echo '<div class="wrap">';
				echo '<div class="social">';
				echo '<div class="a2a_kit a2a_default_style">
				<div class="a2a_dd share"><span>SHARE: </span></div>
    <a class="a2a_button_facebook">
        <img src="'.get_home_url().'/wp-content/themes/genesis-starter-master/images/facebook-icon.png" border="0" alt="Facebook" width="27" height="27">
    </a>
    <a class="a2a_button_twitter">
        <img src="'.get_home_url().'/wp-content/themes/genesis-starter-master/images/twitter-icon.png" border="0" alt="Twitter" width="27" height="27">
    </a>
    <a class="a2a_button_google_plus">
        <img src="'.get_home_url().'/wp-content/themes/genesis-starter-master/images/google-icon.png" border="0" alt="Google+" width="27" height="27">
    </a>
</div>

<script async src="https://static.addtoany.com/menu/page.js"></script>';
				echo '</div>';
      			echo '<div class="texto">';
      			echo '<h1>'.get_the_title($postID).'</h1>';
                        echo '<h3>'.$subtitulo.'</h3>';
                        echo '<h3>CLIENT: '.$cliente.'</h3>';
                        echo '<h3>'.$postcat[0]->name.'</h3>';
                        echo '<h3>'.$year.'</h3>';
      			//echo '<p><span>'.do_shortcode($post->post_content).'</span>';
      			echo '</div>';
      	echo '<div class="full-container">';
      	echo '<div class="one-half first">';
      		echo '<span class="texto">';
      		echo $text;
      		echo '</span>';
      	echo '</div>';

      	echo '<div class="one-half">';
      		echo '<div class="align-right">';
      			$post_tags = get_the_tags();
 
				if ( $post_tags ) {
    			foreach( $post_tags as $tag ) {
    			echo '<span class="tag">#' . $tag->name . '</span>'; 
    			}
			}
      		echo '</div>';
      	echo '</div>';
      echo '</div>';
    echo '</div>';
	echo '</div>';

	echo '<div class="section black last">';
	//echo '<a href="'.next_post_link().'"><span class="fp-controlArrow fp-next"></span></a>';
	$next = mod_get_adjacent_post('next', array('works'));
	if($next) {
		echo '<a href="'.get_permalink($next->ID).'"><span class="fp-controlArrow fp-next"></span></a>';
	}
	
	echo '</div>';
	echo '</div>';





		
	}
}
	
genesis();