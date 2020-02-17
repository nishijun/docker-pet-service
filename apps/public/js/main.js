$(function() {
'use strict';

$('.js-click-favorite').on('click', function() {
  let $this = $(this);
  let pet = $this.data('pet');
  $.ajax({
    type: 'POST',
    url: '../ajax.php',
    // url: route('favorite', ['id' => pet]),
    data: {
      pet_id: pet
    }
  }).done(function(data) {
    $this.toggleClass('active');
  }).fail(function(msg) {
    console.log('error ajax!');
  });
});
});
