<?php

include "config/connectDB.php";

$id = $_GET["id"];

$sql = "SELECT * FROM tb_roomdata
        WHERE room_id = $id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$sqlroomtype = "SELECT * FROM tb_room_types ORDER BY room_type_id DESC";
$resultroomtype = mysqli_query($conn, $sqlroomtype);
$sqlflo = "SELECT * FROM tb_floors ORDER BY floor_id";
$resultflo = mysqli_query($conn, $sqlflo);
?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <title>แก้ไขข้อมูลห้อง</title>

</head>

<body>

<h1>แก้ไขข้อมูลห้อง</h1>

<form action="update_room_data.php" method="post">

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
            <?php while ($rowflo = mysqli_fetch_assoc($resultflo)) { ?>
                <option value="<?= $rowflo['floor_id'] ?>" <?= ($row['floor_id'] == $rowflo['floor_id']) ? "selected" : "" ?>>
                    <?= $rowflo['floor_name'] ?>
                </option>
            <?php } ?>
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
            <?php while ($rowroomtype = mysqli_fetch_assoc($resultroomtype)) { ?>
                <option value="<?= $rowroomtype['room_type_id'] ?>" <?= ($row['room_type_id'] == $rowroomtype['room_type_id']) ? "selected" : "" ?>>
                    <?= $rowroomtype['room_type_name'] ?>
                </option>
            <?php } ?>
    </select>

    <br><br>

    สถานะ
    <br>

    <select name="room_status">
        <option value="1" <?= (isset($row["room_status"]) && $row["room_status"] == 1) ? "selected" : "" ?>>
            พร้อมใช้งาน
        </option>
        <option value="0" <?= (isset($row["room_status"]) && $row["room_status"] == 0) ? "selected" : "" ?>>
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