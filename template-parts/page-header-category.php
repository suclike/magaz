<?php
/**
 * Template part for displaying the category page header info.
 * Template part for displaying the content-none page header info.
 *
 * @package Magaz
 */

?>

<div class='header-box'>
  <header class='box box--full-padding'>
    <div data-icon='ei-tag' data-size='s' class='box__icon'></div>
    <div class='box__body'>
      <h4 class='box__title'>
        <?php the_archive_title(); ?>
      </h4>

      <?php if (get_the_archive_description()) : ?>
        <p class='box__text'>
          <?php the_archive_description(); ?>
        </p>
      <?php endif; ?>

      <?php if ( ! have_posts() ) : ?>
        <div class='box__text'>
          <hr>
          <?php get_template_part( 'template-parts/no-results' ); ?>
        </div>
      <?php endif; ?>
    </div>
  </header>
</div>