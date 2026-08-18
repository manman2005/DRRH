<?php
include "config/connectDB.php";
$id = $_GET["id"];

$sql = "SELECT * FROM tb_room_types 
        WHERE room_type_id = $id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลประเภทห้อง</title>
</head>

<body>

<h1>แก้ไขข้อมูลประเภทห้อง</h1>

<form action="update_room_type.php" method="post">

    <input type="hidden" name="room_type_id" value="<?= $row["room_type_id"] ?>">

    ชื่อประเภทห้อง
    <br>
    <input type="text" name="room_type_name" value="<?= $row["room_type_name"] ?>" required>

    <br><br>

    สถานะ
    <br>
    <select name="room_type_status">
        <option value="1" <?= (isset($row["room_type_status"]) && $row["room_type_status"] == 1) ? "selected" : "" ?>>
            พร้อมใช้งาน
        </option>
        <option value="0" <?= (isset($row["room_type_status"]) && $row["room_type_status"] == 0) ? "selected" : "" ?>>
            ไม่พร้อมใช้งาน
        </option>
    </select>

    <br><br>

    <button type="submit">บันทึกการแก้ไข</button>
    <a href="frm_add_room_type.php">ยกเลิก</a>

</form>

</body>

</html>