<?php

function feed_setup(){
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'feedpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

}
add_action( 'after_setup_theme', 'feed_setup' );


function feed_scripts() {
	wp_enqueue_style( 'feed-style', get_stylesheet_uri(), array() );
	// wp_style_add_data( 'feed-style', 'rtl', 'replace' );
}

add_action( 'wp_enqueue_scripts', 'feed_scripts' );

function get_logo_thumbnail(){
	global $post;

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	return $image[0];
}

function the_logo_thumbnail(){
	echo '<a href="' . site_url() .'" class="navbar-item" rel="home" aria-current="page"><img src="'. get_logo_thumbnail()  .'" class="custom-logo" alt="'.get_bloginfo('name').'" decoding="async"></a>';
}


function add_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/assets/favicon.ico" />';
}

// add_action('wp_head', 'add_favicon');


function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
	if ( is_tag() ){
		$title = single_tag_title( '', false );
	}
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );


function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'is-active ';
  }
  return $classes;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

if ( !class_exists('Feed_Nav_Walker') ) {
    class Feed_Nav_Walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
			// $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
	 
			// var_dump( $item );

			// echo $item->post_title;


			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names .= in_array("current_page_item", $item->classes) ? ' is-active' : '';
			// $class_names = ' class="'. esc_attr( $class_names ) . '"';

			if ($item->url && $item->url != '#') {
				$output .= '<a class="navbar-item'. esc_attr( $class_names ) . '" href="' . $item->url . '">';
			} else {
				$output .= '<span>';
			}
	 
			$output .= $item->title;
	 
			if ($item->url && $item->url != '#') {
				$output .= '</a>';
			} else {
				$output .= '</span>';
			}
	 
			if ($args->walker->has_children) {
				$output .= '<i class="caret fa fa-angle-down"></i>';
			}

		}
    }
}

// function remove_ul ( $menu ){
	// return "";
    // return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
// }
// add_filter( 'wp_nav_menu', 'remove_ul' );


function psuedopagination(){
	echo '<nav class="pagination is-centered" role="navigation" aria-label="pagination">
	<a class="pagination-previous">Previous</a>
	<a class="pagination-next">Next page</a>
	<ul class="pagination-list">
	  <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
	  <li><span class="pagination-ellipsis">&hellip;</span></li>
	  <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
	  <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
	  <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
	  <li><span class="pagination-ellipsis">&hellip;</span></li>
	  <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
	</ul>
  </nav>';
}