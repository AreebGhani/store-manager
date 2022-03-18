<?php
include '../dbconnect.php';
if(isset($_GET['searchname'])){
    $searchname = $_GET['searchname'];
    if(isset($_GET['tablename'])){
        $tablename = $_GET['tablename'];
        $server2 = "localhost";$user2 = "root";$password2 = "";
$connect2 = mysqli_connect($server2, $user2, $password2);
$r = mysqli_query($connect2,"SHOW DATABASES");
while ($row = mysqli_fetch_array($r)) {
  if($row[0] == $searchname){
    $server3 = "localhost";$user3 = "root";$password3 = "";$database3 = $searchname;
    $connect3 = mysqli_connect($server3, $user3, $password3,$database3);
    $searchtable = mysqli_query($connect3,"SHOW TABLES");
    while($table = mysqli_fetch_array($searchtable)){
        if($table[0] == $tablename){
            echo "<script type='text/javascript'>window.location.replace('./removedbsearcbill.php?db=".$searchname."&&searchname=".$tablename."');</script>";
        }
    }
  }else { 
    $searchtable = mysqli_query($connect,"SHOW TABLES");
    while($table = mysqli_fetch_array($searchtable)){
        if($table[0] == $tablename){
            echo "<script type='text/javascript'>window.location.replace('./removegetsearchbill.php?db=".$searchname."&&searchname=".$tablename."');</script>";
        }
    }
   }
}
    }
}
?>