<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
     <!-- Bootstrap CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include 'menu.php';?>
<br><br>
    <div class="container">
    <form id="form1" method="POST" action="insert_cart.php">
        <div class="row">  
            <div class="col-md-12"> 
            <div class="alert alert-info h5 " role="alert">รายการหนังสือ</div>
            <table class = "table table-hover">
                <tr> 
                    <th>ลำดับที่</th>
                    <th class="text-center" >ชื่อสินค้า</th>
                    <th >ราคา</th>
                    <th class="text-center">จำนวน</th>
                    <th class="text-center">ราคารวม</th>
                    <th >เพิ่ม - ลด</th>
                    <th class="text-center">ลบ</th>
                </tr>
            <?php
            $Total = 0;
            $sumPrice = 0;
            $m = 1;

            if(isset($_SESSION["intLine"])){   // ถ้าไม่เป็นค่าว่างให้ทำงานใน
            
            for($i=0; $i <=(int)$_SESSION["intLine"]; $i++){
                if(($_SESSION["strProductID"][$i]) !=""){
                    $sql="select * from books WHERE book_ID ='" .$_SESSION["strProductID"][$i] . "' ";
                    $result = mysqli_query($conn, $sql);
                    $row_pro = mysqli_fetch_array($result);

                    $_SESSION["price"] = $row_pro['price'];
                    $Total = $_SESSION["strQty"][$i];
                    $sum = $Total * $row_pro['price'];
                    $sumPrice = $sumPrice + $sum;
                    $_SESSION["sum_price"] = $sumPrice;
                
            ?>
                <tr> 
                    <td><?=$m?></td>
                    <td>
                        <img src="admin\img/<?=$row_pro['book_image']?>" width="80" height="100" class="border">
                        <?=$row_pro['book_name']?>
                    </td>
                    <td><?=$row_pro['price']?></td>
                    <td class="text-center"><?=$_SESSION["strQty"][$i]?></td>
                    <td class="text-center"><?=$sum?></td>
                    <td>
                        <a href="order.php?id=<?=$row_pro['book_ID']?>" class="btn btn-outline-primary">+</a><!--ปุ่มเพิ่ม-->
                        <?php if($_SESSION["strQty"][$i] > 1){ ?>
                        <a href="order_del.php?id=<?=$row_pro['book_ID']?>" class="btn btn-outline-primary">-</a><!--ปุ่มลด-->
                    <?php }?>
                    </td>
                    <td class="text-center"><a href= "pro_delete.php?Line=<?=$i?>"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-x-octagon" viewBox="0 0 16 16">
  <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg></a></td>
                </tr>
            <?php
            $m=$m+1;
            }
            }
            } 
            ?>
            <tr>
                <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                <td class="text-center"><?=$sumPrice?></td>
                <td>บาท</td>
            </tr>
            </table>
            <div style="text-align:right">
            <a href="show_product.php"><button type="button" class="btn btn-outline-primary">เลือกสินค้า</button></a> 
            <button type="submit" class="btn btn-outline-success">ยืนยันการสั่งซื้อ</button>
        </div>  
        </div>
            <br>
            <br>
        <div class="row">
            <div class="col-md-9">
                <div class="alert alert-info" h3 role="alert">
                    ที่อยู่จัดส่ง
                </div>
                    ชื่อ-นามสกุล:
                        <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล">
                    ที่อยู่จัดส่ง:
                        <textarea class="form-control" required placeholder="ที่อยู่จัดส่ง" name="cus_add" rows="3"></textarea>
                    เบอร์โทรศัพท์:
                        <input type="tel" name="cus_tel" class="form-control" required placeholder="เบอร์โทรศัพท์">
            </div>
        </div>
        </form>
    </div>
</body>
</html>
 