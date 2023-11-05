<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>ฟอร์มกรอกข้อมูลหนังสือ</title>
    
</head>
<body>

<form name="addbookdb" action="addbookdb.php" method="post">
<form name="/admin/report_order" action="/admin/report_order.php" method="post">
    <div class="container">
        <table class="table table-hover table-bordered">
            <tr>
                <td>ชื่อหนังสือ</td>
                <td><input type="book_name" class="control" placeholder="ชื่อหนังสือ" name="book_name"></td>
            </tr>
            <tr>
                <td>รายละเอียดหนังสือ</td>
                <td><input type="detail" class="control" placeholder="รายละเอียดหนังสือ" name="detail"></td>
            </tr>
            <tr>
                <td>ราคา</td>
                <td><input type="price" class="control" placeholder="ราคา" name="price"></td>
            </tr>
            <tr>
                <td>จำนวนหนังสือ</td>
                <td><input type="amount" class="control" placeholder="จำนวนหนังสือ" name="amount"></td>
            </tr>
            <tr> 
                <td>รูปภาพ</td>
                <td><input type="file" class="control" name="book_image" required>
                <form name="addbookdb" action="addbookdb.php" method="post" enctype="multipart/form-data"></td>
                
            </tr>

            
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" onclick="history.back()">cancle</button>
    </div>
</form>
</body>
</html>