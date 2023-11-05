<?php
session_start();
include 'connect.php';
$sql="select * from tb_order where order_ID='".$_SESSION['order_id']."'";
$result = mysqli_query($conn, $sql);
$rs=mysqli_fetch_array($result);
$total_price=$rs['total_price'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info h4 text-center mt-4" role="alert">
                การสั่งซื้อเสร็จสมบูรณ์
            </div>
            หมายเลขสั่งซื้อ : <?php echo $rs['order_ID']; ?> <br>
            ชื่อ-นามสกุล : <?php echo $rs['cus_name']; ?> <br>
            ที่อยู่จัดส่ง : <?php echo $rs['c_address']; ?> <br>
            บอร์โทรศัพท์ : <?php echo $rs['telephone']; ?> <br>
            <br>
            <div class="card mb-4 mt-4">
            <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวนสั่งซื้อ</th>
                        <th>ราคารวม</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                /*books_detail ตั้งย่อว่า d
                books ตั้งย่อว่า b */
                $sql1="select * from books_detail d,books b where d.book_ID=b.book_ID and d.order_ID='".$_SESSION['order_id']."'";
                $result1 = mysqli_query($conn, $sql1);
                while($row=mysqli_fetch_array($result1)){
                ?>
                    <tr>
                        <td><?=$row['book_ID']?></td>
                        <td><?=$row['book_name']?></td>
                        <td><?=$row['book_price']?></td>
                        <td><?=$row['book_amount']?></td>
                        <td><?=$row['total']?></td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
            <h6 class="text-end">รวมเป็นเงิน<?=number_format($total_price,2)?>บาท</h6>
            </div>
            </div>
            <div>
                ***โปรดชำระสินค้าหนังสือภายใน 7 วัน หลังจากทำการสั่งซื้อ โอนเงินผ่านธนาคาร ชื่อบัญชี นายก้องเกียรติ เลิศสิทธิรักษ์ 
                ธนาคาร ไทยพาณิชย์ เลขที่บัญชร 360-416-9571
                <br>
            </div>
            <br>
            <div class="text-center">
            <a href="show_product.php" class="btn btn-warning">Back</a>
            <Buttons onclick="window.print()" class="btn btn-info">Print</a></Buttons>
            </div>
        </div>
    </div>
</div>
</body>
</html>
