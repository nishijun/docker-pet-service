$(function() {
'use strict';

$('.js-click-userMenu').on('click', function() {
  $('.js-click-showUserMenu').toggleClass('active');
  $('.js-whole').toggleClass('active');
});
$('.js-whole').on('click', function() {
  $(this).removeClass('active');
  $('.js-click-showUserMenu').removeClass('active');
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('.js-click-favorite').on('click', function() {
  let $this = $(this);
  let pet = $this.data('pet');
  $.ajax({
    type: 'POST',
    url: '/ajax',
    data: {
      pet_id: pet
    }
  }).done(function(data) {
    console.log(data);
    $this.toggleClass('active');
  }).fail(function(msg) {
    console.log(msg);
    console.log('error ajax!');
  });
});
});
