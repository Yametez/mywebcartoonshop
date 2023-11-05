<?php
session_start();
include 'connect.php';

$cusName = $_POST['cus_name'];
$cusAddress = $_POST['cus_add'];
$cusTel = $_POST['cus_tel'];

$sql = "insert into tb_order (cus_name, c_address, telephone, total_price, order_status)
        values ('$cusName', '$cusAddress', '$cusTel', '" . $_SESSION['sum_price'] . "', '1')";
mysqli_query($conn, $sql);

$order_ID = mysqli_insert_id($conn);
$_SESSION['order_id'] = $order_ID ;

for ($i = 0; $i <= (int)$_SESSION['intLine']; $i++) {
    if ($_SESSION['strProductID'][$i] != "") {
        //ดึงข้อมูลสินค้า
        $sql1 = "select * from books WHERE book_ID = '" . $_SESSION['strProductID'][$i] . "' ";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $price = $row1['price'];
        $total = $_SESSION['strQty'][$i] * $price;

        $sql2 = "insert into books_detail (order_ID,book_ID, book_price, book_amount, total)
        values ('$order_ID', '" . $_SESSION['strProductID'][$i] . "', '$price',
        '" . $_SESSION['strQty'][$i] . "', '$total')";
        
        if (mysqli_query($conn, $sql2)) {
            // ตัดสต็อกสินค้า
            $sql3 = "update books set amount = amount - '" . $_SESSION['strQty'][$i] . "'
            where book_ID = '" . $_SESSION['strProductID'][$i] . "'";
            mysqli_query($conn, $sql3);
            //echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้วครับ')</script>";
            echo "<script> window.location='print_order.php';</script>";
        }
    }
}

mysqli_close($conn);
unset($_SESSION['intLine']);
unset($_SESSION['strProductID']);
unset($_SESSION['strQty']);
unset($_SESSION['sum_price']);
?>
