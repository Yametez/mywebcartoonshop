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

$sql = "CREATE TABLE tb_order (
    order_ID INT(13) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cus_name VARCHAR(60),
    c_address VARCHAR(500),
    telephone VARCHAR(10),
    total_price FLOAT(8,2),
    order_status VARCHAR(1),
    reg_date TIMESTAMP )";


if (mysqli_query($conn, $sql)){
    echo "สร้างตารางข้อมูลสำเร็จ";
}else{
    echo "สร้างตารางไม่สำเร็จ" . mysqli_error($conn);
}
mysqli_close($conn);
?>