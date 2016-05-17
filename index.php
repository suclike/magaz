<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class='wrapper'>

  <!-- Show the latest post in full width in the homepage,
  then show the rest of posts as normal in different pages -->

  <?php
    $args = array(
      'posts_per_page'      => 1,
      'post__in'            => get_option( 'sticky_posts' ),
      'ignore_sticky_posts' => 1
    );

    $query = new WP_Query( $args );

    while ( $query->have_posts() ) : $query->the_post(); ?>

      <!-- Include the post-card partial and pass the 'post first' class to it -->

      <?php if ( is_home() && !is_paged() ) : the_post() ?>

        <?php get_template_part( 'template-parts/post-card' ); ?>

      <?php endif; ?>

    <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <!-- Loop -->
  <div class='row'>
    <div class='post-list'>
      <?php

        while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/post-card' );

        endwhile;
      ?>
    </div>
  </div>

  <div class='row'>
    <?php get_template_part( 'template-parts/the-posts-navigation' ); ?>
  </div>

</div><!-- wrapper -->

<?php else: ?>

  <?php get_template_part( 'template-parts/content-none', 'index' ); ?>

<?php endif; ?>

<?php
get_footer();