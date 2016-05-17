<?php
/**
 * Template part for displaying the Posts pagination.
 *
 * @package Magaz
 */

?>

<?php
  the_posts_navigation( array(
    'prev_text'          => '<div class="column"><div class="pagination__icon" data-icon="ei-chevron-left"></div> <span class="pagination__text pagination__text--with-icon">' . esc_html__( 'Older', 'magaz' ) . ' </span></div>',
    'next_text'          => '<div class="column"><span class="pagination__text pagination__text--with-icon">' . esc_html__( 'Newer', 'magaz' ) . ' </span><div class="pagination__icon" data-icon="ei-chevron-right"></div></div>',
    'screen_reader_text' => esc_html__( 'Posts navigation', 'magaz' )
  ) );
?>