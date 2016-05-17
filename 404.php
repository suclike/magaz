<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Magaz
 */

get_header(); ?>

<div class='wrapper'>

  <div class='CoverImage header-cover FlexEmbed FlexEmbed--3by1'></div>

  <div class='row'>

    <div class='column column--center medium-12 large-10'>
      <?php get_template_part( 'template-parts/page-header', '404' ); ?>
    </div>

    <?php
      $args = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => 6,
        'ignore_sticky_posts' => 1
        );

      $query = new WP_Query( $args );
    ?>

    <?php if ( $query->have_posts() ) : ?>

      <div class='column column--center medium-12 large-10'>

        <h5 class='separator'>
          <span class='separator__title'><?php esc_html_e( 'Recent Posts', 'magaz' ); ?></span>
        </h5>

        <div class='row'>
          <div class='post-list'>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

              <?php get_template_part( 'template-parts/post-card' ); ?>

            <?php endwhile; wp_reset_postdata(); ?>
          </div><!-- post-list -->
        </div><!-- row -->

      </div><!-- column -->

    <?php endif; ?>

  </div><!-- row -->
</div><!-- wrapper -->

<?php
get_footer();