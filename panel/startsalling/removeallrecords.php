<?php
session_start();
include '../dbconnect.php';
if(isset($_GET['searchname'])){
    $searchname = $_GET['searchname'];
    $server2 = "localhost";$user2 = "root";$password2 = "";
    $connect2 = mysqli_connect($server2, $user2, $password2);
    $r = mysqli_query($connect2,"SHOW DATABASES");
    while ($row = mysqli_fetch_array($r)) {
      if($row[0] == $searchname){
          $drop = "DROP DATABASE ".$searchname."";
          $sql = mysqli_query($connect2, $drop);
      }
      $searchtable = mysqli_query($connect,"SHOW TABLES");
      while($table = mysqli_fetch_array($searchtable)){
         if($table[0] == $searchname){
           $drop = "DROP TABLE ".$searchname."";
           $sql = mysqli_query($connect, $drop);
         }
       }
    }
}
unset($_SESSION['searchname']);
unset($_SESSION['db']);
echo "<script type='text/javascript'>window.location.replace('./index.php');</script>";
?>