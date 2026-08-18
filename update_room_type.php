<?php
include "config/connectDB.php";

$room_type_id = $_POST["room_type_id"];
$room_type_name = $_POST["room_type_name"];
$room_type_status = $_POST["room_type_status"];

$sql = "UPDATE tb_room_types SET
        room_type_name = '$room_type_name',
        room_type_status = '$room_type_status'
        WHERE room_type_id = $room_type_id";

mysqli_query($conn, $sql);

header("Location: frm_add_room_type.php");
exit;
?>