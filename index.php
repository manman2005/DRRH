<?php

include "config/connectDB.php";

$sql = "SELECT tb_roomdata.*, tb_floors.floor_name, tb_room_types.room_type_name 
        FROM tb_roomdata
        LEFT JOIN tb_floors ON tb_roomdata.floor_id = tb_floors.floor_id
        LEFT JOIN tb_room_types ON tb_roomdata.room_type_id = tb_room_types.room_type_id
        ORDER BY tb_roomdata.room_id DESC";

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
                <?= $row["floor_name"] ?>
            </td>

            <td>
                <?= $row["room_seats"] ?>
            </td>

            <td>
                <?= $row["room_type_name"] ?>
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