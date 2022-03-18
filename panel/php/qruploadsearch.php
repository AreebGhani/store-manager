<?php
session_start();
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
 }
extract($_POST);

if(isset($_POST['submit'])){

    $file = $_FILES['qrfile'];

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
            echo "Ok";
        } else {
            echo "<script>alert('Product Photo Extension Error => ".$ext." [Invalid Format] . . . ! !');location.replace('../dashboard.php');</script>";
        }
    
    } else {
        echo "<script>alert('Product Photo Error => ".$fileerror." . . . ');location.replace('../dashboard.php');</script>";
    }
}
?>