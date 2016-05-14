<?php
/*
* This app smashes the login and signup form functionality to one file.
*
*
* fILE IS INCOMPLETE. NOT IS USE AT LEAST FOR NOW
*/

?>
<?php
include "includes/session.php";
include "includes/globals.php";
include "includes/db.php";

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
    
    //count the number of rows returned from the select query
    $rowCount = mysqli_num_rows($result);
    
    //if rowcount == 0, user does not exist in db
    echo $rowCount;
    exit();
    if ($rowCount == 0){
        //user not found in database. 
        // Action: Create User/Sign them up
    $query = "INSERT INTO users (username, password) VALUES ('{$username}', '{$password}')";
    $result = mysqli_query($connection, $query);

    if (!$result){
        die ("Could not insert values to the database" . mysqli_error());
    } else {
        //successful insert to db. Log them in automatically
        //retrieve again from db
    $query = "SELECT * FROM users WHERE username = '{$username}' and password = '{$password}' LIMIT 1";
    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die ("Could not connect to the database" . mysqli_error($connection));
    }
        
        $row = mysqli_fetch_assoc($result);
        
        $dbuserID = $row['id'];
        
        $_SESSION['userID'] = $dbuserID;
        
        $url = get_base_url()."/trip.php";
        redirect_to($url);
    }
        
    } else {
    //user found in db. Continue with login process
        
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
         
    } // end else (rowCount)


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

  <h2 class="login-header">Enter your credentials</h2>

  <form class="login-container" action="auth.php" method="post">
    <p><input type="text" placeholder="Username" name="username"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" name="submit" value="Enter Credentials"></p>
  </form>
</div>

</body>
</html>
