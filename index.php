<?php
    include "config/connectDB.php";
    $sql = "SELECT
    tb_roomdata.room_id,
    tb_roomdata.room_number,
    tb_roomdata.room_name,
    tb_roomdata.room_description,
    tb_roomdata.floor_id,
    tb_floors.floor_name,
    tb_roomdata.room_seats,
    tb_roomdata.room_type_id,
    tb_room_types.room_type_name,
    tb_room_types.room_type_status,
    tb_roomdata.room_status 
FROM
    tb_roomdata
    LEFT JOIN tb_room_types ON tb_roomdata.room_type_id = tb_room_types.room_type_id
    LEFT JOIN tb_floors ON tb_roomdata.floor_id = tb_floors.floor_id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการข้อมูลห้อง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> 

</head>
<body>
    <h1>จัดการข้อมูลห้อง</h1>
    <a href="frm_add_room.php" class="btn btn-primary"><i class="fa fa-save"></i>เพิ่มข้อมูลห้อง</a> | 
    <a href="frm_add_room_type.php" class="btn btn-secondary"><i class="fa fa-plus"></i> ข้อมูลประเภทห้อง</a>
    <a href="frm_add_floor.php" class="btn btn-secondary"><i class="fa fa-plus"></i> ข้อมูลชั้น</a>
     <br><br>
    <table class="table table-bordered">
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
     <?php $i=0; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <?php $i++; ?>
        <tr>
            <td class="text-center"><?= $i; ?></td>

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

                <?= $row["room_type_name"]; ?>


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

                <a href="edit_room_data.php?id=<?= $row["room_id"] ?>" class="btn btn-warning btn-sm">
                    <i class="fa fa-edit"></i> แก้ไข
                </a>

                |

                <a
                    href="delete_room_data.php?id=<?= $row["room_id"] ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('ต้องการลบข้อมูลนี้หรือไม่?')"
                >
                    <i class="fa fa-trash"></i> ลบ
                </a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</html>