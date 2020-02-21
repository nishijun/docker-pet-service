$(function() {
'use strict';

// Image live preview
$('.js-image-area').on('dragover', function(e) {
  e.stopPropagation();
  e.preventDefault();
  $(this).css('border', '1px dashed #333').css('box-sizing', 'border-box');
});
$('.js-image-area').on('dragleave', function(e) {
  e.stopPropagation();
  e.preventDefault();
  $(this).css('border', 'none');
});
$('.js-image').on('change', function(e) {
  $('.js-image-area').css('border', 'none');

  let file = this.files[0],
      $img = $(this).siblings('.prev-img'),
      fileReader = new FileReader();
      
  fileReader.onload = function(event) {
    $img.attr('src', event.target.result).show();
  };

  fileReader.readAsDataURL(file);
});

// Navbar menu
$('.js-click-userMenu').on('click', function() {
  $('.js-click-showUserMenu').toggleClass('active');
  $('.js-whole').toggleClass('active');
});
$('.js-whole').on('click', function() {
  $(this).removeClass('active');
  $('.js-click-showUserMenu').removeClass('active');
});


// Favorite function
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
