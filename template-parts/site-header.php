<header class='site-header'>
  <div class='row'>

    <div class='column large-12'>
      <div class='site-header__container'>
        <div class='row'>

          <div class='column small-8 medium-3 large-3'>
            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
              <?php the_custom_logo() ?>
            <?php else: ?>
              <h1 class='site-header__logo'>
                <a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a>
              </h1>
            <?php endif; ?>
          </div>

          <label class='off-canvas-toggle'><span class="genericon genericon-menu off-canvas-toggle__icon"></span></label>

          <div class='off-canvas-content'>

            <div class='column medium-6 large-6'>
              <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <h2 class='screen-reader-text'><?php esc_html_e( 'Primary Navigation', 'magaz' ); ?></h2>
                <nav class='site-header__navigation'>
                  <ul class='list-bare'>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'container' => false ) ); ?>
                  </ul>
                </nav>
              <?php endif; ?>
            </div>

            <div class='column medium-3 large-3 right'>
              <h2 class='screen-reader-text'><?php esc_html_e( 'Social Navigation', 'magaz' ); ?></h2>
              <ul class='site-header__social-nav social-icons list-bare'>
                <?php if ( has_nav_menu( 'social' ) ) : ?>
                  <?php
                    // Social links navigation menu.
                    wp_nav_menu( array(
                      'items_wrap'      => '%3$s',
                      'container'       => false,
                      'theme_location'  => 'social',
                      'link_before'     => '<span class="screen-reader-text">',
                      'link_after'      => '</span>',
                      'depth'           => 1,
                    ) );
                  ?>
                <?php endif; ?>

                <li>
                  <div class='toggle-search-button'>
                    <span class="genericon genericon-search toggle-search-button__icon"></span>
                  </div>
                </li>
              </ul>
            </div>

          </div><!-- off-canvas-content -->

        </div>
      </div>
    </div>

  </div>
</header>