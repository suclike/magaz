<?php
/**
 * Template part for displaying the archive page header info.
 *
 * @package Magaz
 */

?>

<div class='box box--has-border'>

  <?php if (is_day() || is_month() || is_year()) : ?>
    <div data-icon='ei-clock' data-size='s' class='box__icon'></div>
  <?php else: ?>
    <div data-icon='ei-tag' data-size='s' class='box__icon'></div>
  <?php endif; ?>

  <div class='box__body'>
    <h4 class='box__title'>
      <?php the_archive_title(); ?>
    </h4>
    <?php if (get_the_archive_description()) : ?>
      <p class='box__text'>
        <?php the_archive_description(); ?>
      </p>
    <?php endif; ?>
  </div>

</div>