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
	echo '<a href="' . site_url() .'" class="navbar-item navbar-logo-link" rel="home" aria-current="page"><img src="'. get_logo_thumbnail()  .'" class="custom-logo" alt="'.get_bloginfo('name').'" decoding="async"></a>';
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


function the_numeric_posts_nav() {
  
    if( is_singular() )
        return;
  
    global $wp_query;
  
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
  
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
  
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
  
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
  
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
  

	echo '<section><nav class="pagination is-centered" role="navigation" aria-label="pagination">'  . "\n";
	echo '<ul class="pagination-list">';
    // echo '<div class="navigation wp-pagenavi"><ul>' . "\n";
  
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
  
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' is-current' : '';
  
        printf( '<li><a class="pagination-link%s" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
  
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
  
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' is-current' : '';
        printf( '<li><a class="pagination-link%s" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
  
        $class = $paged == $max ? ' is-current' : '';
        printf( '<li><a class="pagination-link%s" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
  
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li >%s</li>' . "\n", get_next_posts_link() );
  
    echo '</ul></nav</section>' . "\n";
}


function my_theme_posts_link_prev_attributes() {
    return 'class="pagination-previous"';
}


function my_theme_posts_link_next_attributes() {
    return 'class="pagination-next"';
}

add_filter('previous_posts_link_attributes', 'my_theme_posts_link_prev_attributes');
add_filter('next_posts_link_attributes', 'my_theme_posts_link_next_attributes');


