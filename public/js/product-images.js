$(function() {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
});

$(document).on('click', 'remove-product-image', function(e) {
  e.preventDefault();
  let $btn = $(this);
  
  alert('click');

  $.ajax( {
   url: $btn.data('route'),
   type: 'DELETE',
   dataType: 'json',
   success: function(data) {
     console.log(data);
   },
   error: function(data) {
     console.log('Error: ', data);
   }
       });

    });
});