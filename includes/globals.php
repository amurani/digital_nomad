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


function checkBookingStatus($userID){
    global $connection;
    $query = "SELECT * FROM booking WHERE user_id = '{$userID}' LIMIT 1";
    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die ("Could not connect to the database" . mysqli_error($connection));
    }
    $countRows = mysqli_num_rows($result);
    
    //already booked
    if ($countRows == 1)
        return true;
}

function travellersInHotel($hotelID){
    global $connection;
    $query = "SELECT * FROM booking WHERE hotel_id = '{$hotelID}'";
    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die ("Could not read number of hotels from booking database" . mysqli_error($connection));
    }
    $countRows = mysqli_num_rows($result);
    
    return $countRows;
}
?>
