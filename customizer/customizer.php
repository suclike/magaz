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
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  // Remove colors, background_image sections from theme customizer
  $wp_customize->remove_section( 'colors' );
  $wp_customize->remove_section( 'background_image' );

  // Remove blogdescription, header_image, and display_header_text controls from theme customizer
  $wp_customize->remove_control( 'blogdescription' );
  $wp_customize->remove_control( 'header_image' );
  $wp_customize->remove_control( 'display_header_text' );
}
add_action( 'customize_register', 'magaz_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magaz_customize_preview_js() {
  wp_enqueue_script( 'magaz_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'magaz_customize_preview_js' );


function magaz_customizer() {

  $site_link = 'http://aspirethemes.com/';

  // Theme Options Panel
  $panel = 'theme-options';

  $panels[] = array(
    'id'        => $panel,
    'title'     => esc_html__( 'Theme Options', 'magaz' ),
    'priority'  => '10'
  );

  // Header
  $section = 'header';

  $sections[] = array(
    'id'          => $section,
    'title'       => esc_html__( 'Header', 'magaz' ),
    'priority'    => '10',
    'description' => esc_html__( 'Header logo.', 'magaz' ),
    'panel'       => $panel
  );

  $options['header_logo'] = array(
    'id'        => 'header_logo',
    'label'     => esc_html__( 'Logo', 'magaz' ),
    'section'   => $section,
    'type'      => 'image',
  );

  $options['toggle_search_icon'] = array(
    'id' => 'toggle_search_icon',
    'label'   => esc_html__( 'Hide Search Icon', 'magaz' ),
    'section' => $section,
    'type'    => 'checkbox',
    'default' => 0,
  );

  // Footer
  $section = 'footer';

  $sections[] = array(
    'id'          => $section,
    'title'       => esc_html__( 'Footer', 'magaz' ),
    'priority'    => '40',
    'description' => esc_html__( 'Footer options.', 'magaz' ),
    'panel'       => $panel
  );

  $options['footer_copyright'] = array(
    'id'          => 'footer_copyright',
    'label'       => esc_html__( 'Footer copyright text.', 'magaz' ),
    'section'     => $section,
    'type'        => 'textarea',
    'default'     => sprintf( __( 'Copyright 2016 <a href="%1s">Aspire Themes</a>. All Rights Reserved.', 'magaz' ), esc_url( $site_link ) ),
    'transport'   => 'postMessage'
  );

  // Adds the sections to the $options array
  $options['sections'] = $sections;

  // Adds the panels to the $options array
  $options['panels'] = $panels;

  $customizer_library = Customizer_Library::Instance();
  $customizer_library->add_options( $options );
}

add_action( 'init', 'magaz_customizer' );