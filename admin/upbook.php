<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}


$ids=$_POST['pid'];
$nums=$_POST['pnum'];

$sql= "UPDATE books SET amount = amount + $nums where book_ID='$ids' ";
$hand=mysqli_query($conn,$sql);
if($hand){
    echo "<script> alert('อัปเดตจำนวนหนังสือเรียบร้อย'); </script>";
    echo "<script> window.location='index.php'; </script>";
}else{
    echo "<script> alert ('ไม่สามารถอัปเดตจำนวนหนังสือได้'); </script>";
}
mysqli_close($conn);
?>