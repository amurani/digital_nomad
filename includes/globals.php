<?php

  $title = "Digitial Nomads";


function getUser($username, $password){
    global $connection;
    $query = "SELECT * FROM users WHERE username = '{$username}' and password = '{$password}' LIMIT 1";
    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die ("Could not connect to the database" . mysqli_error($connection));
    }
}

?>
