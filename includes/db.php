<?php

//use your database login credentials
$connection = mysqli_connect("Localhost", "root", "", "digital_nomad");


if (!$connection){
    die ("Could not connect to the database" . mysqli_error());
}

?>
