<?php
/**
 * The template for displaying author page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

get_header(); ?>

<div class='wrapper'>

  <div class='row'>
    <div class='column large-12'>
      <?php get_template_part( 'template-parts/author-bio' ); ?>
    </div>
  </div>

  <?php if ( have_posts() ) : ?>

    <div class='row'>
      <div class='post-list'>
        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/post-card' ); ?>

        <?php endwhile; ?>
      </div>
    </div>

    <div class='row'>
      <?php get_template_part( 'template-parts/the-posts-navigation' ); ?>
    </div>

  <?php else: ?>

    <div class='row'>
      <div class='column large-12'>
        <p class='font-small'>
          <?php esc_html_e( 'No posts by this author.', 'magaz' ); ?>
        </p>
      </div>
    </div>

  <?php endif; ?>

</div><!-- wrapper -->

<?php
get_footer();