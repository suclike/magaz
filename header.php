<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id='content'>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magaz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset='<?php bloginfo( 'charset' ); ?>'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='profile' href='http://gmpg.org/xfn/11'>
  <link rel='pingback' href='<?php bloginfo( 'pingback_url' ); ?>'>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <a class='skip-link screen-reader-text' href='#content'><?php esc_html_e( 'Skip to content', 'magaz' ); ?></a>

  <div class='off-canvas-container'>

    <?php get_template_part( 'template-parts/site-header' ); ?>

    <?php $toggle_search_icon = get_theme_mod( 'toggle_search_icon' ); if ( ! $toggle_search_icon ) : ?>
      <?php get_template_part( 'template-parts/modal-search-form' ); ?>
    <?php endif; ?>

    <div id='content' class='site-content'>