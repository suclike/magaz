<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Magaz
 */

get_header(); ?>

<?php the_post_thumbnail( 'full', array( 'class' => 'grey-bg hide CoverImage FlexEmbed FlexEmbed--16by9' ) ); ?>

<div class='wrapper'>

  <div class='CoverImage header-cover FlexEmbed FlexEmbed--16by9' style='background-image: url(<?php esc_url( magaz_entry_feature_image_path() ) ?>)'></div>

  <div class='row'>
    <div class='column column--center medium-10 large-10 post-container'>
      <?php
        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', get_post_format() );

        endwhile;
      ?>
    </div>
  </div>

  <div class='row'>
    <?php magaz_related_posts(); ?>
  </div>

</div>

<?php
get_footer();