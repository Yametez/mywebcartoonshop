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
                            <li class="breadcrumb-item active">หนังสือที่มีน้อยกว่า 10 เล่ม</li>
                        </ol>
                        
                            
                        

                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="alert alert-danger" role="alert"> 
                                <h4>รายการหนังสือที่มีน้อยกว่า 10 เล่ม</h4> 
                                </div>
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
                                $sql="select * from books where amount <= 10";
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
