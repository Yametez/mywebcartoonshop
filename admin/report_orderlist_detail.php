<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$ids=$_GET['id'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>รายงานการสั่งซื้อหนังสือ Admin</title>
        
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
                                แสดงรายการสั่งซื้อหนังสือ
                               <div>
                                <br>
                                <a href="report_orderlist.php"><button type="button" class="btn btn-outline-success">กลับหน้าหลัก</button></a>
                               </div> 
                            <br>
                       
                            <div class="card-body">
                                <h5>
                                    เลขที่ใบสั่งซื้อ : <?=$ids?>
                                </h5>
                                <table  class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>รหัสหนังสือ</th>
                                            <th>ชื่อหนังสือ</th>
                                            <th>ราคา</th>
                                            <th>จำนวน</th>
                                            <th>ราคารวม</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                    
<?php   


$sql = "select * from  books_detail bd, books b, tb_order t where t.order_ID=bd.order_ID 
and bd.book_ID=b.book_ID and bd.order_ID ='$ids'
order by bd.book_ID ";
$result=mysqli_query($conn,$sql);
$sum_total=0;
while($row=mysqli_fetch_array($result)){
    $sum_total=$row['total_price'];
?>
                                    
                                        <tr>
                                            <td><?=$row['book_ID']?></td>
                                            <td><?=$row['book_name']?></td>
                                            <td><?=$row['book_price']?></td>
                                            <td><?=$row['book_amount']?></td>
                                            <td><?=$row['total']?></td>
                                            
                                            
                                        </tr>
 
                                    
                                    <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    </tbody>
                                </table>
                                <b>ราคารวมสุทธิ <?=number_format($sum_total,2)?>บาท</b>
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
