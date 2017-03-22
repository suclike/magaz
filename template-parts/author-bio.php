<?php
/**
 * Template part for displaying author info in the Post & Author pages.
 *
 * @package Magaz
 */

?>

<div class='box box--author box--full-padding'>

  <figure class='author-image'>
    <div class='author-image__img' style='background-image: url(<?php echo esc_url( get_avatar_url( get_the_author_meta( 'user_email' ) ) ); ?>)'></div>
  </figure>

  <div class='box__body'>
    <h4 class='box__title'>
      <a href='<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>'>
        <?php echo get_the_author(); ?>
      </a>
    </h4>

    <p class='box__text'><?php the_author_meta( 'description' ); ?></p>

    <?php
      $user_url = get_the_author_meta( 'user_url' );

      if ( $user_url ) :
    ?>
    <div class='author-meta box__text'>
      <div class='author-link inline-block'>
        <div data-icon='ei-link' data-size='s'></div>
        <a href='<?php the_author_meta( 'user_url' ); ?>'><?php the_author_meta( 'user_url' ); ?></a>
      </div>
    </div>
    <?php endif; ?>

  </div><!-- box__body -->

</div>