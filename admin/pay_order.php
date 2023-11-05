<?php
include 'connect.php';
$ids=$_GET['id'];

$sql="UPDATE tb_order SET order_status = 2 where order_ID = '$ids' ";
$result=mysqli_query($conn,$sql);
if($result){
    
    echo "<script>window.location='report_orderlist.php';</script>";
}else{
    echo "<script>alert ('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($conn);  

?>
