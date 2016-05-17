<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id='comments' class='comments-area'>

	<?php if ( have_comments() ) : ?>

    <h5 class='separator'>
      <span class='separator__title'><?php esc_html_e( 'Comments', 'magaz' ); ?></span>
    </h5>

		<ol class='comment-list'>
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol>

    <?php
      // Are there comments to navigate through?
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
        get_template_part( 'template-parts/comments-navigation' );
      }
    ?>

	<?php endif; // have_comments() ?>

  <?php
	  // If comments are closed and there are comments, let's leave a little note, shall we?
	  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class='no-comments'><?php esc_html_e( 'Comments are closed.', 'magaz' ); ?></p>

	<?php endif; ?>

  <?php
    $args = array(
      'class_submit'  => 'button',
    );

	  comment_form($args);
	?>

</div><!-- #comments -->