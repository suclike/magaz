<?php
/**
 * Magaz Theme Customizer.
 *
 * @package Magaz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magaz_customize_register( $wp_customize ) {
  // Remove colors, background_image sections from theme customizer
  $wp_customize->remove_section( 'colors' );
  $wp_customize->remove_section( 'background_image' );

  // Remove blogdescription, header_image, and display_header_text controls from theme customizer
  $wp_customize->remove_control( 'blogdescription' );
  $wp_customize->remove_control( 'header_image' );
  $wp_customize->remove_control( 'display_header_text' );
}
add_action( 'customize_register', 'magaz_customize_register' );