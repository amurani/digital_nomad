$(function() {

  var popularListing = $('.popular-property').parent();
  $('#popular-properties .row').append( popularListing.clone() );
  $('#popular-properties .row').append( popularListing.clone() );

  var $listedProprty = $('#listed-properties .listed-property');
  for (var i = 0; i < 1; i++)
    $('#listed-properties ul').append( $listedProprty.clone() );

});
