<?php

/**
* Template Name: Contact
* Description: Used as a page template to show page contents, followed by a loop 
* through the "Contact" category
*/
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_parallax_script' );
		function parallax_enqueue_parallax_script() {
				wp_enqueue_script( 'parallax-script', get_bloginfo( 'stylesheet_directory' ) . '/js/contact.js', array( 'jquery' ), '1.0.0' );
		}

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action ('genesis_loop', 'home');

function home() {

		$direccion   = get_post_meta( 37, 'p6_location', true );
	$lat = get_post_meta( 37, 'p6_location_latitude', true );
	$lng = get_post_meta( 37, 'p6_location_longitude', true );
	$direccionhtml = get_post_meta( 37, 'p6_locationhtml', true );
	$telefono = get_post_meta( 37, 'p6_telefono', true );
	$telefonolink = preg_replace('/[^0-9]/', '', $telefono);
	echo '<div class="title-full"><a href="#contact"><h2>Co<span class="animated-letter-h2-static">n</span>tact</h2></a></div>';
	echo '<span class="acc-down"></span>';
	echo '<div id="fullpage-contact">';
		echo '<div class="section black">';
			echo '<span class="text-3">PURPOSE 2017</span>';
			echo '<span class="text-1">PUERTA 6</span>';

			echo '<div class="right-box">';
			echo do_shortcode('[gravityform id="1" title="false" description="false"]');
			echo '</div>';

			echo '<div class="left-box">';
			echo '<span>
			<p><strong>PUERTA 6</strong></br>
			<u><a href="#themap">'.$direccionhtml.'</a></u></p><a href="phone:'.$telefonolink.'">'.$telefono.'</a></span>';
			echo '</div>';
		echo '</div>';

		echo '<div class="section black map" data-anchor="themap">';
			echo '<span class="text-3">PURPOSE 2017</span>';
			echo '<span class="text-1">PUERTA 6</span>';
			echo '<div class="transparent"></div>';
			echo '<div id="mapfull"></div>';
			
		echo '</div>';

	echo '</div>';

	echo '<script>

      function initMap() {
        var myLatLng = {lat: '.$lat.', lng: '.$lng.'};

        var map = new google.maps.Map(document.getElementById("mapfull"), {
          zoom: 16,
          center: myLatLng,
          styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
        });
        var image = "'.get_site_url().'/wp-content/themes/genesis-starter-master/images/map-pin-marked.png";
        var marker = new google.maps.Marker({
   
          position: myLatLng,
          map: map,
          icon: image,
          title: "PUERTA6"
        });
      }

    </script>';

    echo '<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgVBZ35wRuziea5ShDzj82kVzp03UbHCo&callback=initMap">
    </script>';
}


genesis();