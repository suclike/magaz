<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

get_header(); ?>

<div class='wrapper'>

  <div class='CoverImage header-cover FlexEmbed FlexEmbed--3by1' style='background-image: url(<?php esc_url( magaz_entry_feature_image_path() ) ?>)'></div>

  <div class='row'>
    <div class='column column--center medium-10 large-10 post-container'>

      <?php
        while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
         comments_template();
        endif;

        endwhile;
      ?>

    </div>
  </div>
</div>

<?php
get_footer();