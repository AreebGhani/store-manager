<?php

session_start();

include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
 }


$id = $_GET['id'];

$query = "DELETE FROM conversation WHERE id = '$id'";

$insert = mysqli_query($connect, $query);

if($insert){
    header('location:../talk.php');
}

?>