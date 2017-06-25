<?php
/**
 * Magaz functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magaz
 */

if ( ! function_exists( 'magaz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function magaz_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Magaz, use a find and replace
   * to change 'magaz' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'magaz', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Add Custom Logo Support
   */
  add_theme_support('custom-logo', array(
    'height'     => 32,
    'width'      => 150,
    'flex-width' => true,
  ));

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'magaz' ),
    'social'  => esc_html__( 'Social Menu', 'magaz' )
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'comment-list',
    'gallery',
    'caption',
  ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'magaz_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

  /**
   * Return entry full featured image path
   */
  function magaz_entry_feature_image_path() {
    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' );
    echo $featured_image[0];
  }

  /**
   * Return entry full featured image path
   */
  function magaz_category_feature_image() {
    $category_image = '';

    if (function_exists('category_image_src')) {
      $category_image = category_image_src( array( 'size' => 'full' ) , false );
    }

    echo esc_url( $category_image );
  }

  /**
   * Remove p tags from archive description
   */
  function magaz_custom_archive_description( $description ) {
    $remove = array( '<p>', '</p>' );
    $description = str_replace( $remove, '', $description );
    return $description;
  }
  add_filter( 'get_the_archive_description', 'magaz_custom_archive_description' );

  /**
  * Remove parentheses from category list and add span class to posts count
  */
  function magaz_categories_postcount_filter( $variable ) {
    $variable = str_replace( '(', '<span class="post-count"> ', $variable );
    $variable = str_replace( ')', ' </span>', $variable );
    return $variable;
  }
  add_filter( 'wp_list_categories','magaz_categories_postcount_filter' );

  /**
  * Remove parentheses from archive list and add span class to posts count
  */
  function magaz_archive_postcount_filter( $variable ) {
    $variable = str_replace( '(', '<span class="post-count"> ', $variable );
    $variable = str_replace( ')', ' </span>', $variable );
    return $variable;
  }
  add_filter( 'get_archives_link','magaz_archive_postcount_filter' );

  /**
  * Replace class on reply link
  */
  function magaz_replace_reply_link_class( $class ) {
    $class = str_replace( "class='comment-reply-link", "class='button outline tiny", $class );
    return $class;
  }
  add_filter( 'comment_reply_link', 'magaz_replace_reply_link_class' );

  /**
  * Replace class on cancel reply link
  */
  function magaz_replace_cancel_reply_link_class( $cancel_comment_reply_link, $post = null ) {
    $new = str_replace( '<a', '<a class="button outline tiny"', $cancel_comment_reply_link );
    return $new;
  }
  add_filter( 'cancel_comment_reply_link', 'magaz_replace_cancel_reply_link_class', 10, 2 );

  /*
   * Change the comment reply link to use 'Reply to &lt;Author First Name>'
   * https://raam.org/2013/personalizing-the-wordpress-comment-reply-link/
   */
  function magaz_add_comment_author_to_reply_link( $link, $args, $comment ) {

    $comment = get_comment( $comment );

    // If no comment author is blank, use 'Anonymous'
    if ( empty( $comment->comment_author ) ) {
      if ( !empty( $comment->user_id ) ) {
        $user=get_userdata( $comment->user_id );
        $author=$user->user_login;
      } else {
        $author = esc_html__('Anonymous', 'magaz');
      }
    } else {
      $author = $comment->comment_author;
    }

    // If the user provided more than a first name, use only first name
    if( strpos( $author, ' ' ) ) {
      $author = substr( $author, 0, strpos( $author, ' ' ) );
    }

    // Replace Reply Link with "Reply to Author First Name>"
    $reply_link_text = $args['reply_text'];
    $link = str_replace( $reply_link_text, esc_html__( 'Reply to', 'magaz' ) . ' ' . $author, $link );

    return $link;
  }
  add_filter( 'comment_reply_link', 'magaz_add_comment_author_to_reply_link', 10, 3 );

  /**
   * Add Placehoder in comment Form Field (Comment)
   */
  function magaz_comment_textarea_placeholder( $fields ) {
    $fields['comment_field'] = str_replace(
      '<textarea',
      '<textarea placeholder="' . esc_html__( 'Comment', 'magaz' ) . '" ',
      $fields['comment_field']
    );

    return $fields;
  }
  add_filter( 'comment_form_defaults', 'magaz_comment_textarea_placeholder' );

  /**
   * Custom Comment Form Fields
   * Remove labels and add placeholders instead.
   */
  function magaz_custom_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $fields['author'] = '<div class="row"><div class="column large-4">'.
      '<p><input id="author" name="author" type="text" placeholder="' . esc_html__( 'Name', 'magaz' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' /></p></div>';

    $fields['email'] = '<div class="column large-4">'.
      '<p><input id="email" name="email" type="text" placeholder="' . esc_html__( 'Email', 'magaz' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="20"' . $aria_req . ' /></p></div>';

    $fields['url'] = '<div class="column large-4">'.
      '<p><input id="url" name="url" type="text" placeholder="' . esc_html__( 'Website', 'magaz' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="20"' . $aria_req . ' /></p></div></div>';

    return $fields;
  }
  add_filter( 'comment_form_default_fields', 'magaz_custom_comment_form_fields' );

  /**
   * Related Posts Function.
   */
  function magaz_related_posts() {
    global $post;
    $tags = wp_get_post_tags( $post->ID );
    $tag_arr = '';

    if( $tags ) {
      foreach( $tags as $tag ) {
        $tag_arr .= $tag->slug . ',';
      }

      $args = array(
        'tag' => $tag_arr,
        'numberposts' => 3,
        'post__not_in' => array( $post->ID )
      );

      $related_posts = get_posts( $args );

      if( $related_posts ) {
        echo '<div class="related-posts post-list">';
        echo '<div class="column large-12">';
        echo '<h5 class="separator">';
        echo '<span class="separator__title">' . esc_html__( 'Related Posts', 'magaz' ) . '</span>';
        echo '</h5>';
        echo '</div>';
        foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
          <?php get_template_part( 'template-parts/post-card' ); ?>
        <?php endforeach;
        echo '</div>';
      }
    }

    wp_reset_postdata();
  }
}
endif;
add_action( 'after_setup_theme', 'magaz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magaz_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'magaz_content_width', 640 );
}
add_action( 'after_setup_theme', 'magaz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magaz_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Footer First', 'magaz' ),
    'id'            => 'footer-first',
    'description'   => esc_html__( 'Add widgets here to appear in site Footer First column.', 'magaz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Second', 'magaz' ),
    'id'            => 'footer-second',
    'description'   => esc_html__( 'Add widgets here to appear in site Footer Second column.', 'magaz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Third', 'magaz' ),
    'id'            => 'footer-third',
    'description'   => esc_html__( 'Add widgets here to appear in site Footer Third column.', 'magaz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Fourth', 'magaz' ),
    'id'            => 'footer-fourth',
    'description'   => esc_html__( 'Add widgets here to appear in site Footer Fourth column.', 'magaz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'magaz_widgets_init' );

/*
Register Fonts
*/
function magaz_fonts_url() {
  $font_url = '';

  /*
  Translators: If there are characters in your language that are not supported
  by chosen font(s), translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Google font: on or off', 'magaz' ) ) {
      $font_url = add_query_arg( 'family', urlencode( 'Merriweather:400,300' ), '//fonts.googleapis.com/css' );
  }
  return $font_url;
}

/**
 * Enqueue scripts and styles.
 */
function magaz_scripts() {
  wp_enqueue_style( 'magaz-fonts', magaz_fonts_url(), array(), '1.0.0' );

  wp_enqueue_style( 'magaz-style', get_stylesheet_uri() );

  wp_enqueue_script( 'magaz-main-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '1.0.0', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'magaz_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Required Plugins.
 */
require get_template_directory() . '/inc/plugins.php';