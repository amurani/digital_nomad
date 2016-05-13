$(function() {

  var popularListing = $('.popular-property').parent();
  $('#popular-properties .row').append( popularListing.clone() );
  $('#popular-properties .row').append( popularListing.clone() );

  var $listedProprty = $('#listed-properties .listed-property');
  for (var i = 0; i < 5; i++)
    $('#listed-properties ul').append( $listedProprty.clone() );

  var $availableRoom = $('.avialable-room-details');
  for (var i = 0; i < 5; i++)
    $('#available-rooms>ul').append( $availableRoom.clone() );

  $('#listed-properties').on('click', '.view-rooms', function() {
    $('#view-rooms-modal').modal();
  });

  // $('#view-rooms-modal').modal();
});
