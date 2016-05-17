<?php
/**
 * Template part for displaying no results messages
 *
 * @package Magaz
 */

?>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

  <p class='font-small'>
    <?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'magaz' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
  </p>

<?php elseif ( is_search() ) : ?>

  <p class='font-small'>
    <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'magaz' ); ?>
  </p>

  <?php get_search_form(); ?>

<?php else : ?>

  <p class='font-small'>
    <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'magaz' ); ?>
  </p>

  <?php get_search_form(); ?>

<?php endif; ?>