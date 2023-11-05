<?php 
include 'connect.php';
session_start();
$order_id="";
$name="";
$total=0;


if(isset($_POST['btn1'])){
    $key_word=$_POST['keyword'];
    if($key_word != ""){
        $sql="select * from tb_order where order_ID='$key_word' ";
        unset($_SESSION['error']);
    }else{
        echo "<script>window.location='pay_ment.php'; </script>";
        unset($_SESSION['error']);
    }

    $hand=mysqli_query($conn,$sql);
    $num1=mysqli_num_rows($hand);
    if($num1 == 0 ){
        echo "<script>window.location='pay_ment.php'; </script>";
        $_SESSION['error']="ไม่พบข้อมูลหมายเลขใบสั่งซื้อ";
    }else{

    $row=mysqli_fetch_array($hand);
    $order_id=$row['order_ID'];
    $name=$row['cus_name'];
    $total=$row['total_price'];
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myshop</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php include 'menu.php';?>
<div class="container">




<div class="row mt-4">
<div class="col-md-4">
<div class="alert alert-info" role="alert">
  หลักฐานการชำระเงิน
</div>
<br>

<div class="border mt-5 p2 my-2" style="background-color: #f0f0f5">
<!--ฟอร์มค้นหาเลขที่ใบสั่งซื้อ -->
    <form method="POST" action="pay_ment.php">
    <label>เลขที่ใบสั่งซื้อ</label>
    <input type="text" name="keyword" >
    <button type="submit" name="btn1" class="btn btn-primary">ค้นหา</button><br>
    <?php
    if(isset($_SESSION['error'])){
        echo "<div class='text-danger'> ";
        echo $_SESSION['error'];
        echo "</div>";
    }
    ?>
    

    </form>
</div>

</div>
</div>

<div class="row">
    <div class="col-md-4">
    <form method="POST" action="insertpay_ment.php" enctype="multipart/from-data">
        <label class="mt-4">เลขที่ใบสั่งซื้อ</label>
        <input type="text" name="order_ID" required value=<?=$order_id?>>
        <label class="mt-4">ชื่อผู้ซื้อ</label>
        <textarea class="form-control" name="cus_name" required row="1"><?=$name?> </textarea>
        <label class="mt-4">จำนวน</label>
        <input type="number" class="form-control" name="total_price" required value=<?=$total?>>
        <label class="mt-4">วันที่โอน</label>
        <input type="date" class="form-control" name="pay_date" required>
        <label class="mt-4">เวลาที่โอน</label>
        <input type="time" class="form-control" name="pay_time" required>
        <label class="mt-4">หลักฐานการชำระเงิน</label>
        <input type="file" class="form-control" name="file" required><br>
        <button type="submit" name="btn2" class="btn btn-primary">บันทึก</button>


    </form>
    </div>
</div>

</div>

</body>
</html>