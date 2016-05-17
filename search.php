<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Magaz
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

  <?php get_template_part( 'template-parts/content', 'search' ); ?>

<?php else: ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php
get_footer();