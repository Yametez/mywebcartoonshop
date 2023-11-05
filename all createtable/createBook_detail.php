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
$sql = "CREATE TABLE books_detail  (
    ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_ID INT(13),
    book_ID INT(13),
    book_price float(8,2),
    book_amount INT(10),
    total float(8,2))";

if (mysqli_query($conn, $sql)){
    echo "สร้างตารางข้อมูลสำเร็จ";
}else{
    echo "สร้างตารางไม่สำเร็จ" . mysqli_error($conn);
}
mysqli_close($conn);
?>