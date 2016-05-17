<?php
/**
 * Template part for displaying the Previous/next post navigation..
 *
 * @package Magaz
 */

?>

<?php

  the_post_navigation( array(
    'next_text' => '<span class="meta-nav" aria-hidden="true"><span class="pagination__text pagination__text--with-icon">' . esc_html__( 'Next', 'magaz' ) . '</span><span class="pagination__icon" data-icon="ei-chevron-right" data-size="s"></span></span> ' .
    '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'magaz' ) . '</span>' .
    '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true"><span class="pagination__icon" data-icon="ei-chevron-left" data-size="s"></span><span class="pagination__text pagination__text--with-icon">' . esc_html__( 'Previous', 'magaz' ) . '</span></span>' .
    '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'magaz' ) . '</span>' .
    '<span class="post-title">%title</span>',
  ) );

?>