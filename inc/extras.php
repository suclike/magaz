<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Magaz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magaz_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( !is_singular() ) {
		$classes[] = 'hfeed';
	}

  // Adds a class of index to home page.
  if ( is_home() && !is_paged() ) {
    $classes[] = 'index';
  }

  // Adds a class of no-header-cover if the page is archive
  // and not category
  if ( is_archive() && !is_category() ) {
    $classes[] = 'no-header-cover';
  }

  // Adds a class of 'no-header-cover' to the archive and tag pages
  if ( is_archive() && is_tag() ) {
    $classes[] = 'no-header-cover';
  }

  // Adds a class of 'no-header-cover' to the search page
  if ( is_search() ) {
    $classes[] = 'no-header-cover';
  }

  // Adds a class of 'no-header-cover' index to home page if is paged
  if ( is_home() && is_paged() ) {
    $classes[] = 'no-header-cover';
  }

	return $classes;
}
add_filter( 'body_class', 'magaz_body_classes' );

/**
 * Adds `post--first` custom class to the latest post in the home page.
 */
function magaz_home_latest_post_card_class() {
  global $wp_query;

  if ( is_home() && !is_paged() ) {
    if( 0 == $wp_query->current_post ) {
      return 'post--first';
    }
  }
}

/**
 * Adds `large-6` custom class to the second and third post in the home page.
 */
function magaz_home_post_card_class( $classes ) {
  global $wp_query;

  if ( is_home() && !is_paged() ) {
    if( 1 == $wp_query->current_post || 2 == $wp_query->current_post ) {
      $classes[] = 'large-6';
    }
  }

  return $classes;
}
add_filter( 'post_class', 'magaz_home_post_card_class' );