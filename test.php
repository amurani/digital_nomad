<?php

/*
* This file is purely for testing stuff out. It does not contrite to the main project in any way.
*
* Author: Wachira J
*/
?>
 

 <?php
  //include "includes/globals.php";
  include "includes/session.php"
?>
<?php
//check if user is logged in
      $session = $_SESSION['userID'];
      if (isset($_SESSION['userID'])){
          echo $session;
      } else {
          echo "Session is not set";
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Page</title>
</head>
<body>
    <p>Just a test page</p>
</body>
</html>