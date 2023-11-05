<!doctype html>
<html>
    <head>
        <title>เรียกข้อมูลขึ้นมาแสดง</title>
        <meta http-equiv="Content-Type" Content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8"> 
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </head>
<body>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thatdata";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

$sql="select * from books";
$query = mysqli_query($conn,$sql);
?>
    <div class="container">
        <table class ="table table-hover table-bordered">
            <tr>
                <th width="90">ลำดับหนังสือ</th>
                <th width="90">ชื่อหนังสือ</th>
                <th width="90">รายละเอียดหนังสือ</th>
                <th width="90">ราคา</th>
                <th width="90">จำนวนหนังสือ</th>
                <th width="90">รูปภาพ</th>
                <th width="90"></th>
                <th width="90"></th>
                
            </tr>
            <?php
                while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
                {
            ?>
            <tr>
                <td><?php echo $result["book_ID"];?></td>
                <td><?php echo $result["book_name"];?></td>
                <td><?php echo $result["detail"];?></td>
                <td><?php echo $result["price"];?></td>
                <td><?php echo $result["amount"];?></td>
                <td><img src="img/<?=$result ['book_image']?>" width="200px" height="250"> </td>
                
                
                <td><a href="editbooks.php?UserID=<?php echo $result["book_ID"];?>">
                <button type="button" class="btn btn-info">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg>edit</a></button></td>
            <td><a href="delete.php?UserID=<?php echo $result["book_ID"];?>">
            <button type="button" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>ลบข้อมูล</button></a></td>
            </tr>
            <?php
            }
            ?>
    </div>
        <?php
        mysqli_close($conn);
        ?>        
</body>
</html>