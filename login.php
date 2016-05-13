<?php include "includes/db.php";

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
    
    $dbusername = $row['username'];
    $dbpassword = $row['password'];
    
    //compare the credentials
    if 
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

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" action="login.php" method="post">
    <p><input type="text" placeholder="Username" name="username"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" name="submit" value="Log in"></p>
  </form>
</div>

</body>
</html>