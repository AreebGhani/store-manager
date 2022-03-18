<?php

session_start();

include "./dbconnect.php";

extract($_POST);

if (isset($_POST["submit"])) {

  $Email = $_POST['email'];
  $Password = $_POST['password'];

  $Search_Email =  "select * from users where Emails = '$Email' ";

  $Query = mysqli_query( $connect, $Search_Email );
       
  $Count_Emails = mysqli_num_rows($Query);
   
    if($Count_Emails > 0){
         
      $Checked_Emails = mysqli_fetch_array($Query);
      $Check_Password = $Checked_Emails['Password'];
      $Name = $Checked_Emails['Names'];
      $Photo = $Checked_Emails['Photo'];
      $_SESSION['Name'] = $Name;
      $_SESSION['Photo'] = $Photo;

        if($Password == $Check_Password){

          if(isset($_POST['remember'])){

            $_SESSION['Email'] = $Email;
            $_SESSION['Password'] = $Password;

            ?>
            <script>

              location.replace('./loading.html');

            </script>
         
         <?php

          } else {

            $_SESSION['Email'] = '';
            $_SESSION['Password'] = '';

            ?>
            <script>

              location.replace('./loading.html');

            </script>
         
            <?php

          }
        
        } else {
       
         ?>
     
            <script>

              alert("Can't Login Incorrect Password . . . ! !");

              location.replace('./login.php');

            </script>
      
         <?php
      
        };

    } else {
       
     ?>
       
       <script>

          alert("Email Doesn't Exist . . . ! !");

          location.replace('./login.php');
       
        </script>
       
     <?php
    
    };

};

?>