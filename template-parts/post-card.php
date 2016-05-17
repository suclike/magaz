<?php
/**
 * Template part for displaying the post card in the loop.
 *
 * @package Magaz
 */

?>

<article <?php post_class('post-card-wrap column medium-6 large-4'); ?> data-class='<?php echo magaz_home_latest_post_card_class(); ?>'>
  <div class='post-card post-card--featured'>

    <a href='<?php the_permalink(); ?>' class='block' title='<?php the_title(); ?>'>
      <div class='grey-bg post-card__image CoverImage FlexEmbed FlexEmbed--16by9' style='background-image: url(<?php esc_url(magaz_entry_feature_image_path()); ?>)'>
        <span title='<?php esc_html_e('Featured Post', 'magaz'); ?>'>
          <span class='post-card--featured__icon' data-icon='ei-star' data-size='s'></span>
        </span>
      </div>
    </a>

    <div class='post-card__info'>
      <div class='post-card__meta'>
        <?php if ( !is_author() ) : ?>
          <span class='post-card__meta__author-name'>
            <a href='<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>' title='<?php echo get_the_author(); ?>'><?php echo get_the_author(); ?> - </a>
          </span>
        <?php endif; ?>
        <time class='post-card__meta__date' datetime='<?php the_time( 'c' ); ?>'><?php echo get_the_date(get_option( 'date_format' )); ?></time>
      </div>

      <h2 class='post-card__title'>
        <a title='<?php the_title(); ?>' href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
      </h2>
    </div>

  </div>
</article>