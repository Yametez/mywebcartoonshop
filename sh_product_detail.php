<?php include 'connect.php' ?>
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
  <br>
<div class="container">
  <div class="row">
  <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE book_ID = $id ORDER BY book_ID";    
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result )
    ?>

    <div class="col-md-4">
      <img src="admin\img/<?=$row['book_image']?>" width="350px" class="mt-2 p-2 my-2 border"/>
    </div>

    <div class="col-md-6">
      <br><br>
      <h5 class="text-success"><?=$row['book_name']?></h5><!--ชื่อเรื่อง-->
      รายละเอียด : <?=$row['detail']?><br><br>
      ราคา<b class="text-danger"> <?=$row['price']?></b> บาท <br>
      <a class="btn btn-outline-primary mt-3" href="order.php?id=<?=$row['book_ID']?>"> เพิ่มสินค้า </a>
    </div>

  </div>
</div> 
<?php
mysqli_close($conn);
?>
    
</body>
</html>