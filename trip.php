<?php
  include "includes/session.php"
?>
<?php
//check if user is logged in
confirm_logged_in();
?>
 <?php
  include 'includes/db.php';
  include 'includes/globals.php';
?>

<?php
//get selected hotel and room from user
global $connection;
if (isset($_GET['user_id']) && isset($_GET['hotel_id']) && isset($_GET['room_id'])) {

    $userID = $_GET['user_id'];
    $hotelID = $_GET['hotel_id'];
    $roomID = $_GET['room_id'];

    //check if user already booked a room.
    $query = "SELECT * FROM booking WHERE user_id={$userID} LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (!$result){
        die ("Could not read from booking table" . mysqli_error());
    }

    $countRows = mysqli_num_rows($result);

    if ($countRows == 0){
        //user has not booked a room yet. insert to db
        $query = "INSERT INTO booking (user_id, hotel_id, room_id) VALUES ($userID, $hotelID, $roomID)";
        $result = mysqli_query($connection, $query);

        if (!$result){
            die ("could not connect to the database" . mysqli_error());
        }
    } else {
        //user has booked a room. generate error message.
        $alreadyBookedMsg = "You have already booked a room";
    }

}

//view accomodations. Pull user booking records from db
if (isset($_GET['user_records_id'])){
    $userID = $_GET['user_records_id'];
    $query = "SELECT * FROM booking WHERE user_id={$userID} LIMIT 1";
    $result = mysqli_error($connection, $query);

    if (!$result){
        die ("Could not reading from booking table" . mysqli_error());
    }

    $row = mysqli_fetch_assoc($result);

    $hotel_id = $row['hotel_id'];
    $room_id = $row['room_id'];
    }
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
    <header class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle" data-target="#nav" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <nav id="nav" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="jumbotron">
      <img id="stamp" src="img/stamp.png" alt="" />
      <div class="container font-white">
        <!-- <h1><span class="highlighted">We're going to Nairobi !!!</span></h1>
        <h3><span class="highlighted">20th - 24th of June</span></h3> -->
        <div class="text-right">
          <?php
             $userSessionId = $_SESSION['userID'];
             if (checkBookingStatus($userSessionId)){
          ?>
          <div class="youre-booked">
            <span class="highlighted">
              <span class="glyphicon glyphicon-ok-circle"></span>
              <span>You're already booked.</span>
            </span>
          </div>
          <a class="cta" href="#listed-properties">Join the trip</a>
          <?php
            } else {
          ?>
          <a class="cta" href="#listed-properties">Join the trip</a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
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

        <!-- Places of interest -->
        <div class="col-md-5" id="places of interest">
          <h3>Here's stuff we could do ...</h3>
          <div id="city-events">
            <ul class="list-unstyled">
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
    <?php include 'templates/rooms.php' ?>
    <?php include 'templates/events.php' ?>
    <!-- Javascript Assets -->
    <?php include 'includes/javascript.php' ?>
    <script type="text/javascript" src="js/trip.js"></script>
  </body>
</html>
