<?php

session_start();

include '../../../../../dbconnect.php';

$connect = mysqli_connect($server, $user, $password, $database);

extract($_POST);

if (isset($_POST["submit"])) {

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Phone = $_POST['phone'];
    $file = $_FILES['photo'];

    $filename = $file['name'];
    $filetype = $file["type"];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    $filesize = $file['size'];

    if($fileerror == 0){
        
        $temp = explode(".", $filename);
        $ext = end($temp);
        $ext_array = ['jpg', 'jpeg', 'png'];
        if(in_array($ext, $ext_array)){

            $newfilename = round(microtime(true)) . '.' . $ext;
        
            $destination = './uploads/'.$newfilename;
            $storepath = '../../../../../uploads/'.$newfilename;
            move_uploaded_file($filepath, $storepath);
    
            date_default_timezone_set("Asia/Karachi");
            $date =  date("d/m/Y h:i:s a", time());
    
             $query = "INSERT INTO users (Names, Emails, Password, Phone, Photo, JoinOn) VALUES ('$Name','$Email','$Password','$Phone','$destination','$date')";
             $insert = mysqli_query($connect, $query);
            
            if($insert){ echo "<script>alert('Data Inserted');history.back();</script>"; } else { echo "<script>alert('Data Not Inserted');window.location.replace('./mask.php');</script>"; }

        } else {
            echo "File Extension Error.";
        }
    
    } else {
        echo "File Error.";
    }

}

?>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <br><input type="text" name="name" placeholder="Enter Name" required><br>
    <br><input type="email" name="email" placeholder="Enter Email" required><br>
    <br><input type="password" name="password" placeholder="Enter Password" required><br>
    <br><input type="number" min="0" name ="phone" placeholder="Enter Phone No." required><br>
    <br><input type="file" accept=".jpg, .jpeg, .png" name="photo" required><br>
    <br><input type="submit" name="submit" value="submit"><br>
</form>

<br><br>

    <!-- <?php 
        
        // $select = "SELECT * FROM users";

        // $result = mysqli_query($connect, $select);

        // while($array = mysqli_fetch_array($result)){

            ?>
           <table style="text-align:center;">
           <thead>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Password</th>
               <th>Phone No.</th>
               <th>Photo</th>
               <th>Date & Time</th>
           </thead>
           <tbody>
             <tr>
               <td style="width:2%;border:1px dotted;padding:10px;"> <?php //echo $array['id']; ?> </td>
               <td style="width:10%;border:1px dotted;padding:10px;"> <?php //echo $array['Names']; ?> </td>
               <td style="width:15%;border:1px dotted;padding:10px;"> <?php //echo $array['Emails']; ?> </td>
               <td style="width:10%;border:1px dotted;padding:10px;"> <?php //echo $array['Password']; ?> </td>
               <td style="width:15%;border:1px dotted;padding:10px;"> <?php //echo $array['Phone']; ?> </td>
               <td style="width:20%;border:1px dotted;padding:10px;"> <img width="120px" height="100px" src="<?php //echo $array['Photo']; ?>" ></td>
               <td style="width:15%;border:1px dotted;padding:10px;"> <?php //echo $array['JoinOn']; ?> </td>
             </tr>
           </tbody>
           </table>
            <?php

        //  }
        
    ?> -->