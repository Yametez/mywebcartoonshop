<!DOCTYPE html>
<html lang="en">
<head>
    <title>รับค่าแก้ไขข้อมูล</title>
    <meta http-equiv="refresh" content="1;URL=login.html">
</head>
<body>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check if the form was submitted
if(isset($_POST['Username']) && isset($_POST['mem_Password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['mem_Password']);

    $sql = "SELECT * FROM members WHERE Username='$username' AND mem_Password='$password'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($result) {
        // User is authenticated
        $_SESSION["mem_ID"] = $result["mem_ID"];
        $_SESSION["Status"] = $result["Status"];
        session_write_close();
        if ($result["Status"] == "ADMIN") {
            header("location:/project/admin/index.php");
            exit(); // Make sure to exit to prevent further execution
        } else {
            header("location:/project/show_product.php");
            exit(); // Make sure to exit to prevent further execution
        }
    } else {
        echo "Username or password is incorrect.";
    }
}

mysqli_close($conn);
?>