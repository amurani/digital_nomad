<?php
  include "includes/session.php"
?>
<?php
//check if user is logged in
confirm_logged_in();
?>
 <?php
  include 'includes/globals.php'
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <?php include 'includes/stylesheets.php' ?>
    <link rel="stylesheet" href="css/trip.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="jumbotron">
      <div class="container font-white">
        <h1>We're going to Nairobi</h1>
        <h3>20th - 24th of June</h3>
        <a class="cta" href="#">Join the trip</a>
        <div class="youre-booked">
          <span class="glyphicon glyphicon-ok-circle"></span>
          <span>You're already booked.</span>
          <br>
          <a class="font-white" href="#">View my accomodation &#187;</a>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5" id="places of interest">
          Places of interest
        </div>
        <div class="col-md-7" id="hotel-listings">

          <!-- Display where other people are staying -->
          <!-- <div id="popular-properties">
            <h3>Others are already booked and ready to go ...</h3>
            <div class="row">
              <?php //include 'templates/popular_bookings.php' ?>
            </div>
          </div> -->

          <!-- Booking -->
          <h3>Find a place that suit you ...</h3>

          <!-- Filter results to travellers needs -->
          <div id="listed-properties-filters">
            <div class="text-center">
              <a href="#">Would you like to filter these listings?</a>
            </div>
            <form class="form-inline" action="#" method="post">
              <div class="form-group">
                <label for="number-of-people"># of People</label>
                <input class="form-control" type="text" name="name" value="">
              </div>
            </form>
          </div>

          <!-- Find your own place -->
          <div id="listed-properties">
            <ul class="list-unstyled">
              <?php include 'templates/hotels.php' ?>
              <li class="loading text-center">
                <img src="img/ajax-loader.gif" alt="" />
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <!-- Rooms view -->
    <div id="view-rooms-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
            <a class="close" href="#">
            </a>
            <p class="title">Rooms currently available for booking</p>
          </div>
          <div class="modal-body padd-0">
            <div id="available-rooms">
              <ul class="list-unstyled">
                <?php include 'templates/rooms.php' ?>
                <!-- <li class="loading text-center">
                  <img src="img/ajax-loader.gif" alt="" />
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Handlebars Templates -->
    <?php //include 'templates/popular_bookings.php' ?>
    <?php include 'templates/hotels.php' ?>
    <?php //include 'templates/rooms.php' ?>
    <!-- Javascript Assets -->
    <?php include 'includes/javascript.php' ?>
    <script type="text/javascript" src="js/trip.js"></script>
  </body>
</html>
