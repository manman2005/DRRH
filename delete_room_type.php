<?php

include "config/connectDB.php";

$id = $_GET["id"];

$sql = "DELETE FROM tb_room_types
        WHERE room_type_id = $id";

mysqli_query($conn, $sql);

header("Location: frm_add_room_type.php");

exit;

?>