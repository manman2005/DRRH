<?php

include "config/connectDB.php";

$room_type_name = $_POST["room_type_name"];
$room_type_status = $_POST["room_type_status"];

$sql = "INSERT INTO tb_room_types
(  
    room_type_name,
    room_type_status

)

VALUES
(
    '$room_type_name',
    '$room_type_status'
)";

mysqli_query($conn, $sql);

header("Location: index.php");

exit;

?>