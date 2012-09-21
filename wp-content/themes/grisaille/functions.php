<?php


if ( ! isset( $content_width ) )
	$content_width  = '590';



if ( ! isset( $themecolors ) ) {
	$themecolors = array(
		'bg' => 'efedee',
		'text' => '464545',
		'link' => 'f9c11a',
		'border' => 'cccccc',
		'url' => 'f9c11a',
	);
}

function grisaille_setup_theme() {

	add_theme_support( 'automatic-feed-links' );

	/**
	* Add Menu Support
	**/

	register_nav_menu( 'main', 'Primary Navigation' );

	/**
	* Add editor style - recommended according to Theme-Check
	**/
	add_editor_style();


	// Custom backgrounds support
	$args = array(
		'default-color' => 'efedee',
		'default-image' => get_template_directory_uri() . '/images/background.jpg',
	);

	$args = apply_filters( 'grisaille_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}

	/**
	* Thumbnail support
	**/

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 590, 275, true ); // 590 pixels wide by 275 pixels tall, hard crop mode
	add_image_size( 'following-post-thumbnails', 250, 200, true ); // 250 pixels wide by 200 pixels tall, hard crop mode

}

add_action( 'after_setup_theme', 'grisaille_setup_theme' );

// THIS LINKS THE THUMBNAIL TO THE POST PERMALINK
add_filter( 'post_thumbnail_html', 'grisaille_post_image_html', 10, 3 );
function grisaille_post_image_html( $html, $post_id, $post_image_id ) {

	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';

	return $html;
}



/**
* Change Excerpt length
**/
function grisaille_new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'grisaille_new_excerpt_length');

/**
* Change excerpt [...] to something else
**/

function grisaille_new_excerpt_more($more) {
    global $post;
	return ' ... <br /><a class="more-link" href="'. get_permalink($post->ID) . __('">keep reading</a>', 'grisaille');
}
add_filter('excerpt_more', 'grisaille_new_excerpt_more');

	
/**
* Enqueue Google font API for front end only fonts
**/
function grisaille_enqueue_styles() {
   		 wp_enqueue_style( 'grisialle-fonts', 'http://fonts.googleapis.com/css?family=Marvel|Bigshot+One');  		   		   		       		           
}     
add_action('wp_print_styles', 'grisaille_enqueue_styles'); 

/**
* Enqueue Google font API in admin
**/
function grisaille_admin_init() {
       wp_enqueue_style('BigshotOne', 'http://fonts.googleapis.com/css?family=Bigshot+One');
}
add_action( 'admin_init', 'grisaille_admin_init' );

 
/**
* checks if the visitor is browsing either a page or a post and adds the 
* JavaScript required for threaded comments if they are
**/
function grisaille_queue_js(){
  if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('get_header', 'grisaille_queue_js');

/**
* register_sidebar()
**/

add_action( 'widgets_init', 'grisaille_register_sidebars' );

function grisaille_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'grisaillesidebar',
			'name' => __( 'Grisaille Sidebar', 'grisaille' ),
			'description' => __( 'Main right sidebar.', 'grisaille' ),
			'before_widget' => '<div class="sidebaritem">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}	

/**
* Load the Theme Options Page for social media icons
*/
require_once ( get_template_directory() . '/inc/theme-options.php' );


/**
* Loads the theme's translated strings
*/

add_action('after_setup_theme', 'grisaille_language_theme_setup');
function grisaille_language_theme_setup(){
    load_theme_textdomain('grisaille', get_template_directory() . '/lang');
}	

require( get_template_directory() . '/inc/custom-header.php' );