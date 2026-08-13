<?php

include "config/connectDB.php";

$room_id = $_POST["room_id"];
$room_number = $_POST["room_number"];
$room_name = $_POST["room_name"];
$room_description = $_POST["room_description"];
$floor_id = $_POST["floor_id"];
$room_seats = $_POST["room_seats"];
$room_type_id = $_POST["room_type_id"];
$room_status = $_POST["room_status"];

$sql = "UPDATE tb_roomdata SET

        room_number = '$room_number',
        room_name = '$room_name',
        room_description = '$room_description',
        floor_id = '$floor_id',
        room_seats = '$room_seats',
        room_type_id = '$room_type_id',
        room_status = '$room_status'

        WHERE room_id = $room_id";

mysqli_query($conn, $sql);

header("Location: room_list.php");

exit;

?>