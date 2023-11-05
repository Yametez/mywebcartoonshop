<?php
session_start();
if ($_SESSION['Status'] != "USER") {
    echo "กรุณา login ใหม่";
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "select * from members where mem_ID = '" . $_SESSION['mem_ID'] . "'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแสดงข้อมูลผู้ใช้</title>
</head>
<body>
    <center>
        <table border="1" width="300px">
            <tr>
                <th>ชื่อเข้าสู่ระบบ</th>
                <td><?php echo $result["Username"];?></td>
            </tr>
            <tr>
                <th>ชื่อ</th>
                <td><?php echo $result["mem_Name"];?></td>
            </tr>
            
        </table>
    </center>
    <a href="logout.php">ออกจากระบบ</a>
</body>
</html>
<?php
mysqli_close($conn);
?>
