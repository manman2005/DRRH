<?php
include "config/connectDB.php";

$sql = "SELECT * FROM tb_floors ORDER BY floor_id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลชั้น</title>
</head>
<body>
<h1>เพิ่มข้อมูลชั้น</h1>
<form action="save_floor.php" method="post">
    ชื่อชั้น
    <br>
    <input type="text" name="floor_name" required>
    <br><br>
    <button type="submit">บันทึก</button>
    <a href="index.php">ยกเลิก</a>
</form>
<br><br>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>รหัส</th>
        <th>ชื่อชั้น</th>
        <th>จัดการ</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row["floor_id"] ?></td>
            <td><?= $row["floor_name"] ?></td>
            <td>
                <a href="edit_floor.php?id=<?= $row["floor_id"] ?>">แก้ไข</a>
                |
                <a href="delete_floor.php?id=<?= $row["floor_id"] ?>" onclick="return confirm('ต้องการลบข้อมูลนี้หรือไม่?')">ลบ</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>