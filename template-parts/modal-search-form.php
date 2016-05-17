<?php
/**
 * Template part for displaying the modal search window
 *
 * @package Magaz
 */

?>

<div class='modal-search-container'>

  <form class='modal-search' method='get' action='<?php echo esc_url( home_url( '/' ) ); ?>'>
    <fieldset class='modal-search__fieldset'>
      <div class='row'>
        <div class='column column--center medium-8 large-8'>
          <input class='modal-search__field' placeholder='<?php esc_html_e( 'type and hit enter', 'magaz' ); ?>' name='s' autofocus>
        </div>
      </div>
    </fieldset>
  </form>

  <div data-icon='ei-close' data-size='s' class='close-search-button modal-search-container__close'></div>

</div>