<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Magaz
 */

get_header(); ?>

<div class='wrapper'>

  <div class='CoverImage header-cover FlexEmbed FlexEmbed--3by1'></div>

  <div class='row'>

    <div class='column column--center medium-12 large-10'>
      <?php get_template_part( 'template-parts/page-header', '404' ); ?>
    </div>

  </div><!-- row -->
</div><!-- wrapper -->

<?php
get_footer();