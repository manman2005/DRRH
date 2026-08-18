<?php

include "config/connectDB.php";

$room_number = $_POST["room_number"];
$room_name = $_POST["room_name"];
$room_description = $_POST["room_description"];
$floor_id = $_POST["floor_id"];
$room_seats = $_POST["room_seats"];
$room_type_id = $_POST["room_type_id"];
$room_status = $_POST["room_status"];

$sql = "INSERT INTO tb_roomdata
(
    room_number,
    room_name,
    room_description,
    floor_id,
    room_seats,
    room_type_id,
    room_status
)

VALUES
(
    '$room_number',
    '$room_name',
    '$room_description',
    '$floor_id',
    '$room_seats',
    '$room_type_id',
    '$room_status'
)";

mysqli_query($conn, $sql);

header("Location: index.php");

exit;

?>