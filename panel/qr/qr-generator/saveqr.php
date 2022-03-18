<?php
session_start();
include '../../dbconnect.php';
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
 }

$InvoiceNo = $_GET['in'];
$QRCode = $_GET['qr'];

$query = "UPDATE purchaseproducts SET QRCode = '$QRCode' WHERE InvoiceNo = '$InvoiceNo'";
$insert = mysqli_query($connect, $query);

$query2 = "UPDATE products SET QRCode = '$QRCode' WHERE InvoiceNo = '$InvoiceNo'";
$insert2 = mysqli_query($connect, $query2);

if($insert){
    echo "<script>location.replace('../../additem/purchase.php');</script>"; 
} else { 
    echo "<script>alert('Please Retry . . .');
    location.replace('../../additem/purchase.php');</script>"; 
}

?>