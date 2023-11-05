<!doctype html>
<html>
    <head>
        <title>รับค่าข้อมูลเพื่อลบออกจากตาราง</title>
    </head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$UserID = $_GET["UserID"];
$sql = "delete from books where book_ID ='".$UserID."'";
$query = mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)){
    echo "ลบข้อมูลเรียบร้อย";
    //ฟังก์ชันmysqli_affected_row(การเชื่อมต่อ) เป็นฟังก์ชันที่เอาไว้ตรวจสอบแถวของข้อมูลที่มีการเปลี่ยนแปลงเช่น
    //แก้ไข หรือลบข้อมูล
    //ตรวจสอบว่าตรวจสอบข้อมูลได้มีการเปลี่ยนแปลงจริงหรือไม่
}
mysqli_close($conn);
?>
</body>
</html>
<meta http-equiv="refresh" content="1;URL=report_order.php">