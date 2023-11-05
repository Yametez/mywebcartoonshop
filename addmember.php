<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thatdata";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
    }   
    $sql = "insert into members(mem_Name, mem_Surname, Username, mem_Password, mem_Address, Tel) 
    values('".$_POST["mem_Name"]."','".$_POST["mem_Surname"]."','".$_POST["Username"]."','".$_POST["mem_Password"]."','".$_POST["mem_Address"]."','".$_POST["Tel"]."')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "เพิ่มข้อมูลสำเร็จ";
    }
    mysqli_close($conn);
?>
<meta http-equiv="refresh" content="1;URL=login.html" /> 