<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn -> connect_error){
    die("Connection failed: " . mysqli_connect_error());

}

$sql = "CREATE DATABASE thatdata";
if (mysqli_query($conn, $sql)){
    echo "สร้างฐานข้อมูลสำเร็จ";
}
else{
    echo "ไม่สามารถสร้างฐานข้อมูลได้ " . mysqli_error($conn);
}
mysqli_close($conn);

?>