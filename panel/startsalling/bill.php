<?php
session_start();
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
  ?>
  <script>history.back();</script>
  <?php
}
$data = $_GET['data'];
if($data == 'billprinted'){
    unset($_SESSION['billcache']);
    unset($_SESSION['billcache2']);
    unset($_SESSION['billcache3']);
    unset($_SESSION['billcache4']);
    unset($_SESSION['total']);
    unset($_SESSION['billno']);
    $cust = "SELECT * FROM custcache";
    $result1 = mysqli_query($connect, $cust);
    while($custarray = mysqli_fetch_array($result1)){
      $custna = $custarray['custna'];
    }
    $query = "DROP TABLE ".$custna."";
    $del = mysqli_query($connect, $query);
    echo "<script type='text/javascript'>window.location.replace('./index.php');</script>";
}
if($data == 'billprintedfromsearch'){
  unset($_SESSION['billcache']);
  unset($_SESSION['billcache2']);
  unset($_SESSION['billcache3']);
  unset($_SESSION['billcache4']);
  unset($_SESSION['total']);
  unset($_SESSION['billno']);
  $searchname = $_SESSION['searchname'];
  $query = "DROP TABLE ".$searchname."";
  $del = mysqli_query($connect, $query);
  if($del){
    unset($_SESSION['searchname']);
    unset($_SESSION['db']);
    unset($_SESSION['tablename']);
    echo "<script type='text/javascript'>window.location.replace('./index.php');</script>";
  }
}
if($data == 'billprintedfromdbsearch'){
  unset($_SESSION['billcache']);
  unset($_SESSION['billcache2']);
  unset($_SESSION['billcache3']);
  unset($_SESSION['billcache4']);
  unset($_SESSION['total']);
  unset($_SESSION['billno']);
  unset($_SESSION['searchname']);
  unset($_SESSION['db']);
  unset($_SESSION['tablename']);
  echo "<script type='text/javascript'>window.location.replace('./index.php');</script>";
}
if($data == 'closebill'){
    unset($_SESSION['billcache']);
    unset($_SESSION['billcache2']);
    unset($_SESSION['billcache3']);
    unset($_SESSION['billcache4']);
    unset($_SESSION['total']);
    unset($_SESSION['billno']);
    echo "<script type='text/javascript'>window.location.replace('./index.php');</script>";
}
?>