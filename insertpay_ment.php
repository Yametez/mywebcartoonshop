<?php 
include 'connect.php';
$orderID=$_POST['order_ID'];
$totalprice=$_POST['total_price'];
$paydate=$_POST['pay_date'];
$paytime=$_POST['pay_time'];




$sql="insert into payment(order_ID, pay_money, pay_date, pay_time, pay_image) 
      values ('$order_ID', '$totalprice', '$paydate', '$paytime', '$new_image_name')";

$hand=mysqli_query($conn,$sql);
if($hand){
    echo "<script>window.location='pay_ment.php'; </script>";
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
}else{
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
}
mysqli_close($conn);


?>