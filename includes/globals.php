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

function travellersInHotel(){
    global $connection;
    $query = "SELECT * FROM booking";
    $result = mysqli_query($connection, $query);

    if (!$result){
        die ("Could not read number of hotels from booking database" . mysqli_error($connection));
    }
// <<<<<<< HEAD

    $index = 0;
    $people_in_hotel = array();

    while ($row = mysqli_fetch_assoc($result)){
        $people_in_hotel[$index]['hotel'] = $row['hotel_id'];
        $people_in_hotel[$index]['user_id'] = $row['user_id'];
        $index++;
    }

    return $people_in_hotel;
// =======
//     $countRows = mysqli_num_rows($result);
//
//     return $countRows;
// >>>>>>> ccd316dd72a50cf7825ff4439f466176e38aec9a
}
?>
