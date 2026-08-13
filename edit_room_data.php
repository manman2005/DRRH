<?php

include "config/connectDB.php";

$id = $_GET["id"];

$sql = "SELECT * FROM tb_roomdata
        WHERE room_id = $id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <title>แก้ไขข้อมูลห้อง</title>

</head>

<body>

<h1>แก้ไขข้อมูลห้อง</h1>

<form action="save_room_data.php" method="post">

    <input
        type="hidden"
        name="room_id"
        value="<?= $row["room_id"] ?>"
    >

    หมายเลขห้อง
    <br>

    <input
        type="text"
        name="room_number"
        value="<?= $row["room_number"] ?>"
    >

    <br><br>

    ชื่อห้อง
    <br>

    <input
        type="text"
        name="room_name"
        value="<?= $row["room_name"] ?>"
    >

    <br><br>

    รายละเอียดห้อง
    <br>

    <textarea
        name="room_description"
        rows="4"
        cols="40"
    ><?= $row["room_description"] ?></textarea>

    <br><br>

    ชั้น
    <br>

    <select name="floor_id">

        <option value="1"
            <?= $row["floor_id"] == 1 ? "selected" : "" ?>>
            ชั้น 1
        </option>

        <option value="2"
            <?= $row["floor_id"] == 2 ? "selected" : "" ?>>
            ชั้น 2
        </option>

        <option value="3"
            <?= $row["floor_id"] == 3 ? "selected" : "" ?>>
            ชั้น 3
        </option>

        <option value="4"
            <?= $row["floor_id"] == 4 ? "selected" : "" ?>>
            ชั้น 4
        </option>

    </select>

    <br><br>

    จำนวนที่นั่ง
    <br>

    <input
        type="number"
        name="room_seats"
        value="<?= $row["room_seats"] ?>"
    >

    <br><br>

    ประเภทห้อง
    <br>

    <select name="room_type_id">

        <option value="1"
            <?= $row["room_type_id"] == 1 ? "selected" : "" ?>>
            ห้องเรียน
        </option>

        <option value="2"
            <?= $row["room_type_id"] == 2 ? "selected" : "" ?>>
            ห้องปฏิบัติการ
        </option>

        <option value="3"
            <?= $row["room_type_id"] == 3 ? "selected" : "" ?>>
            ห้องประชุม
        </option>

        <option value="4"
            <?= $row["room_type_id"] == 4 ? "selected" : "" ?>>
            ห้องอบรม
        </option>

    </select>

    <br><br>

    สถานะ
    <br>

    <select name="room_status">

        <option value="1"
            <?= $row["room_status"] == 1 ? "selected" : "" ?>>
            พร้อมใช้งาน
        </option>

        <option value="0"
            <?= $row["room_status"] == 0 ? "selected" : "" ?>>
            ไม่พร้อมใช้งาน
        </option>

    </select>

    <br><br>

    <button type="submit">
        บันทึกการแก้ไข
    </button>

    <a href="index.php">
        ยกเลิก
    </a>

</form>

</body>

</html>