<?php

include "config/connectDB.php";

$id = $_GET["id"];

$sql = "DELETE FROM tb_floors
        WHERE floor_id = $id";

mysqli_query($conn, $sql);

header("Location: frm_add_floor.php");

exit;

?>