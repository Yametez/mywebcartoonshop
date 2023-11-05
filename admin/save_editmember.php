<!DOCTYPE html>
<html lang="en">
<head>
    <title>รับค่าแก้ไขข้อมูล</title>
    <meta http-equiv="refresh" content="1;URL=showdatamember.php">
</head>
<body>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thatdata";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "UPDATE members SET mem_Name = '".trim($_POST['mem_Name'])."',
                            mem_Surname = '".trim($_POST['mem_Surname'])."' ,
                            Username = '".trim($_POST['Username'])."', 
                            mem_Password = '".trim($_POST['mem_Password'])."', 
                            mem_Address = '".trim($_POST['mem_Address'])."',
                            tel = '".trim($_POST['Tel'])."' where mem_ID = '".$_POST['UserID']."'";
    $query = mysqli_query($conn, $sql);
    echo "แก้ไขข้อมูลเรียบร้อย";
    mysqli_close($conn);
?>
</body>
</html>