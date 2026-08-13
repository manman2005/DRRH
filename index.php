<?php

include "config/connectDB.php";

$sql = "SELECT * FROM tb_roomdata ORDER BY room_id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <title>จัดการข้อมูลห้อง</title>

</head>

<body>

<h1>จัดการข้อมูลห้อง</h1>

<a href="frm_add_room.php">+ เพิ่มข้อมูลห้อง</a>
<a href="frm_add_floor.php">+ เพิ่มข้อมูลชั้น</a>
<a href="frm_add_room_type.php">+ เพิ่มข้อมูลประเภทห้อง</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>รหัส</th>
        <th>หมายเลขห้อง</th>
        <th>ชื่อห้อง</th>
        <th>รายละเอียด</th>
        <th>ชั้น</th>
        <th>จำนวนที่นั่ง</th>
        <th>ประเภทห้อง</th>
        <th>สถานะ</th>
        <th>จัดการ</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>
                <?= $row["room_id"] ?>
            </td>

            <td>
                <?= $row["room_number"] ?>
            </td>

            <td>
                <?= $row["room_name"] ?>
            </td>

            <td>
                <?= $row["room_description"] ?>
            </td>

            <td>
                <?= $row["floor_id"] ?>
            </td>

            <td>
                <?= $row["room_seats"] ?>
            </td>

            <td>

                <?php

                if ($row["room_type_id"] == 1) {
                    echo "ห้องเรียน";
                } elseif ($row["room_type_id"] == 2) {
                    echo "ห้องปฏิบัติการ";
                } elseif ($row["room_type_id"] == 3) {
                    echo "ห้องประชุม";
                } elseif ($row["room_type_id"] == 4) {
                    echo "ห้องอบรม";
                }

                ?>

            </td>

            <td>

                <?php

                if ($row["room_status"] == 1) {
                    echo "พร้อมใช้งาน";
                } else {
                    echo "ไม่พร้อมใช้งาน";
                }

                ?>

            </td>

            <td>

                <a href="edit_room_data.php?id=<?= $row["room_id"] ?>">
                    แก้ไข
                </a>

                |

                <a
                    href="delete_room_data.php?id=<?= $row["room_id"] ?>"
                    onclick="return confirm('ต้องการลบข้อมูลนี้หรือไม่?')"
                >
                    ลบ
                </a>

            </td>

        </tr>

    <?php } ?>

</table>

</body>

</html>