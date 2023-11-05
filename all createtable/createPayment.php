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

$sql = "CREATE TABLE payment (
    order_ID INT(13) UNSIGNED not null PRIMARY KEY,
    pay_money float(8,2),
    pay_date DATE,
    pay_time TIME,
    pay_image VARCHAR(100))";


if (mysqli_query($conn, $sql)){
    echo "สร้างตารางข้อมูลสำเร็จ";
}else{
    echo "สร้างตารางไม่สำเร็จ" . mysqli_error($conn);
}
mysqli_close($conn);
?>