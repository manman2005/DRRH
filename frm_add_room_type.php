<?php
include "config/connectDB.php";

// ดึงข้อมูลประเภทห้องเรียนทั้งหมดเพื่อนำมาแสดงในตารางด้านล่าง
$sql = "SELECT * FROM tb_room_types ORDER BY room_type_id ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลประเภทห้อง</title>
</head>

<body>

<h1>เพิ่มข้อมูลประเภทห้อง</h1>

<form action="save_room_type.php" method="post">

    ชื่อประเภทห้อง
    <br>
    <input type="text" name="room_type_name" required>
    <br><br>

    สถานะ
    <br>
    <select name="room_type_status">
        <option value="1">พร้อมใช้งาน</option>
        <option value="0">ไม่พร้อมใช้งาน</option>
    </select>
    <br><br>

    <button type="submit">บันทึก</button>
    <a href="index.php">ยกเลิก</a>

</form>

<br><br>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>รหัส</th>
        <th>ชื่อประเภทห้อง</th>
        <th>สถานะ</th>
        <th>จัดการ</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row["room_type_id"] ?></td>
            <td><?= $row["room_type_name"] ?></td>
            <td>
                <?php
                if (isset($row["room_type_status"]) && $row["room_type_status"] == 1) {
                    echo "พร้อมใช้งาน";
                } else {
                    echo "ไม่พร้อมใช้งาน";
                }
                ?>
            </td>
            <td>
                <a href="edit_room_type.php?id=<?= $row["room_type_id"] ?>">แก้ไข</a>
                |
                <a href="delete_room_type.php?id=<?= $row["room_type_id"] ?>" onclick="return confirm('ต้องการลบข้อมูลนี้หรือไม่?')">ลบ</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>