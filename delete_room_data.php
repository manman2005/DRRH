<?php

include "config/connectDB.php";

$id = $_GET["id"];

$sql = "DELETE FROM tb_roomdata
        WHERE room_id = $id";

mysqli_query($conn, $sql);

header("Location: index.php");

exit;

?>