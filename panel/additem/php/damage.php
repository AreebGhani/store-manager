<?php
session_start();
include '../../dbconnect.php';
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
 }
$pid = $_GET['id'];
date_default_timezone_set("Asia/Karachi");
$datetime =  date("d/m/Y . h:i:s a", time());
$temp = explode(".", $datetime);
$date = $temp[0];
$time = end($temp);
$sel = "SELECT * FROM purchaseproducts WHERE ProductID = '$pid'";
$quer = mysqli_query($connect, $sel);
while ($p=mysqli_fetch_array($quer)) {
    $ProductName = $p['ProductName'];
    $ProductID = $p['ProductID'];
    $ProductSerialNo = $p['ProductSerialNo'];
    $ProductDescription = $p['ProductDescription'];
    $ProductPhoto = $p['ProductPhoto'];
    $ProductQuantity = $p['ProductQuantity'];
    $SellerName = $p['SellerName'];
    $SellerAddress = $p['SellerAddress'];
    $SellerPhoneNo = $p['SellerPhoneNo'];
    $SellerEmail = $p['SellerEmail'];
    $BuyerName = $p['BuyerName'];
    $BuyerAddress = $p['BuyerAddress'];
    $BuyerPhoneNo = $p['BuyerPhoneNo'];
    $BuyerEmail = $p['BuyerEmail'];
    $QRCode = $p['QRCode'];
    $PurchasePrice = $p['PurchasePrice'];
    $SalePrice = $p['SalePrice'];
    $AddedBy = $_SESSION['Name'];
}
$in = "INSERT INTO damageproducts (ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, QRCode, PurchasePrice, SalePrice, AddedBy, Date, Time) VALUES ('$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhoto','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$QRCode','$PurchasePrice','$SalePrice','$AddedBy','$date','$time')";
$d = mysqli_query($connect, $in);
if($d){
    $q = "DELETE FROM soldproducts WHERE ProductID = '$pid'";
    mysqli_query($connect, $q);
    $q2 = "DELETE FROM purchaseproducts WHERE ProductID = '$pid'";
    mysqli_query($connect, $q2);
    $q3 = "UPDATE products SET MarkAs = 'damage' WHERE ProductID = '$pid'";
    mysqli_query($connect, $q3);
    header("location:../damage.php");
}
?>