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
  <div class="login">
    <div class="login-triangle"></div>
    <h2 class="login-header">Log in</h2>

    <form class="login-container" action="login.php" method="post">
      <p><input type="text" placeholder="Username" name="username"></p>
      <p><input type="password" placeholder="Password" name="password"></p>
      <p><input type="submit" name="submit" value="Log in"></p>
    </form>
  </div>

  <!-- Javascript Assets -->
  <?php include 'includes/javascript.php' ?>
  <script type="text/javascript">
    $(function() {

      var img = document.createElement('img');
      img.setAttribute('src', 'img/places/nairobi.jpg');
      img.addEventListener('load', function() {
        var vibrant = new Vibrant(img);
        var swatches = vibrant.swatches();
        var colors = [];
        var angles = ['to bottom', '90deg', '-90deg', 'to top', '45deg'];
        for (var swatch in swatches)
        if (swatches.hasOwnProperty(swatch) && swatches[swatch]) {
          var rgb = swatches[swatch].getRgb();
          colors.push( 'rgb(' + rgb[0] + ', ' + rgb[1] + ', ' + rgb[2] + ')' );
        }
        console.log(colors);
      });

    });
  </script>
  </body>
</html>
