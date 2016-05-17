<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Magaz
 */

/**
 * Flush out the transients used in magaz_categorized_blog.
 */
function magaz_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'magaz_categories' );
}
add_action( 'edit_category', 'magaz_category_transient_flusher' );
add_action( 'save_post',     'magaz_category_transient_flusher' );