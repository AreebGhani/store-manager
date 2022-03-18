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

    $talk = $_POST['talk'];
    $Name = $_SESSION['Name'];
    $Photo = $_SESSION['Photo'];

    date_default_timezone_set("Asia/Karachi");
    $datetime =  date("d/m/Y . h:i:s a", time());
    $temp = explode(".", $datetime);
    $date = $temp[0];
    $time = end($temp);

    $query = "insert into conversation (Names, Messages, Photo, Date, Time) values('$Name', '$talk', '$Photo', '$date', '$time')";
 
    $result = mysqli_query($connect,$query);

    if($result){
        
        $select = "SELECT * FROM users";
        $result = mysqli_query($connect, $select);
                            
        while($array = mysqli_fetch_array($result)){

            $id = $array['id'];

            $query = "UPDATE users SET Mail = 1 WHERE id = $id";
            $insert = mysqli_query($connect, $query);

        }

        $query = "UPDATE users SET Mail = 0 WHERE Names = '$Name'";
        $insert = mysqli_query($connect, $query);

        ?>
        <script>
            location.replace('../talk.php');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Please Retry . . . ! !');
            location.replace('../talk.php');
        </script>
        <?php
    }

}

?>