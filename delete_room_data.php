<?php

include "config/connectDB.php";

$id = $_GET["id"];

$sql = "DELETE FROM tb_roomdata
        WHERE room_id = $id";

mysqli_query($conn, $sql);

header("Location: frm_add_room.php");

exit;

?>