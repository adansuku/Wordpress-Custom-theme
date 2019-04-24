<?php

/**
* Template Name: Studio
* Description: Used as a page template to show page contents, followed by a loop 
* through the "Studio" category
*/
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_parallax_script' );
		function parallax_enqueue_parallax_script() {
				wp_enqueue_script( 'parallax-script', get_bloginfo( 'stylesheet_directory' ) . '/js/studio.js', array( 'jquery' ), '1.0.0' );
		}
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action ('genesis_loop', 'home');

function home() {
	echo '<div class="title-full"><h2>T<span class="animated-letter-h2-static">h</span>e stud<span class="animated-letter-h2-static">i</span>o</h2></div>';
	echo '<div id="fullpage">';
		echo '<div class="section black">';
			echo '<h5 class="sub-title">THE BULLSHIT</br>ABOUT THE COMPANY</br>WHERE WE TALK ABOUT</br>HOW GOOD WE ARE</br>YOU KNOW..</h5>';
			echo '<span class="text-3">PUERTA 6</span>';
			echo '<span class="text-4">PURPOSE 2017</span>';
		echo '</div>';

		echo '<div class="section white">';
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
			echo '</div>';
			echo '<span class="text-1">COMPANY BULSHIT / 2017</span>';
			echo '<span class="text-4">GOOD: _ 17.00</span>';

			echo '<div class="right-box">';
				echo '<div class="element">';
				echo '<h3>'.get_the_title(27).'</h3>';
				$my_postid = 27;//This is page id or post id
				$content_post = get_post($my_postid);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);

				echo '<span>'.$content.'</span>';
			echo '</div>';

			echo '<div class="element">';
				echo '<h3>'.get_the_title(29).'</h3>';
				$my_postid = 29;//This is page id or post id
				$content_post = get_post($my_postid);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);

				echo '<span>'.$content.'</span>';
			echo '</div>';

			echo '<div class="element">';
				echo '<h3>'.get_the_title(30).'</h3>';
				$my_postid = 30;//This is page id or post id
				$content_post = get_post($my_postid);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);

				echo '<span>'.$content.'</span>';
			echo '</div>';

			echo '</div>';
		echo '</div>';

		echo '<div class="section black we no-title">';
		echo '<span class="text-1">COMPANY BULSHIT / 2017</span>';
			echo '<span class="text-4">GOOD: _ 17.00</span>';

		echo '<div class="left-box">';
		echo '<div class="element">';
			//echo '<div class="white-box first"></div>';
				echo '<div class="white-box" style="background: url('.get_the_post_thumbnail_url(31).');background-repeat:no-repeat;background-size:cover;"></div>';
				echo '<h3>'.get_the_title(31).'</h3>';
				$cargo   = get_post_meta( 31, 'p6_cargo', true );
				echo '<h5>'.$cargo.'</h5>';
				$my_postid = 31;//This is page id or post id
				$content_post = get_post($my_postid);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);

				echo '<span>'.$content.'</span>';
			echo '</div>';

		echo '<div class="element">';
				echo '<div class="white-box" style="background: url('.get_the_post_thumbnail_url(32).');background-repeat:no-repeat;background-size:cover;"></div>';
				echo '<h3>'.get_the_title(32).'</h3>';
				$cargo   = get_post_meta( 32, 'p6_cargo', true );
				echo '<h5>'.$cargo.'</h5>';
				$my_postid = 32;//This is page id or post id
				$content_post = get_post($my_postid);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);

				echo '<span>'.$content.'</span>';
			echo '</div>';

		echo '</div>';
		echo '</div>';
	echo '</div>';
}


genesis();