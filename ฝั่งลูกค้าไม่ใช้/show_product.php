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
  <div class="container">
  <br><br>
    <div class="row">
      <?php
      $sql ="select * from books WHERE amount > 0 ORDER BY book_ID ";
      $result = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result )) {
      ?>
      <div class="col-sm-3">
        <!--<div class="col-lg-3 col-md-3 col-sm-6"> ตัวเพื่อเปลี่ยน-->
          <div class="text-center">
            <img src="admin\img/<?=$row['book_image']?>" width="200px" height="250" class="mt-5 p-2 my-2 border"> <br>
      
            <h5 class="text-success"><?=$row['book_name']?></h5><!--ชื่อเรื่อง-->
            ราคา<b class="text-danger"> <?=$row['price']?></b> บาท <br>
            <a class="btn btn-outline-primary mt-3" href="sh_product_detail.php?id=<?=$row['book_ID']?>"> รายละเอียด </a>
          </div>
          <br>
      </div>
      <?php
      }
      mysqli_close($conn);
      ?>
  </div>
</div>

    
</body>
</html>