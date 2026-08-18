<?php
include "config/connectDB.php";

$floor_id = $_POST["floor_id"];
$floor_name = $_POST["floor_name"];

$sql = "UPDATE tb_floors SET
        floor_name = '$floor_name'
        WHERE floor_id = $floor_id";

mysqli_query($conn, $sql);

header("Location: frm_add_floor.php");
exit;
?>