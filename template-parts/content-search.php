<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

?>

<div class='wrapper'>
  <div class='row'>

    <div class='large-12 column column--center'>
      <header class='box box--has-border'>
        <div data-icon='ei-search' data-size='s' class='box__icon'></div>
        <div class='box__body'>
          <h4 class='box__title'>
            <?php printf( esc_html__( 'Search Results for: %s', 'magaz' ), '<span>' . get_search_query() . '</span>' ); ?>
          </h4>
        </div>
      </header>
    </div>

    <div class='post-list'>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/post-card' ); ?>
      <?php endwhile; ?>
    </div>

    <?php get_template_part( 'template-parts/posts-navigation' ); ?>

  </div>
</div>