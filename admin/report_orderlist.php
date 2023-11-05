<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>รายงานการซื้อหนังสือ</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    </head>
    <body class="sb-nav-fixed">
        <?php include 'menu.php' ?>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 ">

                        
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                แสดงข้อมูลการสั่งซื้อหนังสือ
                               <div>
                                <br>
                                <a href="report_orderlist_yes.php"><button type="button" class="btn btn-outline-success">ชำระเงินแล้ว</button></a>
                               <a href="report_orderlist.php"><button type="button" class="btn btn-outline-warning">ยังไม่ชำระเงิน</button></a>
                               <a href="report_orderlist_no.php"><button type="button" class="btn btn-outline-danger">ยกเลิกการสั่งซื้อ</button></a>
                            </div> 
                            <br>
                            <div>
<form name="form1" method="post" action="report_orderlist.php">
<div class="row">
    <div class="col-sm-2">
      <input type="date" name="dt1" class="form-control">
    </div>
    <div class="col-sm-2">
    <input type="date" name="dt2" class="form-control">
    </div>
    <div class="col-sm-4">
    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
    </div>
</div>

</form>


                            </div>


                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>ลูกค้า</th>
                                            <th>ที่อยู่จัดส่ง</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>ราคารวมสุทธิ</th>
                                            <th>วันสั่งซื้อ</th>
                                            <th>สถานะการสั่งซื้อ</th>
                                            <th>รายละเอียด</th>
                                            <th>ปรับสถานะการชำระเงิน</th>
                                            <th>ยกเลิกการสั่งซื้อ</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
<?php   
$ddt1=@$_POST['dt1'];
$ddt2=@$_POST['dt2'];
$add_date= date('Y/m/d', strtotime($ddt2. "+1 days"));

if(($ddt1 != "") & ($ddt2 != "")){
    echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2 " ;
    $sql = "select * from tb_order where order_status='1' and reg_date BETWEEN '$ddt1' and '$ddt2'
    order by reg_date DESC";
}else{
    $sql = "select * from tb_order where order_status='1' order by reg_date DESC";
}


$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
$status = $row['order_status']
?>
                                    
                                        <tr>
                                            <td><?=$row['order_ID']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=$row['c_address']?></td>
                                            <td><?=$row['telephone']?></td>
                                            <td><?=$row['total_price']?></td>
                                            <td><?=$row['reg_date']?></td>
                                            <td>
                                                <?php
                                            if($status == 1){
                                                echo "ยังไม่ชำระเงินแล้ว";
                                            }else if ($status == 2){
                                                echo  "<b style ='color:green' >ชำระเงินแล้ว</b>";
                                            }else if ($status == 0){
                                                echo  "<b style ='color:red' >ยกเลิกการสั่งซื้อ</b>";
                                            }
                                                ?>
                                        
                                        </td>
                                        <td><a href ="report_orderlist_detail.php?id=<?=$row['order_ID']?>" class="btn btn-warning">
                                        รายละเอียด</a></td>

                                        <td><a href ="pay_order.php?id=<?=$row['order_ID']?>" class="btn btn-success"
                                        onclick ="del1(this.href); return false">ปรับสถานะ</a></td>

                                        <td><a href ="cancel_order.php?id=<?=$row['order_ID']?>" class="btn btn-danger"
                                        onclick ="del(this.href); return false">ยกเลิก</a></td>
                                        </tr>
 
                                    
                                    <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<script language="Javascript">
function del(mypage){
    var agree=confirm('คุณต้องการยกเลิกคำสั่งซื้อหรือไม่');
    if(agree){
        window.location=mypage;
    }
}

</script>

<script>
function del1(mypage){
    var agree=confirm('คุณต้องการปรับสถานะการชำระเงินหรือไม่');
    if(agree){
        window.location=mypage;
    }
}

</script>