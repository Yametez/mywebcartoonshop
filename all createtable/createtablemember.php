<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata"; // เปลี่ยนเป็นชื่อของฐานข้อมูลที่คุณสร้างไว้แล้ว

// กำหนดการเชื่อมต่อกับ MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คำสั่ง SQL สำหรับสร้างตาราง Customers
$sql = "CREATE TABLE members (
    mem_ID INT(13) unsigned auto_increment PRIMARY KEY,
    mem_Name VARCHAR(25),
    mem_Surname VARCHAR(25),
    mem_Address VARCHAR(150),
    Tel VARCHAR(10),
    Username VARCHAR(20),
    mem_Password VARCHAR(12),
    Status enum('ADMIN','USER') not null default 'USER')";

if (mysqli_query($conn, $sql)){
    echo "สร้างตารางข้อมูลสำเร็จ";
}else{
    echo "สร้างตารางไม่สำเร็จ" . mysqli_error($conn);
}
mysqli_close($conn);
?>