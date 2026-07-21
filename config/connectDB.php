<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drrh_db";
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname"; 
        charset=utf8mb4",
        $username,
        $password,
        );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, 
                       PDO::ERRMODE_EXCEPTION
        );
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 
                       PDO::FETCH_ASSOC
        );
    }catch (PDOException $e) {
        exit("ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $e->getMessage());
}
?>