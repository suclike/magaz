<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

?>

<article id='post-<?php the_ID(); ?>' <?php post_class('entry'); ?>>
  <div class='entry__body'>
    <header class='entry__header'>
      <h2 class='entry__title'><?php the_title(); ?></h2>
    </header>

    <div class='entry__content clearfix'>
      <?php the_content(); ?>
      <?php get_template_part( 'template-parts/wp-link-pages' ); ?>
    </div>

    <footer class='entry-footer'>
      <?php
        edit_post_link(
          sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', 'magaz' ),
            the_title( '<span class="screen-reader-text ">"', '"</span>', false )
          ),
          '<span class="edit-link font-small">',
          '</span>'
        );
      ?>
    </footer>
  </div>
</article>