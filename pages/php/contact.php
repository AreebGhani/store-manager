<?php

include "../../panel/dbconnect.php";

extract($_POST);

if(isset($_POST['submit'])){


    date_default_timezone_set("Asia/Karachi");
    $date =  date("d/m/Y h:i:s a", time());
         
    $query = "insert into messages (Names, Emails, Subjects, Messages, At) values('$name','$email', '$subject', '$message', '$date')";
 
    $result = mysqli_query($connect,$query);

    if($result){
        
        ?>
        <script>
            alert("Message Sent . . . ! !");
           location.replace('../contact.html');
        </script>
        <?php
            
    } else {

        ?>
        <script>
            alert("Please Retry . . . ! !");
           location.replace('../contact.html');
        </script>
        <?php

    }

}

?>