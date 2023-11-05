<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//รายการสั่งซื้อที่ยังไม่ชำระเงิน
$sql1="select COUNT(order_ID) AS order_no from tb_order where order_status='1' ";
$hand=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($hand);

//รายการสั่งซื้อที่ชำระเงินแล้ว
$sql2="select COUNT(order_ID) AS order_yes from tb_order where order_status='2' ";
$hand=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($hand);

//รายการสั่งซื้อที่ยกเลิก
$sql3="select COUNT(order_ID) AS order_cancel from tb_order where order_status='0' ";
$hand=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_array($hand);

//รายการหนังสือที่น้อยกว่า10เล่ม
$sql4="select COUNT(book_ID) AS book_num from books where amount <10 ";
$hand=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_array($hand);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>หน้าแรก Admin</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    </head>
    <body class="sb-nav-fixed">
        <?php include 'menu.php' ?>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">ข้อมูลหลังบ้าน</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">รายการการสั่งซื้อ</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">รายการสั่งซื้อหนังสือ(ที่ยังไม่ได้ชำระเงิน)<h4>[<?=$row1['order_no']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="report_orderlist.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">รายการสั่งซื้อหนังสือ(ชำระเงินแล้ว)<h4>[<?=$row2['order_yes']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="report_orderlist_yes.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">รายการสั่งซื้อหนังสือ(ยกเลิกแล้ว)<h4>[<?=$row3['order_cancel']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="report_orderlist_no.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">รายการหนังสือที่เหลือน้อยกว่า 10 เล่ม<h4>[<?=$row4['book_num']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bookStock.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                
                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                หนังสือในคลัง
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>รูปภาพ</th>
                                            <th>รหัสหนังสือ</th>
                                            <th>ชื่อหนังสือ</th>
                                            <th>รายละเอียดหนังสือ</th>
                                            <th>ราคา</th>
                                            <th>จำนวน</th>
                                            <th>เพิ่มสต็อกหนังสือ</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>book_ID</th>
                                            <th>book_name</th>
                                            <th>detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                            <?php
                                $sql="select * from books ";
                                $hand=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_array($hand)){       
                            ?>                        
                                        <tr>
                                            <td><img src="img/<?=$row['book_image']?>" width="100" height="100"></td>
                                            <td><?=$row['book_ID']?></td>
                                            <td><?=$row['book_name']?></td>
                                            <td><?=$row['detail']?></td>
                                            <td><?=$row['price']?></td>
                                            <td><?=$row['amount']?></td>
                                            <td><a href="addStock.php?id=<?=$row['book_ID']?>" class="btn btn-success">เพิ่ม</a></td>
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
                <?php include 'footer.php' ?>
                
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
