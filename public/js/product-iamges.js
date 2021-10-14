$(function() {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
});

$(document).on('click', 'remove-product-image', function(e) {
  e.preventDefault();

});
});