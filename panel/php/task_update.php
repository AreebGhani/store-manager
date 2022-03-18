<?php

session_start();

include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
  ?>
  <script>history.back();</script>
  <?php
}


extract($_POST);

if(isset($_POST['submit'])){

  $Name = $_SESSION['Name'];

  $task = $_POST['task'];

  $query = "UPDATE task SET Tasks = '$task' WHERE Names = '$Name'";

  $insert = mysqli_query($connect, $query);

  if($insert){
    header('location:../task.php');
  }

}

?>