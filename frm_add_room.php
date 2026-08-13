<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <title>เพิ่มข้อมูลห้อง</title>

</head>

<body>

<h1>เพิ่มข้อมูลห้อง</h1>

<form action="save_room_data.php" method="post">

    หมายเลขห้อง
    <br>

    <input
        type="text"
        name="room_number"
        required
    >

    <br><br>

    ชื่อห้อง
    <br>

    <input
        type="text"
        name="room_name"
        required
    >

    <br><br>

    รายละเอียดห้อง
    <br>

    <textarea
        name="room_description"
        rows="4"
        cols="40"
    ></textarea>

    <br><br>

    ชั้น
    <br>

    <select name="floor_id">

        <option value="1">ชั้น 1</option>
        <option value="2">ชั้น 2</option>
        <option value="3">ชั้น 3</option>
        <option value="4">ชั้น 4</option>

    </select>

    <br><br>

    จำนวนที่นั่ง
    <br>

    <input
        type="number"
        name="room_seats"
    >

    <br><br>

    ประเภทห้อง
    <br>

    <select name="room_type_id">

        <option value="1">
            ห้องเรียน
        </option>

        <option value="2">
            ห้องปฏิบัติการ
        </option>

        <option value="3">
            ห้องประชุม
        </option>

        <option value="4">
            ห้องอบรม
        </option>

    </select>

    <br><br>

    สถานะ
    <br>

    <select name="room_status">

        <option value="1">
            พร้อมใช้งาน
        </option>

        <option value="0">
            ไม่พร้อมใช้งาน
        </option>

    </select>

    <br><br>

    <button type="submit">
        บันทึก
    </button>

    <a href="room_list.php">
        ยกเลิก
    </a>

</form>

</body>

</html>