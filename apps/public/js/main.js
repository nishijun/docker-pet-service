$(function() {
'use strict';

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
    url: '/top/' + pet + '/favorite',
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
