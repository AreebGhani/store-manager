<?php
session_start(); 
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
   ?>
   <script>history.back();</script>
   <?php
}
$user_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Profile &#8211; Store Inventory Manager</title>
      <meta name="keywords" content="Store Inventory Manager">
      <meta name="description" content="Store Inventory Manager, Created by Areeb Ghani => +923041554698">
      <meta name="author" content="Store Inventory Manager">
      <!-- site icon -->
      <link rel="icon" href="../../content/img/stock.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- site css -->
      <link rel="stylesheet" href="../style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="../css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="../css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="../css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="../css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="../css/custom.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="../css/jquery.fancybox.css" />
      <!-- REQUIRED CDN  -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" integrity="sha512-yye/u0ehQsrVrfSd6biT17t39Rg9kNc+vENcCXZuMz2a+LWFGvXUnYuWUW6pbfYj1jcBb/C39UZw2ciQvwDDvg==" crossorigin="anonymous" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         @media (max-width: 500px){.none{display:none;}}
         @media (max-width: 400px){.responsive-text{font-size:20px;margin-top:20px;}.none{display:none;}}
         @media (max-width: 350px){.responsive-text{font-size:15px;margin-top:20px;margin-left:5px;}.none{display:none;}}
         @media (max-width: 200px){.responsive-text{font-size:10px;margin-top:20px;margin-left:5px;}.none{display:none;}}
         .task{padding:10px;border:3px solid lightsteelblue;}
         .btnclose{background:lightgrey;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;}
         .btnclose:hover{background:red;color:white;cursor:pointer;}
         .btnprint{background:lightgrey;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;}
         .btnprint:hover{background:green;color:white;cursor:pointer;}
         .icon_info ul.notification li {width:auto;}
        .notification div a span {font-size:13px;font-weight:500;color: #fff;padding:0 35px 0 10px;}        
        .notification div a>a::after {color: #fff;top:13px;right:28px;display:block;position:absolute;
         transform:translateY(-50%);content: "\f107";font-family: 'fontawesome';border:none;font-size:18px;}
        .notification {float:left;margin: 0 0 0 25px;}        
        .notification div a {cursor:pointer;}        
        .notification>div a {width:auto;border-radius:0;background:transparent;
         margin: 0;padding: 12px 0 12px 20px;height: auto;}
        .notification div a {font-size:15px;color: #15283c;padding: 4px 15px;border-bottom:none;line-height:normal;}
        .notification div a span {font-size:13px;color: #15283c;font-weight:normal;padding:0;
         transition: all .3s ease-in-out;line-height: normal;}    
        .notification div a:hover,
        .notification div a:focus {background: #243147;color: #fff;}     
        .notification div a:hover span,
        .notification div a:focus span {color: #fff;}
        .notification div .dropdown-menu {position:absolute;top:100%;right:0;z-index:1000;float:left;padding: 10px 6px;
         margin: 0;font-size: 15px;color: #212529;text-align:left;list-style: none;background-color: #fff;
         background-clip:padding-box;border-radius:0;width:100%;box-shadow:-1px 1px 4px -2px rgba(0, 0, 0, 0.2);border:none;}
        .stars{display:inline-flex;cursor:pointer;}
      </style>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section" style="background: rgb(9, 9, 99);">
                        <a href="../../index.html"><img class="logo_icon img-responsive" src="../../content/img/inventory.png" alt="store-manager" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side" style="cursor:pointer;" onclick="location.href='../profile.php'">
                        <div class="user_img"><img class="img-responsive" src="<?php if(isset($_SESSION['Photo'])){echo ".".$_SESSION['Photo'];} ?>" alt="user" /></div>
                        <div class="user_info">
                           <h6 class="text-capitalize font-weight-bold"><?php if(isset($_SESSION['Name'])){echo $_SESSION['Name'];} ?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                     <div class="text-center" style="margin-left:-25px;margin-right:-20px;background: #004370b2;">
                       <hr style="background:transparent;">
                       <span class="ml-2">🕛</span><span style="font-weight:bold;" id="clock"></span>
                       <br>
                       <span class="ml-2">📅</span><span style="font-weight:bold;"><?php echo date('l, F j, Y'); ?></span>
                       <hr style="background:transparent;">
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Profile</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="../dashboard.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     </li>
                     <li class="active">
                        <a href="../startsalling/index.php"><i class="fa fa-dollar green_color"></i> <span>Start Selling</span></a>
                     </li>
                     <li>
                        <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-eye purple_color"></i> <span>View Stock</span></a>
                        <ul class="collapse list-unstyled" id="stock">
                           <li><a href="../viewstock/avaliable.php"><span>Avaliable</span></a></li>
                           <li><a href="../viewstock/sold.php"><span>Sold</span></a></li>
                           <li><a href="../viewstock/purchase.php"><span>Purchase</span></a></li>
                           <li><a href="../viewstock/return.php"><span>Return</span></a></li>
                           <li><a href="../viewstock/damage.php"><span>Damage</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#add" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus blue2_color"></i> <span>Add An Item</span></a>
                        <ul class="collapse list-unstyled" id="add">
                           <li><a href="../additem/purchase.php"><span>Purchased Product</span></a></li>
                           <li><a href="../additem/damage.php"><span>Damaged Product</span></a></li>
                        </ul>
                     </li> 
                     <li>
                        <a href="#delete" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-remove blue2_color"></i> <span>Remove An Item</span></a>
                        <ul class="collapse list-unstyled" id="delete">
                           <li><a href="../removeitem/purchase.php"><span>Purchased Product</span></a></li>
                           <li><a href="../removeitem/aval&sold.php"><span>Avaliable & Solded Product</span></a></li>
                           <li><a href="../removeitem/return.php"><span>Return Product</span></a></li>
                           <li><a href="../removeitem/damage.php"><span>Damaged Product</span></a></li>
                        </ul>
                     </li>  
                     <li class="active">
                        <a href="../report/report.php"><i class="fa fa-object-group blue2_color"></i><span>Inventory Report</span></a>
                     </li>
                     <li>
                        <a href="#chat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-group yellow_color"></i> <span>Chat</span></a>
                        <ul class="collapse list-unstyled" id="chat">
                           <li><a href="../task.php"><span>Tasks</span></a></li>
                           <li>
                              <a href="../talk.php"><span>Messages</span></a>
                           </li>
                        </ul>
                     </li>
                     <?php 
                     $Name = $_SESSION['Name'];
                     $select = "SELECT * FROM users";
                     $result = mysqli_query($connect, $select);                                                       
                     while($array4 = mysqli_fetch_array($result)){
                       $admin = $array4['Names'];
                       break;
                     }
                     if($Name == $admin){
                        ?>
                     <li>
                        <a href="#setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="setting">
                           <li><a href="../additional/users.php"><span>All User</span></a></li>
                           <li><a href="../additional/insertuser.php"><span>Add User</span></a></li>
                           <li><a href="../additional/join.php"><span>Joining Request</span></a></li>
                           <li> <a href="../404_error.html"><span>404 Error</span></a></li>
                        </ul>
                     </li>
                        <?php
                     }else{}
                     ?>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="../../index.html"><h1 class="responsive-text text-center text-white text-uppercase" style="margin-top:13px;margin-left:8px;font-weight:900;"><i>Store Manager</i></h1></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                           <ul>
                                <?php 
                                  $select = "SELECT * FROM users";
                                  $result = mysqli_query($connect, $select);

                                  while($arrayMassage = mysqli_fetch_array($result)){
                                    if($arrayMassage['Names'] == $_SESSION['Name']) {
                                 ?> 
                                 <li id="bell" class="notification none">
                                    <a data-toggle="dropdown" href=""><i class="fa fa-bell-o"></i><span class="badge"><?php if($arrayMassage['Notification'] == 1) {echo "<strong style='font-size:15px;'>!</strong>";} ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="../php/badgenotification.php?pg=additionalprofile&&id=<?php echo $user_id; ?>"><span style="font-weight:bold;">Mark As Read</span></a>
                                      <?php
                                        $query2 = "SELECT * FROM task";
                                        $get2 = mysqli_query($connect, $query2);
                                        while($ary2=mysqli_fetch_array($get2)){
                                          $get_id2 = $ary2['id'];
                                        }
                                        if(isset($get_id2)){
                                        $new_id2 = $get_id2 - 3 ;
                                        if($get_id2 <= 3){
                                          $select = "SELECT * FROM task ORDER BY id DESC";
                                          $result = mysqli_query($connect, $select);                                                 
                                          while($arrayNotif = mysqli_fetch_array($result)){
                                        ?>
                                         <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='../task.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $taskdate = $arrayNotif['Date']; $inttaskdate = intval($taskdate);
                                         if($intdate == $inttaskdate){echo $arrayNotif['Tasks']." <b style='font-size:10px;font-weight:bolder;' class='text-uppercase'> <br>🕛 ".$arrayNotif['Time']."</b>"; }?></span></span></a>
                                         <?php
                                          }
                                        }else{
                                          $select = "SELECT * FROM task WHERE id > '$new_id2' ORDER BY id DESC";
                                          $result = mysqli_query($connect, $select);                                                 
                                          while($arrayNotif = mysqli_fetch_array($result)){
                                        ?>
                                         <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='../task.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $taskdate = $arrayNotif['Date']; $inttaskdate = intval($taskdate);
                                         if($intdate == $inttaskdate){echo $arrayNotif['Tasks']." <b style='font-size:10px;font-weight:bolder;' class='text-uppercase'> <br>🕛 ".$arrayNotif['Time']."</b>"; }?></span></span></a>
                                         <?php
                                          }
                                         }
                                        }
                                        ?>
                                    </div>
                                 </li>
                                 <li class="notification none">
                                    <a data-toggle="dropdown" href=""><i class="fa fa-envelope-o"></i><span class="badge"><?php if($arrayMassage['Mail'] == 1) {echo "<strong style='font-size:15px;'>!</strong>";} ?></span></a></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="../php/badgemail.php?pg=additionalprofile&&id=<?php echo $user_id; ?>"><span style="font-weight:bold;">Mark As Read</span></a>
                                      <?php 
                                      $query = "SELECT * FROM conversation";
                                      $get = mysqli_query($connect, $query);
                                       while($ary=mysqli_fetch_array($get)){
                                         $get_id = $ary['id'];
                                       }
                                      if(isset($get_id)){
                                        $new_id = $get_id - 3 ;
                                        if($get_id <= 3){
                                        $select = "SELECT * FROM conversation ORDER BY id DESC";
                                        $result = mysqli_query($connect, $select);
                                                                                                                                    
                                        while($arrayMail = mysqli_fetch_array($result)){
                                      ?>
                                       <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='../talk.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $maildate = $arrayMail['Date']; $intmaildate = intval($maildate);
                                        if($intdate == $intmaildate){echo $arrayMail['Messages']." <b style='font-size:10px;font-weight:bolder;' class='text-uppercase'> <br>🕛 ".$arrayMail['Time']."</b>"; }?></span></span></a>
                                       <?php
                                         }
                                        }else{
                                          $select = "SELECT * FROM conversation WHERE id > '$new_id' ORDER BY id DESC";
                                          $result = mysqli_query($connect, $select);
                                                                                                                                      
                                          while($arrayMail = mysqli_fetch_array($result)){
                                        ?>
                                         <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='../talk.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $maildate = $arrayMail['Date']; $intmaildate = intval($maildate);
                                        if($intdate == $intmaildate){echo $arrayMail['Messages']." <b style='font-size:10px;font-weight:bolder;' class='text-uppercase'> <br>🕛 ".$arrayMail['Time']."</b>"; }?></span></span></a>
                                       <?php
                                          }
                                        }
                                       }
                                       ?>
                                    </div>
                                 </li>
                                 <li class="notification none">
                                    <a data-toggle="dropdown" href="#"><i class="fa fa-question-circle"></i></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="../help.php"><span>Contact With Site Developer</span></a>
                                    </div>
                                 </li>
                                 <?php
                                     }
                                   }
                                 ?>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="<?php if(isset($_SESSION['Photo'])){echo ".".$_SESSION['Photo'];} ?>" alt="user" /><span class="name_user text-capitalize"><?php if(isset($_SESSION['Name'])){echo $_SESSION['Name'];} ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="../profile.php">My Profile</a>
                                       <a class="dropdown-item" href="../help.php">Help</a>
                                       <a class="dropdown-item" onclick="logout()"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Profile</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User profile</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                        <?php 
                                         $select = "SELECT * FROM users WHERE id = '$user_id'";
                                         $result = mysqli_query($connect, $select);                                                       
                                          while($array3 = mysqli_fetch_array($result)){
                                             $Name = $array3['Names'];
                                             $id = $array3['id'];
                                             $email = $array3['Emails'];
                                             $phone = $array3['Phone'];
                                             $pic = $array3['Photo'];
                                             $about = $array3['About'];
                                          }
                                          $q = "SELECT * FROM products WHERE AddedBy = '$Name'";
                                          $sql = mysqli_query($connect, $q);
                                          $row = mysqli_num_rows($sql);
                                          $q2 = "SELECT * FROM products";
                                          $sql2 = mysqli_query($connect, $q2);
                                          $row2 = mysqli_num_rows($sql2);
                                          if(($row*100) != 0){$per = round(($row*100)/$row2);}else{$per = 0;}
                                          $q3 = "SELECT * FROM soldproducts WHERE AddedBy = '$Name'";
                                          $sql3 = mysqli_query($connect, $q3);
                                          $row3 = mysqli_num_rows($sql3);
                                          $q4 = "SELECT * FROM soldproducts";
                                          $sql4 = mysqli_query($connect, $q4);
                                          $row4 = mysqli_num_rows($sql4);
                                          if(($row3*100) != 0){$per2 = round(($row3*100)/$row4);}else{$per2 = 0;}
                                          $q5 = "SELECT * FROM returnproducts WHERE AddedBy = '$Name'";
                                          $sql5 = mysqli_query($connect, $q5);
                                          $row5 = mysqli_num_rows($sql5);
                                          $q6 = "SELECT * FROM returnproducts";
                                          $sql6 = mysqli_query($connect, $q6);
                                          $row6 = mysqli_num_rows($sql6);
                                          if(($row5*100) != 0){$per3 = round(($row5*100)/$row6);}else{$per3 = 0;}
                                          $q7 = "SELECT * FROM damageproducts WHERE AddedBy = '$Name'";
                                          $sql7 = mysqli_query($connect, $q7);
                                          $row7 = mysqli_num_rows($sql7);
                                          $q8 = "SELECT * FROM damageproducts";
                                          $sql8 = mysqli_query($connect, $q8);
                                          $row8 = mysqli_num_rows($sql8);
                                          if(($row7*100) != 0){$per4 = round(($row7*100)/$row8);}else{$per4 = 0;}
                                        ?> 
                                          <div class="profile_img"><a data-fancybox="gallery" href=".<?php echo $pic; ?>"><img width="180" class="rounded-circle" src=".<?php echo $pic; ?>" alt="#" /></a></div>
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3 class="text-capitalize"><?php echo $Name; ?></h3>
                                                <p class="text-capitalize"><strong>About: </strong><?php echo $about; ?></p>
                                                <ul class="list-unstyled">
                                                   <li><a style="cursor:pointer;" href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope-o"></i> : <?php echo $email; ?></a></li>
                                                   <li><a style="cursor:pointer;" href="tel:<?php echo $phone; ?>"><i class="fa fa-phone"></i> : <?php echo $phone; ?></a></li>
                                                </ul>
                                             </div>
                                             <div class="user_progress_bar">
                                                <div class="progress_bar">
                                                   <!-- Skill Bars -->
                                                   <span style="font-weight:bold;margin-bottom:5px;" class="mt-5">Item Buyed</span><br>
                                                   <span class="skill" style="width:<?php if($per == 0){echo 6;}else{echo $per;} ?>%;margin-top:-1px;"><span class="info_valume"><?php echo $per; ?>%</span></span>                   
                                                   <div class="progress skill-bar ">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $per; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per; ?>%;">
                                                      </div>
                                                   </div>
                                                   <span style="font-weight:bold;margin-bottom:5px;" class="mt-3">Item Sold</span><br>
                                                   <span class="skill" style="width:<?php if($per2 == 0){echo 6;}else{echo $per2;} ?>%;margin-top:-1px;"><span class="info_valume"><?php echo $per2; ?>%</span></span>   
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $per2; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per2; ?>%;">
                                                      </div>
                                                   </div>
                                                   <span style="font-weight:bold;margin-bottom:5px;" class="mt-3">Item Return</span><br>
                                                   <span class="skill" style="width:<?php if($per3 == 0){echo 6;}else{echo $per3;} ?>%;margin-top:-1px;"><span class="info_valume"><?php echo $per3; ?>%</span></span>
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $per3; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per3; ?>%;">
                                                      </div>
                                                   </div>
                                                   <span style="font-weight:bold;margin-bottom:5px;" class="mt-3">Item Damage</span><br>
                                                   <span class="skill" style="width:<?php if($per4 == 0){echo 6;}else{echo $per4;} ?>%;margin-top:-1px;"><span class="info_valume"><?php echo $per4; ?>%</span></span>
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $per4; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per4; ?>%;">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- profile contant section -->
                                       <div class="full inner_elements margin_top_30">
                                          <div class="tab_style2">
                                             <div class="tabbar">
                                                <nav>
                                                   <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="true">Recent Messages</a>
                                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Recent Tasks</a>
                                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#profile_section" role="tab" aria-selected="false">Actions</a>
                                                   </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                   <div class="tab-pane fade show active" id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                      <div class="msg_list_main">
                                                         <ul class="msg_list">
                                                         <?php
                                                         $query = "SELECT * FROM conversation WHERE Names = '$Name'";
                                                         $get = mysqli_query($connect, $query);
                                                         while($ary=mysqli_fetch_array($get)){
                                                           $get_id = $ary['id'];
                                                         }
                                                         if(isset($get_id)){
                                                         $new_id = $get_id - 3 ;
                                                         if($get_id <= 3){
                                                            $select = "SELECT * FROM conversation WHERE Names = '$Name' ORDER BY id DESC";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($array2 = mysqli_fetch_array($result)){
                                                           ?>
                                                          <li>
                                                           <span><img src=".<?php echo $array2['Photo']; ?>" class="img-responsive" alt="user" /></span>
                                                           <span>
                                                           <span class="name_user text-capitalize"><?php echo $array2['Names']; ?></span>
                                                           <span class="msg_user text-capitalize"><?php echo $array2['Messages']; ?></span>
                                                           <span class="time_ago text-uppercase"><?php echo $array2['Time']; ?></span>
                                                           </span>
                                                           </li>
                                                          <?php
                                                           }
                                                         }else{
                                                            $select = "SELECT * FROM conversation WHERE Names = '$Name' AND id > '$new_id' ORDER BY id DESC";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($array2 = mysqli_fetch_array($result)){
                                                           ?>
                                                          <li>
                                                           <span><img src=".<?php echo $array2['Photo']; ?>" class="img-responsive" alt="user" /></span>
                                                           <span>
                                                           <span class="name_user text-capitalize"><?php echo $array2['Names']; ?></span>
                                                           <span class="msg_user text-capitalize"><?php echo $array2['Messages']; ?></span>
                                                           <span class="time_ago text-uppercase"><?php echo $array2['Time']; ?></span>
                                                           </span>
                                                           </li>
                                                          <?php
                                                           }
                                                         }
                                                         }else{echo '<li><span class="font-weight-bold"><strong>No Message Yet . . .</strong></span></li>';}
                                                         ?>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                   <div class="tab-pane fade" id="project_worked" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                   <div class="task_list_main">
                                                    <ul class="task_list">
                                                    <?php
                                                         $query2 = "SELECT * FROM task WHERE Names = '$Name'";
                                                         $get2 = mysqli_query($connect, $query2);
                                                         while($ary2=mysqli_fetch_array($get2)){
                                                           $get_id2 = $ary2['id'];
                                                         }
                                                         if(isset($get_id2)){
                                                         $new_id2 = $get_id2 - 3 ;
                                                         if($get_id2 <= 3){
                                                            $select = "SELECT * FROM task WHERE Names = '$Name'";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($array3 = mysqli_fetch_array($result)){
                                                           ?>
                                                      <li><strong class="text-capitalize"><?php echo $array3['Tasks']; ?></strong><br><span class="mt-2 text-uppercase"><?php echo $array3['Time']; ?></span></li>
                                                      <?php
                                                           }
                                                         }else{
                                                            $select = "SELECT * FROM task WHERE Names = '$Name' AND id > '$new_id2'";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($array3 = mysqli_fetch_array($result)){
                                                           ?>
                                                           <li><strong class="text-capitalize"><?php echo $array3['Tasks']; ?></strong><br><span class="mt-2 text-uppercase"><?php echo $array3['Time']; ?></span></li>
                                                          <?php
                                                           }
                                                         }
                                                         }else{echo '<li><strong>No Task Yet . . .</strong></li>';}
                                                         ?>
                                                    </ul>
                                                  </div>
                                                   </div>
                                                   <div class="tab-pane fade" id="profile_section" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                      <p class="alert alert-danger" role="alert">Remove Access Of This User To Store Inventory Manager & Delete All Record Of This User</p><br>
                                                      <h5 class="alert alert-warning" role="alert">Only Admin Can Do This . . .</h5><br>
                                                      <button onclick="delAccount();" class="btn btn-outline-danger font-weight-bold">Delete Account</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end user profile section -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                        <!-- end row -->
                     </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p><a href="../index.html" rel="designer">
                           &copy; <script>var date = new Date; document.write(date.getFullYear());</script> 
                           &#8211; Store Inventory Manager &reg;
                         </a>
                        </p>
                     </div>
                  </div>
                  </div>
                  <!-- end dashboard inner -->
               </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="../js/animate.js"></script>
      <!-- Bootstrap -->
      <script src="../js/bootstrap.min.js"></script>
      <script src="./modal/js/bootstrap.min.js"></script>
      <!-- select country -->
      <script src="../js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="../js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="../js/Chart.min.js"></script>
      <script src="../js/Chart.bundle.min.js"></script>
      <script src="../js/utils.js"></script>
      <script src="../js/analyser.js"></script>
      <!-- fancy box js -->
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/jquery.fancybox.min.js"></script>
      <!-- nice scrollbar -->
      <script src="../js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- clock -->
      <script src="../js/clock.js"></script>
      <!-- custom js -->
      <script src="../js/chart_custom_style1.js"></script>
      <script src="../js/custom.js"></script>
      <script type="text/javascript">
         function logout() {
            var massage = confirm('Do You Want To Logout . . . ?');
            if(massage == true){ window.location.replace('../php/logout.php') }
         }
         function viewProfile(id){
            var id = id;
            location.href="viewprofile.php?id="+id; 
         }
         function delAccount(){
            <?php
            $select = "SELECT * FROM users";
            $result = mysqli_query($connect, $select);                                                       
            while($array4 = mysqli_fetch_array($result)){
              $admin = $array4['Names'];
              $pass = $array4['Password'];
              break;
            }
            $Name = $_SESSION['Name'];
            if($admin == $Name){
               ?>
              var massage = confirm('Delete This User Account . . . ?');
              if(massage == true){
                 var key =  window.prompt("Enter Your Password . . .");
                 if(key == "<?php echo $pass; ?>"){
                    window.location.replace('../php/delaccount.php?id=<?php echo $id; ?>') 
                  }else{
                   alert("Wrong Password . . . !");
                  }
               }
               <?php
            }else{
               ?>
               alert("You Are Not Allowed To Perform This Action. \n Please Contact With Admin . . . ! !");
               <?php
            }
            ?>
         }
      </script>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>