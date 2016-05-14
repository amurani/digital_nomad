<?php include 'includes/db.php' ?>
<?php
global $connection;

if (isset($_GET['user_id']) && isset($_GET['hotel_id']) && isset($_GET['room_id'])) {
    
    $userID = $_GET['user_id'];
    $hotelID = $_GET['hotel_id'];
    $roomID = $_GET['room_id'];
    
    $query = "INSERT INTO booking (user_id, hotel_id, room_id) VALUES ($userID, $hotelID, $roomID)";
    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die ("could not connect to the database" . mysqli_error());
    }
    
}

?>