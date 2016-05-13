<?php include "includes/session.php" ?>
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
  </head>
  <body>


    <?php include 'includes/javascript.php' ?>
    <script type="text/javascript"></script>
  </body>
</html>
