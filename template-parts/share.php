<?php
/**
 * Set up the social media links to share a post for the current post.
 *
 * @package Magaz
 */

?>

<ul class='share-list'>
  <li>
    <a class='share-list__link' title='<?php esc_html_e( 'Share on Twitter', 'magaz' ); ?>' href='https://twitter.com/share?text=<?php magaz_get_escaped_title(); ?>&amp;url=<?php the_permalink(); ?>'
      onclick="window.open(this.href, 'twitter-share', 'width=550, height=235'); return false;">
      <span class='genericon genericon-twitter share-list__icon share-list__icon--twitter'></span>
    </a>
  </li>
  <li>
    <a class='share-list__link' title='<?php esc_html_e( 'Share on Facebook', 'magaz' ); ?>' href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>'
      onclick="window.open(this.href, 'facebook-share', 'width=580, height=296'); return false;">
      <span class='genericon genericon-facebook-alt share-list__icon share-list__icon--facebook'></span>
    </a>
  </li>
  <li>
    <a class='share-list__link' title='<?php esc_html_e( 'Share on Google Plus', 'magaz' ); ?>' href='https://plus.google.com/share?url=<?php the_permalink(); ?>'
      onclick="window.open(this.href, 'google-plus-share', 'width=490, height=530'); return false;">
      <span class='genericon genericon-googleplus share-list__icon share-list__icon--google'></span>
    </a>
  </li>
</ul>