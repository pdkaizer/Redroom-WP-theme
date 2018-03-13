<?php

// ******************* Sidebars ****************** //

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Pages',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

// ******************* Add Custom Menus ****************** //

add_theme_support( 'menus' );


// ******************* Add HTML5 search form support ****************** //

add_theme_support('html5', array('search-form'));

// ******************* Add Custom Excerpt Lengths ****************** //

function wpe_excerptlength_index($length) {
    return 160;
}
function wpe_excerptmore($more) {
    return '...<a href="'. get_permalink().'">Read More ></a>';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

// ******************* Add Post Thumbnails ****************** //

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 160, 160, true );
add_image_size( 'category-thumb', 300, 300, true );


// ******************* Numbered Pagination ****************** //

if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
		$next_arrow = is_rtl() ? '&larr;' : '&rarr;';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}


// ******************* Add Shortcode ****************** //

function secondaryCallout($atts, $content = null) {
	extract(shortcode_atts(array(
	'link'	=> '#',
    'link_title'	=> '',
    'content'	=> '',
    ), $atts));

	$out = '
		<div class="secondaryCallout tertiaryColorBkg">
			'.$content.' <a class="secondaryColorText" title="'.$link_title.'" href="'.$link.'">'.$link_title.' &gt;</a>
		</div>
	';

    return $out;
}
 
add_shortcode('secondary_callout', 'secondaryCallout');

add_filter('widget_text', 'do_shortcode');

// ******************* Include jQuery Properly ****************** //

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

/*** Register Google fonts for Red Room.***/

function ggl_load_styles() {
  if (!is_admin()) {
    wp_register_style('googleFont', 'http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700');
    wp_enqueue_style('ggl', get_stylesheet_uri(), array('googleFont') );
  }
}
add_action('wp_enqueue_scripts', 'ggl_load_styles');

add_filter( 'wpcf7_validate_configuration', '__return_false' );


//********** Enqueue scripts and styles. *************//

function red_room_scripts() {
	// Load our main stylesheet.
	wp_enqueue_style( 'red-room-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'red_room_scripts' );


?>