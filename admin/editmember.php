<!doctype html> 
<html>
    <head>
        <title>ฟอร์แก้ไขข้อมูล</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"> 
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
h2{        
    font-family: "JasmineUPC";
    text-align:center;
}    
</style>
</head>
<body>
    <form name="แก้ไขข้อมูลสมาชิก" action="save_editmember.php?id=<?php echo $_GET["UserID"];?>"
    method="post">
<!--หลังจากแก้ไขข้อมูลเรียบร้อยเมื่อกดปุ่มบันทึกแล้วจะส่งค่าไอดีไปเพื่อส่งข้อมูลไปยังไฟล์รับค่าแก้ไขข้อมูลโดย
    จะส่งค่าข้อมูลแบบ post-->
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="thatdata";
$conn=mysqli_connect("$servername", "$username", "$password", "$dbname");
$sql="select * from members where mem_ID ='".$_GET["UserID"]."'";
$query=mysqli_query($conn, $sql); 
$result=mysqli_fetch_array($query);
/* ขั้นตอนการเข้าถึงฐานข้อมูลใน phpmyadmin เริ่มตั้งแต่การเชื่อมกับ phpmyadmin จากนั้นใช้ค่าสั่ง 
select ในการเรียกข้อมูลในตาราง member
ตามค่าของ UserID ที่ส่งมาและใช้ค่าสั่ง query เพื่อให้ข้อมูลมาในตารางในรูปแบบ arrayt*/

if(!$result)
{
   echo "ไม่พบข้อมูล mem_ID=".$_GET["UserID"]; 
   /*ถ้าไม่พบข้อมูลจะแสดงค่าว่าไม่พบข้อมูล UserID ที่ส่งค่ามา*/
}
/*แต่ถ้าพบข้อมูลจะดึงข้อมูลมาแสดงในตารางเพื่อทําการแก้ไข*/ 
else
{
?>
    <div class="container"> 
    <div class="alert alert-success">
    <h2 style="color:Tomato;">แก้ไขข้อมูลสมาชิก</h2>
    </div>
    <table class="table table-hover table-bordered">
<tr>
<th width="150">ลำดับสมาชิก</th>
<td width="240"><input type="hidden" name="UserID"
value="<?php echo $result["mem_ID"]; ?>"><?php echo $result["mem_ID"]; ?></td>
<!--input type="hidden" คือการซ่อนไม่ให้มีการแก้ไขข้อมูลในช่องนี้--> 
<!--value=คือการเรียกข้อมูลขึ้นมาแสดงเพื่อแก้ไข -->
</tr>
<tr>
<th width="150">ชื่อลูกค้า</th>
<td width="240"><input type="mem_Name" class="form-control" name="mem_Name" 
value="<?php echo $result["mem_Name"]; ?>"></td> 
<!--value= คือการเรียกข้อมูลขึ้นมาแสดงเพื่อแก้ไข-->
</tr>
<tr>
<th width="150">นามสกุลลูกค้า</th>
<td width="240"><input type="mem_Surname" class="form-control" name="mem_Surname" 
value="<?php echo $result["mem_Surname"]; ?>"></td> 
<!--value= คือการเรียกข้อมูลขึ้นมาแสดงเพื่อแก้ไข-->
</tr>
<tr>
<th width="150">ชื่อผู้ใช้งาน</th>
<td width="240"><input type="Username" class="form-control" name="Username" 
value="<?php echo $result["Username"];?>"></td> 
<!--value= คือการเรียกข้อมูลขึ้นมาแสดงเพื่อแก้ไข -->
</tr> 
<tr>
<th width="150">รหัสผ่าน</th>    
<td width="240"><input type="mem_Password" class="form-control" name="mem_Password" 
value="<?php echo $result["mem_Password"]; ?>"></td>
<!--value= คือการเรียกข้อมูลขึ้นมาแสดงเพื่อแก้ไข -->
</tr> 
<tr>
<th width="150">ที่อยู่</th>
<td width="240"><input type="mem_Address" class="form-control" name="mem_Address" 
value="<?php echo $result["mem_Address"]; ?>"></td> 
<!--value= คือการเรียกข้อมูลขึ้นมาแสดงเพื่อแก้ไข-->
</tr>
<tr>
<th width="150">เบอร์โทร</th>    
<td width="240"><input type="Tel" class="form-control" name="Tel" 
value="<?php echo $result["Tel"]; ?>"></td>
<!--value= คือการเรียกข้อมูลขึ้นมาแสดงเพื่อแก้ไข -->
</tr> 
</table>
<center><button type="submit" class="btn btn-primary">Submit</button></center>
</div>
<?php 
}
mysqli_close($conn);
?> 
</form>

</body> 
</html>
