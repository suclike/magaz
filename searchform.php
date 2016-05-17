<?php
/**
 * Template for displaying search forms in Magaz
 *
 * @package Magaz
 */
?>

<form role='search' method='get' class='search-form' action='<?php echo esc_url( home_url( '/' ) ); ?>'>
  <label>
    <span class='screen-reader-text'><?php _ex( 'Search for:', 'label', 'magaz' ); ?></span>
    <input type='search' class='search-field' placeholder='<?php echo esc_attr_x( 'Search', 'placeholder', 'magaz' ); ?>' value='<?php echo esc_attr( get_search_query() ); ?>' name='s'>
  </label>
  <button type='submit' class='search-submit genericon button'>
    <span class='screen-reader-text'><?php _ex( 'Search', 'submit button', 'magaz' ); ?></span>
  </button>
</form>