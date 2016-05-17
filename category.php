<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

get_header(); ?>

<div class='wrapper'>

  <div class='CoverImage header-cover FlexEmbed FlexEmbed--3by1' style='background-image: url(<?php esc_url(magaz_category_feature_image() ); ?>)'></div>

  <div class='row'>
    <div class='column column--center medium-12 large-10'>
      <?php get_template_part( 'template-parts/page-header', 'category' ); ?>
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
      <div class='small-10 medium-10 large-9 column column--center'>
        <p class='font-small hide'>
          <?php esc_html_e( 'No posts found.', 'magaz' ); ?>
        </p>
      </div>
    </div>

  <?php endif; ?>

</div><!-- wrapper -->

<?php
get_footer();