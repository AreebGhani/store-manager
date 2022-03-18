<?php
session_start();
include '../dbconnect.php';
if(isset($_GET['data'])){
    $pna = $_GET['data'];
    if(isset($_SESSION['billcache'])){
      $billcache = $_SESSION['billcache'];
      if($billcache == 'cust'){
          $products = "SELECT * FROM purchaseproducts WHERE ProductName = '$pna'";
  $result = mysqli_query($connect, $products);
  while($array = mysqli_fetch_array($result)){
    $ppr = $array['SalePrice'];
  } 
  $billno = round(microtime(true));
  if(!isset($_SESSION['billno'])){$_SESSION['billno'] = $billno;}
  $pqty = 1; $pdis = 0; $ptx = 0;
  $subtotal = $ppr * $pqty - $pdis;
  $query = "INSERT INTO prodcache (pna, ppr, pqty, ptx, pdis, subtotal) VALUES ('$pna','$ppr','$pqty','$ptx','$pdis','$subtotal')";
  $insert = mysqli_query($connect, $query);
  if(isset($_SESSION['billcache3'])){
    $billcache3 = $_SESSION['billcache3'];
    if($billcache3 == 'table'){
      $cust = "SELECT * FROM custcache";
      $result1 = mysqli_query($connect, $cust);
      while($custarray = mysqli_fetch_array($result1)){
        $custna = $custarray['custna'];
        $custad = $custarray['custad'];
        $custcno = $custarray['custcno'];
        $custem = $custarray['custem'];
      }
      $query = "INSERT INTO ".$custna." (custna, custad, custcno, custem, pna, ppr, pqty, ptx, pdis, subtotal) VALUES ('$custna','$custad','$custcno','$custem','$pna','$ppr','','','','')";
      $insert = mysqli_query($connect, $query);
      echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
    }
  }
  if($insert){
    $_SESSION['billcache2'] = "prod"; 
    echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno#products');</script>"; 
  } else { echo "<script type='text/javascript'>alert('Please Retry . . .');window.location.replace('./index.php');</script>"; }
      }else{
          echo "<script type='text/javascript'>alert('Please Add Customer Detail First . . .');window.location.replace('./index.php');</script>";
      }
  }else{echo "<script type='text/javascript'>alert('Please Add Customer Detail First . . .');window.location.replace('./index.php');</script>";}
}
if(isset($_GET['data2'])){
  $pna = $_GET['data2'];
  $tablename = $_SESSION['tablename'];
        $products = "SELECT * FROM purchaseproducts WHERE ProductName = '$pna'";
$result = mysqli_query($connect, $products);
while($array = mysqli_fetch_array($result)){
  $ppr = $array['SalePrice'];
}
date_default_timezone_set("Asia/Karachi");
$datetime =  date("d/m/Y . h:i:s a", time());
$temp = explode(".", $datetime);
$date = $temp[0];
$time = end($temp);
$billno = round(microtime(true));
if(!isset($_SESSION['billno'])){$_SESSION['billno'] = $billno;}
$pqty = 1; $pdis = 0; $ptx = 0;
$subtotal = $ppr * $pqty - $pdis;
$query1 = "UPDATE ".$searchname." SET pna = '$pna' WHERE id = 1";
mysqli_query($connect, $query1);
$query2 = "UPDATE ".$searchname." SET ppr = '$ppr' WHERE id = 1";
mysqli_query($connect, $query2);
$query3 = "UPDATE ".$searchname." SET pqty = '$pqty' WHERE id = 1";
mysqli_query($connect, $query3);
$query4 = "UPDATE ".$searchname." SET ptx = '$ptx' WHERE id = 1";
mysqli_query($connect, $query4);
$query5 = "UPDATE ".$searchname." SET pdis = '$pdis' WHERE id = 1";
mysqli_query($connect, $query5);
$query6 = "UPDATE ".$searchname." SET subtotal = '$subtotal' WHERE id = 1";
mysqli_query($connect, $query6);
$query7 = "UPDATE ".$searchname." SET date = '$date' WHERE id = 1";
mysqli_query($connect, $query7);
$query8 = "UPDATE ".$searchname." SET time = '$time' WHERE id = 1";
$insert = mysqli_query($connect, $query8);
if($insert){
  $_SESSION['billcache'] = "cust";
  $_SESSION['billcache2'] = "prod"; 
  echo "<script type='text/javascript'>window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
}
}
?>