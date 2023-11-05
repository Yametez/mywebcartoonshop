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
    $sql = "UPDATE books SET book_name = '".trim($_POST['book_name'])."',
                            detail = '".trim($_POST['detail'])."' ,
                            price = '".trim($_POST['price'])."', 
                            amount = '".trim($_POST['amount'])."',
                            book_image = '".trim($_POST['book_image'])."' where book_ID = '".$_POST['UserID']."'";
    $query = mysqli_query($conn, $sql);
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย')</script>";
    mysqli_close($conn);
?>
</body>
</html>