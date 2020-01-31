$(function() {
'use strict';

// Modal
$('.js-click-login').on('click', function() {
  $('.js-login-modal').fadeIn();
});
$('.js-click-signup').on('click', function() {
  $('.js-signup-modal').fadeIn();
});
$('.js-click-modal').on('click', function() {
  $('.js-signup-modal').fadeOut();
  $('.js-login-modal').fadeOut();
});
});
