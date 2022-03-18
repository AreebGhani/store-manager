<?php
session_start();
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
}
if (isset($_POST["submit"])) {

    $id = $_POST['id'];
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Phone = $_POST['phone'];
    $Address = $_POST['address'];
    $About = $_POST['about'];
    $file = $_FILES['photo'];

    $select = "SELECT * FROM users WHERE Emails = '$Email'";
    $result = mysqli_query($connect, $select);
    $row = mysqli_num_rows($result);
    if($row > 1){
        echo "<script>alert('Email Already Exsist . . .');history.back();</script>";
    }
    $select1 = "SELECT * FROM users WHERE Password = '$Password'";
    $result1 = mysqli_query($connect, $select1);
    $row1 = mysqli_num_rows($result1);
    if($row1 > 1){
        echo "<script>alert('Password Already Taken . . .');history.back();</script>";
    }
    $select2 = "SELECT * FROM users WHERE Names = '$Name'";
    $result2 = mysqli_query($connect, $select2);
    $row2 = mysqli_num_rows($result2);
    if($row2 > 1){
        echo "<script>alert('User Name Already Exsist . . .');history.back();</script>";
    }

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
            $storepath = '../uploads/'.$newfilename;
            move_uploaded_file($filepath, $storepath);
    
            date_default_timezone_set("Asia/Karachi");
            $date =  date("d/m/Y h:i:s a", time());
    
             $query = "UPDATE users SET Names='$Name',Emails='$Email',Password='$Password',Phone='$Phone',Address='$Address',Photo='$destination',About='$About',JoinOn='$date' WHERE id = '$id'";
             $insert = mysqli_query($connect, $query);
            
            if($insert){ echo "<script>alert('User Detal Updated Successfully . . .');window.location.replace('./users.php');</script>"; } else { echo "<script>alert('Something Went Wrong. Please Try Again . . . !');window.location.replace('./insertuser.php');</script>"; }

        } else {
            echo "<script>alert('File Extension Error . . .');history.back();</script>";
        }
    
    } else {
        echo "<script>alert('File Error . . .');history.back();</script>";
    }

}
?>