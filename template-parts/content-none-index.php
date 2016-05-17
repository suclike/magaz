<?php
/**
 * Template part for displaying content none in index page
 *
 * @package Magaz
 */

?>

<div class='CoverImage header-cover FlexEmbed FlexEmbed--3by1'></div>

<div class='wrapper'>
  <div class='row'>

    <div class='column column--center medium-12 large-10'>
      <div class='header-box'>
        <header class='box box--full-padding'>
          <div data-icon='ei-exclamation' data-size='s' class='box__icon'></div>
          <div class='box__body'>
            <h4 class='box__title'><?php esc_html_e( 'Nothing found.', 'magaz' ); ?></h4>
            <p class='box__text'><?php get_template_part( 'template-parts/no-results' ); ?></p>
          </div>
        </header>
      </div>
    </div>

  </div>
</div>