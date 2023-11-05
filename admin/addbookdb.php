<!DOCTYPE html>
<html lang="en">
<head>
    <title>รับค่าแก้ไขข้อมูล</title>
    <meta http-equiv="refresh" content="1;URL=report_order.php">
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thatdata";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
    }   
    
    $sql = "insert into books(book_name, detail, price, amount, book_image) 
    values('".$_POST["book_name"]."','".$_POST["detail"]."','".$_POST["price"]."','".$_POST["amount"]."','".$_POST["book_image"]."')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "เพิ่มข้อมูลสำเร็จ";
    }
    mysqli_close($conn);
?>
</body>
</html>