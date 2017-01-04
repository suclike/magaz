<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magaz
 */

?>

  </div><!-- #content -->

  <footer class='site-footer'>
    <div class='row'>

      <div class='large-12 column'>
        <?php
          // If we get this far, we have widgets.
          // The next check is to see if all four widget areas have content, which will affect the CSS classes used.
          if ( is_active_sidebar( 'footer-first'  )
            && is_active_sidebar( 'footer-second' )
            && is_active_sidebar( 'footer-third'  )
            && is_active_sidebar( 'footer-fourth' )
          ) : ?>

          <div class='site-footer__top'>
            <div class='row'>
              <div class='site-footer__section column medium-3 large-3'>
                <?php dynamic_sidebar( 'footer-first' ); ?>
              </div>

              <div class='site-footer__section column medium-3 large-3'>
                <?php dynamic_sidebar( 'footer-second' ); ?>
              </div>

              <div class='site-footer__section column medium-3 large-3'>
                <?php dynamic_sidebar( 'footer-third' ); ?>
              </div>

              <div class='site-footer__section column medium-3 large-3'>
                <?php dynamic_sidebar( 'footer-fourth' ); ?>
              </div>
            </div>
          </div>

          <?php
            //end of check for all four sidebars. Next we check if there are three sidebars with widgets.
            elseif ( is_active_sidebar( 'footer-first'  )
              && is_active_sidebar( 'footer-second' )
              && is_active_sidebar( 'footer-third'  )
              && ! is_active_sidebar( 'footer-fourth' )
            ) : ?>

          <div class='site-footer__top'>
            <div class='row'>
              <div class='site-footer__section column medium-3 large-4'>
                <?php dynamic_sidebar( 'footer-first' ); ?>
              </div>

              <div class='site-footer__section column medium-3 large-4'>
                <?php dynamic_sidebar( 'footer-second' ); ?>
              </div>

              <div class='site-footer__section column medium-3 large-4'>
                <?php dynamic_sidebar( 'footer-third' ); ?>
              </div>
            </div>
          </div>

          <?php
            //end of check for three sidebars. Next we check if there are two sidebars with widgets.
            elseif ( is_active_sidebar( 'footer-first'  )
              && is_active_sidebar( 'footer-second' )
              && ! is_active_sidebar( 'footer-third'  )
              && ! is_active_sidebar( 'footer-fourth' )
            ) : ?>

            <div class='site-footer__top'>
              <div class='row'>
                <div class='site-footer__section column medium-3 large-6'>
                <?php dynamic_sidebar( 'footer-first' ); ?>
                </div>

                <div class='site-footer__section column medium-3 large-6'>
                <?php dynamic_sidebar( 'footer-second' ); ?>
                </div>
              </div>
            </div>

            <?php
              //end of check for two sidebars. Finally we check if there is just one sidebar with widgets.
              elseif ( is_active_sidebar( 'footer-first'  )
                && ! is_active_sidebar( 'footer-second' )
                && ! is_active_sidebar( 'footer-third'  )
                && ! is_active_sidebar( 'footer-fourth' )
              ) : ?>

              <div class='site-footer__top'>
                <div class='row'>
                  <div class='site-footer__section column medium-3 large-12'>
                    <?php dynamic_sidebar( 'footer-first' ); ?>
                  </div>
                </div>
              </div>
          <?php
        //end of all sidebar checks.
        endif;?>
      </div>

      <div class='column large-12'>
        <div class='site-footer__bottom'>
          <div class='row'>

            <div class='column large-12'>
              <div class='font-tiny'>
                &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?></a>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </footer>

</div>
<!-- End off-canvas-container -->

<?php wp_footer(); ?>

</body>
</html>