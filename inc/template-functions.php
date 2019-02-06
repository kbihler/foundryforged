<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Foundry_Forged
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function foundryforged_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
  }
  
  // add a class telling us if the sidebar is in use.

  if ( is_active_sidebar( 'sidebar-1' )) {
    $classes[] = 'has-sidebar';
  } else {
    $classes[] = 'no-sidebar';
  }

	return $classes;
}
add_filter( 'body_class', 'foundryforged_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function foundryforged_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'foundryforged_pingback_header' );
