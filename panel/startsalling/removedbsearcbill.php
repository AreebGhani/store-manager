<?php
if(isset($_GET['db'])){
    $db = $_GET['db'];
    if(isset($_GET['searchname'])){
        $searchname = $_GET['searchname'];
        $server3 = "localhost";$user3 = "root";$password3 = "";$database3 = $db;
        $connect3 = mysqli_connect($server3, $user3, $password3,$database3);
        $del = "DROP TABLE ".$searchname."";
        $sql = mysqli_query($connect3, $del);
        if($sql){
            echo "<script>window.location.replace('./searchbill.php?search=".$db."&&submit=')</script>";
        }else{
            echo "<script>alert('Please Retry . . .');window.location.replace('./searchbill.php?search=".$db."&&submit=')</script>";
        }
    }
}
?>