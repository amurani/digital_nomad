<?php
include "includes/session.php";
include "includes/globals.php";
include "includes/db.php";

if (logged_in()){
    $url = get_base_url()."trip.php";
    redirect_to($url);
}

if (isset($_POST['submit'])){
    //form credentials have been submitted
    //get credentials
    global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username );
    $username = strtolower($username);
    $password = mysqli_real_escape_string($connection, $password );

    //get credentials from database
    $query = "SELECT * FROM users WHERE username = '{$username}' and password = '{$password}' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (!$result){
        die ("Could not connect to the database" . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($result);

    $dbuserID = $row['id'];
    $dbusername = $row['username'];
    $dbpassword = $row['password'];

    //compare the credentials
    if (strcasecmp($username, $dbusername) == 0 && $password == $dbpassword){
        //login successful, set session
        $_SESSION['userID'] = $dbuserID;

        if (gethostname() == "Kevins-MacBook-Pro.local") {
          $url = get_base_url()."trip.php";
        } else {
          $url = get_base_url()."trip.php";
        }
        redirect_to($url);

    } else {
        //login not successful
        $errorMessage = "Login was not successful! Please try again.";
        $errorMessage .= " Make sure you use your first name as Username and phone number as Password.";
    }

        if (isset($_GET['logout']) && $_GET['logout'] == 1){
            $logout_message = "You are now logged out.<br /><b>Please log in to continue.</b>";
            $username = "";
            $username = "";
        }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Login</title>
      <?php include 'includes/stylesheets.php' ?>
      <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
  <?php

      if (isset($errorMessage)){
          echo "<p>" . $errorMessage . "</p>";
          if (isset($logout_message)){
              echo "<p>" . $logout_message . "</p>";
          }
      }

  ?>
  <div class="container">
    <!-- <h1 class="highlighted font-red" style="margin: 50px 0; transform: rotate(358deg);">Holiday</h1> -->
    <!-- <h2 class="highlighted font-white" style="margin: 50px 0; transform: rotate(358deg);">Where group travel happens !!!</h2> -->

    <div class="text-center">
      <h1 class="font-white">
        <span class="">Join our group on our next journey</span>
      </h1>
    </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div id="user-form">
          <div class="form-tabs text-center">
            <a href="#">Log In</a>
            <a href="#">Sign Up</a>
          </div>
          <div class="login">
            <div class="login-triangle"></div>
            <div id="sign-in">
              <!-- <h2 class="login-header">Log in</h2> -->
              <form class="login-container" action="login.php" method="post">
                <p><input type="text" placeholder="Username" name="username"></p>
                <p><input type="password" placeholder="Password" name="password"></p>
                <p class="text-center"><input type="submit" name="submit" value="Log in"></p>
              </form>
            </div>
            <div id="sign-up">
              <!-- <h2 class="login-header">Sign Up</h2> -->
              <form class="login-container" action="signup.php" method="post">
                <p><input type="text" placeholder="Username" name="username"></p>
                <p><input type="password" placeholder="Password" name="password"></p>
                <p class="text-center"><input type="submit" name="submit" value="Sign Up"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript Assets -->
  <?php include 'includes/javascript.php' ?>
  <script type="text/javascript">
    $(function() {

      // var img = document.createElement('img');
      // img.setAttribute('src', 'img/places/nairobi.jpg');
      // img.addEventListener('load', function() {
      //   var vibrant = new Vibrant(img);
      //   var swatches = vibrant.swatches();
      //   var colors = [];
      //   var angles = ['to bottom', '90deg', '-90deg', 'to top', '45deg', '0deg'];
      //   var backgroundImage = '';
      //   for (var swatch in swatches) {
      //     if (swatches.hasOwnProperty(swatch) && swatches[swatch]) {
      //       var rgb = swatches[swatch].getRgb();
      //       colors.push( 'rgb(' + rgb[0] + ', ' + rgb[1] + ', ' + rgb[2] + ')' );
      //       backgroundImage += 'linear-gradient(' + angles[colors.length] + ', ' + colors[colors.length - 1] + ', transparent), ';
      //     }
      //   }
      //   backgroundImage = backgroundImage.substring(0, backgroundImage.length - 2);
      //   console.log(backgroundImage);
      //   $('body').css('background', backgroundImage);
      // });

      $('.form-tabs a').click(function() {
        $('.form-tabs a').removeClass('active');
        $(this).addClass('active');
      });

      $('.form-tabs a').eq(0).click(function() {
        $('#sign-in').show();
        $('#sign-up').hide();
      });

      $('.form-tabs a').eq(1).click(function() {
        $('#sign-in').hide();
        $('#sign-up').show();
      });

      $('.form-tabs a').eq(0).click();

    });
  </script>
  </body>
</html>
