<?php
include "includes/globals.php";
include "includes/session.php";
include "includes/db.php";

if (isset($_POST['submit'])){
    //form credentials have been submitted
    //get credentials
    global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)){
        die ("some registration fields were not filled in." . mysqli_error());
    }

    $username = mysqli_real_escape_string($connection, $username );
    $username = strtolower($username);
    $password = mysqli_real_escape_string($connection, $password );

    //get credentials from database
    $query = "INSERT INTO users (username, password) VALUE ('{$username}', '{$password}')";
    $result = mysqli_query($connection, $query);

    if (!$result){
        die ("Could not insert values to the database" . mysqli_error());
    } else {
        //change the url to match the location of this file on your local server
        $url = get_base_url()."/login.php";
        redirect_to($url);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/login.css">

</head>
<body>

<div class="login">
  <div class="login-triangle"></div>

  <h2 class="login-header">Sign Up</h2>

  <form class="login-container" action="signup.php" method="post">
    <p><input type="text" placeholder="Username" name="username"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" name="submit" value="Sign Up"></p>
  </form>
</div>

</body>
</html>
