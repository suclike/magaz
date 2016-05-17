<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magaz
 */
?>

<article id='post-<?php the_ID(); ?>' <?php post_class('entry'); ?>>
  <div class='entry__body'>
    <header class='entry__header'>
      <h2 class='entry__title'><?php the_title() ?></h2>

      <div class='entry__header__meta'>
        <time class='entry__date' datetime='<?php the_time( 'c' ) ?>'><?php the_date(get_option( 'date_format' )); ?></time>

        <?php
          $categories_list = get_the_category_list( esc_html__( ', ', 'magaz' ) );
          if ( $categories_list ) :
        ?>

        <span class='entry__cats'>
          <?php printf( $categories_list ); ?>
        </span>
        <?php endif; ?>
      </div>
    </header>

    <div class='entry__content clearfix'>
      <?php the_content(); ?>
      <?php get_template_part( 'template-parts/wp-link-pages' ); ?>
    </div>

    <div class='entry__tags'>
      <?php echo get_the_tag_list(); ?>
    </div>

    <hr />

    <?php
      get_template_part( 'template-parts/author-bio' );
      get_template_part( 'template-parts/share' );

      get_template_part( 'template-parts/post-navigation' );

      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    ?>
  </div>
</article>