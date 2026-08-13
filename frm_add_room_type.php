<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <title>เพิ่มข้อมูลชั้นและประเภท</title>

</head>

<body>

<h1>เพิ่มข้อมูลประเภทห้อง</h1>

<form action="save_room_type.php" method="post">

    ชื่อประเภทห้อง
    <br>

    <input
        type="text"
        name="room_type_name"
        required
    >
    <input
        type="text"
        name="room_type_status"
        required
    >
    <br><br>

    <button type="submit">
        บันทึก
    </button>

    <a href="index.php">
        ยกเลิก
    </a>

</form>

</body>
</html>