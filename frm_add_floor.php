<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <title>เพิ่มข้อมูลชั้นและประเภท</title>

</head>

<body>

<h1>เพิ่มข้อมูลชั้น</h1>

<form action="save_floor.php" method="post">

    ชื่อชั้น
    <br>

    <input
        type="text"
        name="floor_name"
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