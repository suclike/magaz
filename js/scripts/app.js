(function($) {

  'use strict';

  // ===============
  // Homepage Layout
  // ===============

  // Add `regular` class to the second and third posts titles in homepage
  // so it will look much bigger related to it's 50% width
  $('.index .post-card').slice(1, 3).each(function() {
    $(this).find('.post-card__title').addClass('post-card__title--big');
  });

  // =================
  // Responsive Videos
  // =================

  $('.entry__content').fitVids();

  // ===============
  // Off Canvas Menu
  // ===============

  $('.off-canvas-toggle').click(function(e) {
    e.preventDefault();
    $('.off-canvas-container').toggleClass('is-active');
  });

  // ======
  // Search
  // ======

  var search_field = $('.modal-search__field'),
      toggle_search = $('.toggle-search-button'),
      close_search = $('.close-search-button');

  toggle_search.click(function(e) {
    e.preventDefault();
    $('.modal-search-container').addClass('is-active');

    // If off-canvas is active, just disable it
    $('.off-canvas-container').removeClass('is-active');

    setTimeout(function() {
      search_field.focus();
    }, 500);
  });

  $('.modal-search-container, .close-search-button').on('click keyup', function(event) {
    if (event.target == this || $(event.target).hasClass('close-search-button') || event.keyCode == 27) {
      $('.modal-search-container').removeClass('is-active');
    }
  });

})(jQuery);