<?php
include '../dbconnect.php';
session_start();
if(isset($_GET['data'])){
    if($_GET['data'] == 'payremaining'){
        $searchname = $_GET['custna'];
        $payment = $_GET['paymentvalue'];
        $server2 = "localhost";$user2 = "root";$password2 = "";
        $connect2 = mysqli_connect($server2, $user2, $password2);
       $r = mysqli_query($connect2,"SHOW DATABASES");
       while ($row = mysqli_fetch_array($r)) {
          if($row[0] == $searchname){
             $server3 = "localhost";$user3 = "root";$password3 = "";$database3 = $searchname;
             $connect3 = mysqli_connect($server3, $user3, $password3,$database3);
             $searchtable = mysqli_query($connect3,"SHOW TABLES");
               while($table = mysqli_fetch_array($searchtable)){
                  $q= "SELECT borrow FROM ".$table[0]."";
                  $g = mysqli_query($connect3, $q);
                  $sr = mysqli_fetch_array($g);
                  $s = $sr['borrow'];
                  $b = $table[0];
                  $q = "UPDATE ".$b." SET borrow = ''";
                  mysqli_query($connect3, $q);
                  $q2 = "UPDATE ".$b." SET remaining = ''";
                  mysqli_query($connect3, $q2);
                  $q3 = "UPDATE ".$b." SET payment = '$payment'";
                  mysqli_query($connect3, $q3);
                  $q4 = "UPDATE ".$b." SET cashback = '$s'";
                  $sql = mysqli_query($connect3, $q4);
                }
                if($sql){
                    echo "<script>alert('Remaining Paid By ‟".$searchname."” . . .');history.go(-2);</script>";
                }
            }else{ }
        }
    }
}
?>