<?php
session_start();
include "../dbconnect.php";
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
}
extract($_POST);

if(isset($_POST['submit'])){
    
    date_default_timezone_set("Asia/Karachi");
    $date =  date("d/m/Y h:i:s a", time());

    $query = "insert into joiningrequest (Names, Emails, ContactNo, Messages, At) values('$name','$email', '$phone', '$message', '$date')";
 
    $result = mysqli_query($connect,$query);
        
    if($result){
        $select = "SELECT * FROM users";
        $result = mysqli_query($connect, $select);

        while($array = mysqli_fetch_array($result)){

            $id = $array['id'];

            $query = "UPDATE users SET PopUp = 1 WHERE id = $id";
            $insert = mysqli_query($connect, $query);

        }

        if($insert){

            echo "<script>
                alert('Request Sent . . . ! !');
            </script>";

            header('location:../../index.html');

        }
    
    } else {

       ?>
       <script>
         alert("Please Retry . . . ! !");
         location.replace('../join.html');
       </script>
       <?php

    }


} else {

    ?>
    <script>
        alert("Please Retry . . . ! !");
        location.replace('../join.html');
    </script>
    <?php

}

?>