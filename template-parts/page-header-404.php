<?php
/**
 * Template part for displaying the 404 page header info.
 *
 * @package Magaz
 */

?>

<div class='header-box'>
  <header class='box box--full-padding'>
    <div data-icon='ei-exclamation' data-size='s' class='box__icon'></div>
    <div class='box__body'>
      <h4 class='box__title'>
        <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'magaz' ); ?>
      </h4>
      <div class='box__text'>
        <?php get_template_part( 'template-parts/no-results' ); ?>
      </div>
    </div>
  </header>
</div>