<?php
/**
 * Genesis Starter Theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.com/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

// Child theme (do not remove).
include_once( get_template_directory() . '/lib/init.php' );

// Define theme constants.
define( 'CHILD_THEME_NAME', 'Genesis Starter' );
define( 'CHILD_THEME_URL', 'https://seothemes.com/themes/genesis-starter' );
define( 'CHILD_THEME_VERSION', '2.2.3' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'genesis-starter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove unused site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Remove default titles.
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
remove_action( 'genesis_before_loop', 'genesis_do_search_title' );

// Add custom titles.
add_action( 'genesis_after_header', 'genesis_do_posts_page_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_date_archive_title', 24 );
add_action( 'genesis_after_header', 'genesis_do_blog_template_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_author_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_cpt_archive_title_description', 24 );

// Remove search results and shop page titles.
add_filter( 'woocommerce_show_page_title', '__return_null' );
add_filter( 'genesis_search_title_output', '__return_false' );

// Change order of main stylesheet to override plugin styles.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after_header_wrap', 'genesis_do_subnav' );

// Reposition footer widgets inside site footer.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_before_footer_wrap', 'genesis_footer_widget_areas', 5 );

// Enable shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Force Gravity Forms to disable CSS output.
add_filter( 'pre_option_rg_gforms_disable_css', '__return_true' );

// Enable support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

// Enable support for WooCommerce.
add_theme_support( 'woocommerce' );

// Enable support for structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'footer-widgets',
	'footer',
) );

// Enable Accessibility support.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links',
) );

// Enable custom navigation menus.
add_theme_support( 'genesis-menus' , array(
	'primary'   => __( 'Header Menu', 'genesis-starter' ),
	'secondary' => __( 'After Header Menu', 'genesis-starter' ),
) );

// Enable viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Enable HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
) );

// Enable support for post formats.
add_theme_support( 'post-formats', array(
	'aside',
	'audio',
	'chat',
	'gallery',
	'image',
	'link',
	'quote',
	'status',
	'video',
) );

// Enable support for post thumbnails.
add_theme_support( 'post-thumbnails' );

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background', array(
	'wp-head-callback' => 'wpse_189361_custom_background_cb',
	'default-color' => 'f4f5f6',
) );

// Enable logo option in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 60,
	'width'       => 240,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

// Display custom logo in site title area.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );


// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/hero.jpg',
		'thumbnail_url' => '%2$s/assets/images/hero.jpg',
		'description'   => __( 'Hero Image', 'genesis-starter' ),
	),
) );

// Register a custom layout.
genesis_register_layout( 'custom-layout', array(
	'label' => __( 'Custom Layout', 'genesis-starter' ),
	'img'   => get_stylesheet_directory_uri() . '/assets/images/custom-layout.gif',
) );

// Register front page widget areas.
genesis_register_sidebar( array(
	'id'           => 'front-page-1',
	'name'         => __( 'Front Page 1', 'genesis-starter' ),
	'description'  => __( 'Front page 1 widget area.', 'genesis-starter' ),
	'before_title' => '<h1 itemprop="headline">',
	'after_title'  => '</h1>',
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2',
	'name'        => __( 'Front Page 2', 'genesis-starter' ),
	'description' => __( 'Front page 2 widget area.', 'genesis-starter' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'genesis-starter' ),
	'description' => __( 'Front page 3 widget area.', 'genesis-starter' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-4',
	'name'        => __( 'Front Page 4', 'genesis-starter' ),
	'description' => __( 'Front page 4 widget area.', 'genesis-starter' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-5',
	'name'        => __( 'Front Page 5', 'genesis-starter' ),
	'description' => __( 'Front page 5 widget area.', 'genesis-starter' ),
) );

/**
 * Enqueue theme scripts and styles.
 *
 * @return void
 */
function starter_scripts_styles() {

	// Conditionally load WooCommerce styles.
	if ( starter_is_woocommerce_page() ) {
		wp_enqueue_style( 'starter-woocommerce', get_stylesheet_directory_uri() . '/assets/styles/min/woocommerce.min.css', array(), CHILD_THEME_VERSION );
	}

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	wp_enqueue_style( 'fullpage-css', get_stylesheet_directory_uri() . '/jquery.fullPage.css', array(), CHILD_THEME_VERSION );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Rubik:300,400,500,700', array(), CHILD_THEME_VERSION );

	// Enqueue custom theme scripts.
	wp_enqueue_script( 'genesis-starter', get_stylesheet_directory_uri() . '/assets/scripts/min/theme.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Enqueue responsive menu script.
	wp_enqueue_script( 'starter-menus', get_stylesheet_directory_uri() . '/assets/scripts/min/menus.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	wp_enqueue_script( 'animated-text', get_stylesheet_directory_uri() . '/js/animated-text.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	wp_enqueue_script( 'fullpage', get_stylesheet_directory_uri() . '/js/jquery.fullPage.js', array( 'jquery' ), CHILD_THEME_VERSION, true );


	wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', CHILD_THEME_VERSION, true );

	wp_enqueue_script( 'cool-menu', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Localize responsive menus script.
	wp_localize_script( 'starter-menus', 'genesis_responsive_menu', array(
		'mainMenu'         => __( 'Menu', 'genesis-starter' ),
		'subMenu'          => __( 'Menu', 'genesis-starter' ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
				'.nav-secondary',
			),
		),
	) );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts_styles', 999 );

// Load helper functions.
include_once( get_stylesheet_directory() . '/includes/helpers.php' );

// Load Customizer settings.
include_once( get_stylesheet_directory() . '/includes/customize.php' );

// Load default settings.
include_once( get_stylesheet_directory() . '/includes/defaults.php' );

// Load recommended plugins.
include_once( get_stylesheet_directory() . '/includes/plugins.php' );


// Header

add_action('genesis_header', 'logo');
function logo() {
	echo '	<a class="cd-nav-trigger cd-text-replace" href="#primary-nav">Menu<span aria-hidden="true" class="cd-icon"></span></a>';
	echo '	<a class="cd-logo-trigger" href="'. get_site_url() .'/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 99.94"><title>logo_svg</title><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><g id="NvIm9L"><path d="M4.63,0H55.39l.54.19a5.35,5.35,0,0,1,3.91,4.11c0,.16.11.31.16.47V95.12a.77.77,0,0,0-.11.19c-.71,3.13-2.59,4.62-5.8,4.62H5.88a7.7,7.7,0,0,1-1.77-.15A5.3,5.3,0,0,1,0,94.23Q0,50,0,5.77c0-.17,0-.35,0-.52a5.32,5.32,0,0,1,3.71-5ZM55,50q0-21.32,0-42.64c0-1.68-.48-2.17-2.16-2.17H7.18C5.44,5.17,5,5.67,5,7.45Q4.95,50,5,92.51c0,1.74.53,2.26,2.26,2.26H52.76c1.7,0,2.2-.51,2.2-2.22Q55,71.26,55,50Z"/><path d="M21.57,57.21h5.57c0-.31,0-.57,0-.84,0-2.21,0-4.41,0-6.62,0-1,.17-1.16,1.17-1.19.62,0,1.24,0,1.86,0,1,0,1.21.18,1.21,1.22,0,2.18,0,4.36,0,6.55,0,.27,0,.54,0,.87h6.78c0-1,0-1.92,0-2.85,0-1.66,0-3.32,0-5,0-1,.18-1.11,1.15-1.12h2.16c.6,0,.93.26.93.89q0,6.06,0,12.12a.75.75,0,0,1-.88.85c-.52,0-1,0-1.56,0H19l-.89,0a.68.68,0,0,1-.77-.71c0-.22,0-.45,0-.67q0-5.54,0-11.08c0-1.27.12-1.39,1.41-1.39.62,0,1.24,0,1.86,0s1,.39,1,1.07c0,2.36,0,4.71,0,7.07C21.57,56.64,21.57,56.91,21.57,57.21Z"/><path d="M16.92,25.09a11.7,11.7,0,0,1,1.87-6c.62-.95,1-1,1.84-.32l1.3,1c.87.68.9.89.2,1.73a4.56,4.56,0,0,0-1,4.24,4.08,4.08,0,0,0,.91,1.66A2.16,2.16,0,0,0,25.67,27,27.39,27.39,0,0,0,27.11,24c.45-1,.83-2,1.33-3,1.61-3.11,3.7-4.26,7.63-3.76,4.8.6,7.41,4.83,6.89,9.73a9.65,9.65,0,0,1-3.62,6.76c-.91.73-1.13.72-1.93-.09-.44-.44-.88-.88-1.29-1.34-.64-.7-.64-1.07.13-1.65a5.57,5.57,0,0,0,2.3-4.9,3.52,3.52,0,0,0-3.67-3.57,2.86,2.86,0,0,0-2.62,1.77c-.53,1.12-.94,2.29-1.42,3.43-.33.78-.66,1.55-1,2.31-2.28,4.82-8.1,4-10.51,1.62A8.5,8.5,0,0,1,16.92,25.09Z"/><path d="M43,75.79a9.65,9.65,0,0,1-3.73,7.33c-.87.7-1.09.67-1.88-.12-.42-.42-.84-.85-1.24-1.29-.72-.79-.73-1.11.13-1.75a5.53,5.53,0,0,0,2.25-4.85,3.51,3.51,0,0,0-4-3.53,2.92,2.92,0,0,0-2.29,1.81c-.51,1.1-.91,2.25-1.38,3.37q-.47,1.13-1,2.24c-2.32,5-8.68,4.19-11.11,1.06a8.85,8.85,0,0,1-1.37-8.31A17.38,17.38,0,0,1,19,68.24c.41-.75.85-.76,1.53-.25l1.36,1c1,.76,1,.92.23,1.89a4.51,4.51,0,0,0-.91,4.19,4.11,4.11,0,0,0,1,1.7,2.14,2.14,0,0,0,3.49-.37A22.2,22.2,0,0,0,27,73.71c.49-1.08.89-2.21,1.43-3.27,1.7-3.32,3.88-4.43,7.95-3.81S43,70.67,43,75.79Z"/><path d="M29.85,43.46H18.77c-1.37,0-1.45-.09-1.45-1.49,0-.69,0-1.39,0-2.08,0-1.15.15-1.3,1.27-1.31,1.31,0,2.63,0,3.94,0H40.61l1,0a.78.78,0,0,1,.84.9c0,1,0,2,0,3,0,.81-.19,1-1,1H29.85Z"/></g></g></g></svg></a>';
	echo '<nav class="cd-primary-nav" id="primary-nav">
		<ul>
			<!--<li class="cd-label">Navigation</li>-->
			<li><a href="'. get_site_url() .'/"><h2>Ho<span class="animated-letter-h2">m</span><span class="animated-letter-h2-e">e</span></h2></a></li>
			<li><a href="'. get_site_url() .'/works/"><h2>Wo<span class="animated-letter-h2">r</span>ks</h2></a></li>
			<li><a href="'. get_site_url() .'/the-studio/"><h2>T<span class="animated-letter-h2">h</span>e stud<span class="animated-letter-h2">i</span>o</h2></a></li>
			<li><a href="'. get_site_url() .'/contact/"><h2>Co<span class="animated-letter-h2">n</span>tact</h2></a></li>
		</ul>
	</nav>';

	if (is_front_page()) {
	echo '<div class="animateletter-container">
		<h1>W<span class="animated-letter-h1">e</span>lcome</h1>
	</div>';
	echo '<span class="text-1">PUERTA 6</span>';
	echo '<span class="text-2">DESIGN AITOR GONZALEZ</span>';
	echo '<span class="text-4">76’34”25 25FPS</span>';

	echo '<div class="socialbox">';
		echo '<a href="https://www.facebook.com/PuertaSeisTv/"><span class="fb"></a>';
		echo '<a href="https://www.instagram.com/puertaseistv"><span class="in"></a>';
		echo '<a href="https://vimeo.com/user36818506"><span class="vi"></a>';

	echo '</div>';

	echo '<div class="homepage-hero-module">
    <div class="video-container">
        <div class="filter"></div>
        <video autoplay loop class="fillWidth">
            <source src="'.get_stylesheet_directory_uri().'/video/reel.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
            <source src="'.get_stylesheet_directory_uri().'/video/reel.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>
        </div>
    </div>';
	}
}

function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js", array(), '3.2.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);


/* Trabajos */

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'works',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Works' ),
                'singular_name' => __( 'Work' )
            ),
            'public' => true,
            'rewrite' => array('slug' => 'works'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category', 'post_tag'),
        )
    );

    register_post_type( 'studio',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'The Studio' ),
                'singular_name' => __( 'Studio Item' )
            ),
            'public' => true,
            'rewrite' => array('slug' => 'studio'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );

    register_post_type( 'contact',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Contact' ),
                'singular_name' => __( 'Contact Page' )
            ),
            'public' => true,
            'rewrite' => array('slug' => 'contact'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );

}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

add_action ( 'cmb2_admin_init', 'studio_meta');

function studio_meta()	{

	$prefix = 'p6_';

	$cmb = new_cmb2_box( array(
		'id'            => 'test_metabox_2',
		'title'         => __( 'Info adicional', 'cmb2' ),
		'object_types'  => array( 'studio', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

		$cmb->add_field( array(
		'name'       => __( 'Cargo actual', 'cmb2' ),
		'desc'       => __( 'Nombre del cargo', 'cmb2' ),
		'id'         => $prefix . 'cargo',
		'type'       => 'text',
		) );
}

add_action ( 'cmb2_admin_init', 'contact_meta');

function contact_meta()	{

	$prefix = 'p6_';

	$cmb = new_cmb2_box( array(
		'id'            => 'test_metabox_3',
		'title'         => __( 'Contact Info', 'cmb2' ),
		'object_types'  => array( 'contact', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

		$cmb->add_field( array(
		'name' => 'Dirección Google Maps',
		'desc' => 'También puedes arrastrar el marcador',
		'id' => $prefix . 'location',
		'type' => 'pw_map',
		'split_values' => true, // Save latitude and longitude as two separate fields
		) );

		$cmb->add_field( array(
		'name'       => __( 'Dirección HTML', 'cmb2' ),
		'desc'       => __( 'Para saltos de línea usar </br>', 'cmb2' ),
		'id'         => $prefix . 'locationhtml',
		'type'       => 'wysiwyg',
		) );

		$cmb->add_field( array(
		'name'       => __( 'Teléfono', 'cmb2' ),
		'desc'       => __( 'Número de teléfono', 'cmb2' ),
		'id'         => $prefix . 'telefono',
		'type'       => 'text',
		) );
}

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'p6_';


	/**
	 * Initiate the metabox*/
	 
	$cmb = new_cmb2_box( array(
		'id'            => 'test_metabox',
		'title'         => __( 'Información Proyecto', 'cmb2' ),
		'object_types'  => array( 'works', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name'       => __( 'Cliente', 'cmb2' ),
		'desc'       => __( 'Nombre del cliente', 'cmb2' ),
		'id'         => $prefix . 'cliente',
		'type'       => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Subtítulo', 'cmb2' ),
		'desc' => __( 'Entradilla', 'cmb2' ),
		'id'   => $prefix . 'subtitulo',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Fecha', 'cmb2' ),
		'desc' => __( 'Fecha completa', 'cmb2' ),
		'id'   => $prefix . 'fecha',
		'type' => 'text_date',
		'date_format' => 'm.d.Y',
	) );

	$cmb->add_field( array(
		'name' => __( 'Año', 'cmb2' ),
		'desc' => __( 'Año', 'cmb2' ),
		'id'   => $prefix . 'year',
		'type' => 'text',
	) );


	$cmb->add_field( array(
		'name' => __( 'Texto Principal', 'cmb2' ),
		'desc' => __( 'Sobre el proyecto', 'cmb2' ),
		'id'   => $prefix . 'text',
		'type' => 'wysiwyg',
	) );

	$cmb->add_field( array(
		'name' => __( 'ID de Vimeo', 'cmb2' ),
		'desc' => __( 'https://vimeo.com/<b>242952674</b>', 'cmb2' ),
		'id'   => $prefix . 'vimeo',
		'type' => 'text',
	) );


	

	// Add other metaboxes as needed

}


/*
 * Replacement for get_adjacent_post()
 *
 * This supports only the custom post types you identify and does not
 * look at categories anymore. This allows you to go from one custom post type
 * to another which was not possible with the default get_adjacent_post().
 * Orig: wp-includes/link-template.php 
 * 
 * @param string $direction: Can be either 'prev' or 'next'
 * @param multi $post_types: Can be a string or an array of strings
 */
function mod_get_adjacent_post($direction = 'prev', $post_types = 'post') {
    global $post, $wpdb;

    if(empty($post)) return NULL;
    if(!$post_types) return NULL;

    if(is_array($post_types)){
        $txt = '';
        for($i = 0; $i <= count($post_types) - 1; $i++){
            $txt .= "'".$post_types[$i]."'";
            if($i != count($post_types) - 1) $txt .= ', ';
        }
        $post_types = $txt;
    }

    $current_post_date = $post->post_date;

    $join = '';
    $in_same_cat = FALSE;
    $excluded_categories = '';
    $adjacent = $direction == 'prev' ? 'previous' : 'next';
    $op = $direction == 'prev' ? '<' : '>';
    $order = $direction == 'prev' ? 'DESC' : 'ASC';

    $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type IN({$post_types}) AND p.post_status = 'publish'", $current_post_date), $in_same_cat, $excluded_categories );
    $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

    $query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5($query);
    $result = wp_cache_get($query_key, 'counts');
    if ( false !== $result )
        return $result;

    $result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
    if ( null === $result )
        $result = '';

    wp_cache_set($query_key, $result, 'counts');
    return $result;
}

// Compatibilidad IE

wp_enqueue_script( 'ie-js', '//code.jquery.com/jquery-1.12.4.min.js' );
wp_script_add_data( 'ie-js', 'conditional', 'lt IE 9' );

add_filter( 'cmb2_render_pw_map', function() {
	wp_deregister_script( 'pw-google-maps-api' );
	wp_register_script( 'pw-google-maps-api', '//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAgVBZ35wRuziea5ShDzj82kVzp03UbHCo', null, null );
}, 12 );

function wpse_189361_custom_background_cb() {
    if (is_front_page()) {
    ob_start();

    _custom_background_cb(); // Default handler

    $style = ob_get_clean();
    $style = str_replace( 'body.custom-background', '.home .site-container', $style );

    echo $style;
    }
}
add_action('genesis_init', 'wpse_189361_custom_background_cb');