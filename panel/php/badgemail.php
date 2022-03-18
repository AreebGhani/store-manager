<?php
session_start();
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
 }
$Name = $_SESSION['Name'];
$query = "UPDATE users SET Mail = 0 WHERE Names = '$Name'";
$insert = mysqli_query($connect, $query);
if($insert){
    if(isset($_GET['pg'])){
        $pg = $_GET['pg'];
        if($pg == 'talk'){
            header('location:../talk.php');
        }
        if($pg == 'task'){
            header('location:../task.php');
        }
        if($pg == 'profile'){
            header('location:../profile.php');
        }
        if($pg == 'help'){
            header('location:../help.php');
        }
        if($pg == 'viewavaliable'){
            header('location:../viewstock/avaliable.php');
        }
        if($pg == 'viewdamage'){
            header('location:../viewstock/damage.php');
        } 
        if($pg == 'viewpurchase'){
            header('location:../viewstock/purchase.php');
        } 
        if($pg == 'viewreturn'){
            header('location:../viewstock/return.php');
        } 
        if($pg == 'viewsold'){
            header('location:../viewstock/sold.php');
        } 
        if($pg == 'report'){
            header('location:../report/report.php');
        } 
        if($pg == 'removeavalsold'){
            header('location:../removeitem/aval&sold.php');
        } 
        if($pg == 'removedamage'){
            header('location:../removeitem/damage.php');
        } 
        if($pg == 'removepurchase'){
            header('location:../removeitem/purchase.php');
        } 
        if($pg == 'removereturn'){
            header('location:../removeitem/return.php');
        } 
        if($pg == 'additionalinsertuser'){
            header('location:../additional/insertuser.php');
        } 
        if($pg == 'additionaljoin'){
            header('location:../additional/join.php');
        } 
        if($pg == 'additionaluser'){
            header('location:../additional/users.php');
        } 
        if($pg == 'additionalprofile'){
            $id = $_GET['id'];
            header('location:../additional/viewprofile.php?id='.$id);
        } 
        if($pg == 'adddamage'){
            header('location:../additem/damage.php');
        } 
        if($pg == 'addpurchase'){
            header('location:../additem/purchase.php');
        } 
    }else{
        header('location:../dashboard.php');
    }
}
?>