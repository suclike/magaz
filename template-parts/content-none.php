<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

?>

<div class='wrapper'>
  <div class='row'>
    <div class='large-9 column column--center'>

      <?php get_template_part( 'template-parts/page-header', 'none' ); ?>

      <main class='no-results not-none'>
        <?php get_template_part( 'template-parts/no-results' ); ?>
      </main>

    </div>
  </div>
</div>