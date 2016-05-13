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
          <h1>Where going to Rome</h1>
          <h3>20th - 24th of June</h3>
          <a class="cta" href="#">Come Join Us</a>
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
            <div id="popular-properties">
              <h3>Other people are already ready and booked ...</h3>
              <div class="row">
                <div class="col-md-4">
                  <div class="popular-property text-center">
                    <!-- <img class="property-image" src="" alt="" /> -->
                    <div class="property-image"></div>
                    <h4 class="property-name">Hotel Name</h4>
                    <p class="property-booking-number">8 people are staying here</p>
                    <a href="#">View who is staying here?</a>
                  </div>
                </div>

              </div>
            </div>

            <!-- Booking -->
            <h3>Or find a place that suit you better ...</h3>

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
                <li class="listed-property clearfix">
                  <div class="property-image pull-left">

                  </div>
                  <div class="property-content">
                    <h3>Hotel Name</h3>
                    <p>in the <u>name of neighbourood</u> neighbourood</p>
                    <div class="text-right">
                      <a class="btn btn-success" href="#">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <span>Book this Property</span>
                      </a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>
    <?php include 'includes/javascript.php' ?>
    <script type="text/javascript" src="js/trip.js"></script>
  </body>
</html>
