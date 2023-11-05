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
$sql="select * from books where book_ID = '$ids' ";
$hand=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($hand);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>เพิ่มสต็อกหนังสือ Admin</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    </head>
<body class="sb-nav-fixed">
<?php include 'menu.php' ?>
<div id="layoutSidenav_content">
    <div class="container">
    <div class="row">
    <div class="col-sm-5">


<div class="alert alert-success mt-4 h3" role="alert">
  เพิ่มจำนวนหนังสือในสต็อก
</div>
<form name="form1" method="post" action="upbook.php">
<div class="mb-3 mt-3"> 
<label>รหัสหนังสือ</label>
<input type="text" name="pid" class="form-control" readonly value="<?=$row['book_ID']?>">
</div> 
<div class="mb-3 mt-3"> 
<label>ชื่อหนังสือ</label>
<input type="text" name="pnam" class="form-control" readonly value="<?=$row['book_name']?>">
</div> 
<div class="mb-3 mt-3"> 
<label>เพิ่มจำนวนหนังสือ</label>
<input type="text" name="pnum" class="form-control" required>
</div> 
<input type="submit" name="submit" class="btn btn-success" value="Submit">
<a href="index.php" class="btn btn-danger">Cancel</a>

</form>
</div>
  </div>


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