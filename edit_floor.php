<?php 
include "config/connectDB.php";
$id = $_GET["id"];

$sql = "SELECT * FROM tb_floors
        WHERE floor_id = $id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลชั้น</title>
</head>

<body>

<h1>แก้ไขข้อมูลข้อมูลชั้น</h1>

<form action="update_floor.php" method="post">

    <input type="hidden" name="floor_id" value="<?= $row["floor_id"] ?>">

    ชื่อชั้น
    <br>
    <input type="text" name="floor_name" value="<?= $row["floor_name"] ?>" required>

    <br><br>



    <br><br>

    <button type="submit">บันทึกการแก้ไข</button>
    <a href="frm_add_floor.php">ยกเลิก</a>

</form>

</body>

</html>