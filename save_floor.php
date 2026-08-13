<?php

include "config/connectDB.php";

$floor_name = $_POST["floor_name"];

$sql = "INSERT INTO tb_floors   
(  
    floor_name,
)

VALUES
(
    '$floor_name',
)";

mysqli_query($conn, $sql);

header("Location: index.php");

exit;

?>