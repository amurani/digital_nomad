<?php

/*
* This file is purely for testing stuff out. It does not contrite to the main project in any way.
*
* Author: Wachira J
*/
?>
 
<?php
include 'includes/db.php';

function travellersInHotel(){
    global $connection;
    $query = "SELECT * FROM booking";
    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die ("Could not read number of hotels from booking database" . mysqli_error($connection));
    }
    
    $index = 0;
    $people_in_hotel = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        $people_in_hotel[$index]['hotel'] = $row['hotel_id'];
        $people_in_hotel[$index]['user_id'] = $row['user_id'];
        $index++;
    }
    
    return $people_in_hotel;
}

$n = array();
$n = travellersInHotel();


echo json_encode(travellersInHotel());
//print_r($n);



?>