<?php
include '../dbconnect.php';
session_start();
if(!isset($_SESSION['Name'])){
  ?>
  <script>history.back();</script>
  <?php
}
$searchname = $_SESSION['searchname'];
$db = $_SESSION['db'];
$server2 = "localhost";$user2 = "root";$password2 = "";$database2 = $db;
$connect2 = mysqli_connect($server2, $user2, $password2, $database2);
  $sel = "SELECT * FROM ".$searchname."";
  $r = mysqli_query($connect2, $sel);
    while ($ary = mysqli_fetch_array($r)) {
      $pqty = $ary['pqty'];
      $pid = $ary['pid'];
      $q = "SELECT ProductQuantity FROM soldproducts WHERE ProductID = '$pid'";
      $get = mysqli_query($connect, $q);
      while ($array = mysqli_fetch_array($get)) {
        $save_qty = $array['ProductQuantity'];
      }
      $q2 = "SELECT ProductQuantity FROM purchaseproducts WHERE ProductID = '$pid'";
      $get2 = mysqli_query($connect, $q2);
      while ($array2 = mysqli_fetch_array($get2)) {
        $save_qty2 = $array2['ProductQuantity'];
      }
      $new_qty = $save_qty - $pqty;
      $upate1 = "UPDATE soldproducts SET ProductQuantity = '$new_qty' WHERE ProductID = '$pid'";
      mysqli_query($connect, $upate1);
      $new_qty2 = $save_qty2 + $pqty;
      $upate2 = "UPDATE purchaseproducts SET ProductQuantity = '$new_qty2' WHERE ProductID = '$pid'";
      mysqli_query($connect, $upate2);
      date_default_timezone_set("Asia/Karachi");
      $datetime =  date("d/m/Y . h:i:s a", time());
      $temp = explode(".", $datetime);
      $date = $temp[0];
      $time = end($temp);
      $qu = "SELECT * FROM soldproducts WHERE ProductID = '$pid'";
      $ge = mysqli_query($connect, $qu);
      while ($p = mysqli_fetch_array($ge)) {
       $ProductName = $p['ProductName'];
       $ProductID = $p['ProductID'];
       $ProductSerialNo = $p['ProductSerialNo'];
       $ProductDescription = $p['ProductDescription'];
       $ProductPhoto = $p['ProductPhoto'];
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
      $in = "INSERT INTO returnproducts (ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, QRCode, PurchasePrice, SalePrice, AddedBy, Date, Time) VALUES ('$ProductName','$ProductID','$ProductSerialNo','$pqty','$ProductDescription','$ProductPhoto','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$QRCode','$PurchasePrice','$SalePrice','$AddedBy','$date','$time')";
      mysqli_query($connect, $in);
    }
    $query = "DROP TABLE ".$searchname."";
    $delq = mysqli_query($connect2, $query);
    if($delq){ 
     echo "<script>window.location.replace('./index.php');</script>";
    }
?>