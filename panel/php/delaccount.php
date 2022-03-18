<?php 
session_start(); 
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
   ?>
   <script>history.back();</script>
   <?php
}
$id = $_GET['id'];
$q = "SELECT * FROM users WHERE id = '$id'";
$sql = mysqli_query($connect, $q);
while ($array=mysqli_fetch_array($sql)) {
    $Name = $array['Names'];
}
$select = "SELECT * FROM users";
$result = mysqli_query($connect, $select);                                                       
while($array4 = mysqli_fetch_array($result)){
  $admin = $array4['Names'];
  break;
}
if($Name == $admin){
    echo "<script>
    var massage = confirm('Are You Sure To Delete ‟".$Name."” Account  . . . ?');
    if(massage == true){ window.location.replace('./deladmin.php?id=".$id."'); }else{history.back();}
    </script>";
}else{
    $del = "DELETE FROM users WHERE id = '$id'";
    $deleted = mysqli_query($connect, $del);
    if($deleted){
        echo '<script>history.back();</script>';
    }
}
?>