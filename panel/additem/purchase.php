<?php 
session_start(); 
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
   ?>
   <script>history.back();</script>
   <?php
}
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
      <title>Add An Item &#8211; Store Inventory Manager</title>
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
                  <h4>Add An Item</h4>
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
                           <li><a href="./purchase.php"><span>Purchased Product</span></a></li>
                           <li><a href="./damage.php"><span>Damaged Product</span></a></li>
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
                                       <a class="dropdown-item" href="../php/badgenotification.php?pg=addpurchase"><span style="font-weight:bold;">Mark As Read</span></a>
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
                                       <a class="dropdown-item" href="../php/badgemail.php?pg=addpurchase"><span style="font-weight:bold;">Mark As Read</span></a>
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
               <div id="inner" class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Add An Item</h2>
                           </div>
                        </div>
                     </div>
                    <!-- Stock --> 
                  <div class="row column1">
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Purchase Product<small></small></h2>
                              </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <form id="form" action="./php/purchase.php" method="post" enctype="multipart/form-data" class="col-lg-12">
                                     <input id="ProductSerialNo" name="ProductSerialNo" value="" hidden>
                                     <h4 class="ml-4">Product Detail</h4>
                                     <div class="container row">
                                     <div class="col-lg-5 m-1">
                                         <label>ID:</label>
                                         <input id="pid" name="ProductID" type="number" min="0" max="999999" placeholder="Max 6 Digits" class="form-control" title="Enter Product ID">
                                     </div>
                                     <div class="col-lg-5 m-1">
                                        <label>Product Name:</label>
                                        <input name="ProductName" type="text" placeholder="Max 20 Characters" maxlength="20" required class="form-control" title="Enter Product Name">
                                     </div>
                                     <div class="col-lg-5 m-1" title="Enter Product Serial No.">
                                        <label>Serial No #:</label><br>
                                        <span class="d-inline-flex">
                                           <input type="text" pattern="^[1-9]+[0-9]*$" id="n0" maxlength="3" autocomplete="off" autofocus data-next="1" placeholder="XXX" required class="authInput text-center form-control mr-1"> <b style="font-weight:900;">_</b>
                                           <input type="text" pattern="^[1-9]+[0-9]*$" id="n1" maxlength="3" autocomplete="off" data-next="2" placeholder="XXX" required class="authInput text-center form-control mr-1 ml-1"> <b style="font-weight:900;">_</b>
                                           <input type="text" pattern="^[1-9]+[0-9]*$" id="n2" maxlength="3" autocomplete="off" data-next="3" placeholder="XXX" required class="authInput text-center form-control ml-1">
                                        </span>
                                     </div>
                                     <div class="col-lg-5 m-1">
                                        <label>Quantity:</label>
                                       <input name="ProductQuantity" type="number" min="0" required value="1" class="form-control" title="Enter Product QTY">
                                     </div>
                                     <div class="col-lg-5 m-1">
                                        <label>Description:</label>
                                        <input name="ProductDescription" type="text" maxlength="100" required placeholder="Product Brief Statement" class="form-control" title="Enter Product Description">
                                     </div>
                                     <div class="col-lg-5 m-1">
                                        <label>Photo:</label>
                                        <input name="ProductPhoto" type="file" accept=".jpg, .jpeg, .png" value="" class="form-control" title="Product Photo (Format: JPG, JPEG, PNG)" required>
                                     </div>
                                     </div>
                                     <br><hr style="border:2px dotted gray;"><br>
                                     <div class="container row">
                                        <div class="col-lg-5 m-1">
                                            <h4>Buyed From</h4>
                                            <label>Name:</label>
                                            <input name="SellerName" required type="text" maxlength="20" placeholder="Seller Name" class="form-control mb-2" title="Enter Name Of Seller From Which You Buy That Product">
                                            <label>Address:</label>
                                            <input name="SellerAddress" required type="text" maxlength="50" placeholder="Seller Address" class="form-control mb-2" title="Enter Address Of Seller From Which You Buy That Product">
                                            <label>Phone:</label>
                                            <div class=""><input name="SellerPhoneNo" type="text" value="+92" id="phone" pattern="[0-9]{11}" required placeholder="Seller Contact No." class="form-control mb-2" title="Enter Phone No# Of Seller From Which You Buy That Product"></div>
                                            <label class="mt-3">Email:</label>
                                            <input name="SellerEmail" required type="email" placeholder="Seller Email" class="form-control mb-2" title="Enter Email Of Seller From Which You Buy That Product">
                                         </div>
                                         <div class="col-lg-5 m-1">
                                            <h4>Purchase By</h4>
                                            <?php
                                                if(isset($_SESSION['Name'])){
                                                   $UserName = $_SESSION['Name'];
                                                   $users = "SELECT * FROM users WHERE Names = '$UserName'";
                                                   $result = mysqli_query($connect, $users);                                                                                                   
                                                   while($arrayUsers = mysqli_fetch_array($result)){
                                                      $UserAddress = $arrayUsers['Address'];
                                                      $UserPhone = $arrayUsers['Phone'];
                                                      $UserEmail = $arrayUsers['Emails'];
                                                   }
                                                }
                                            ?>
                                            <label>Name:</label>
                                            <input value="<?php if(isset($_SESSION['Name'])){echo $UserName;} ?>" name="BuyerName" required type="text" maxlength="20" placeholder="Purchaser Name" class="text-capitalize form-control mb-2" title="Enter Name Of Purchaser Who Buy That Product">
                                            <label>Address:</label>
                                            <input value="<?php if(isset($_SESSION['Name'])){echo $UserAddress;} ?>" name="BuyerAddress" required type="text" maxlength="50" placeholder="Purchaser Address" class="text-capitalize form-control mb-2" title="Enter Address Of Purchaser Who Buy That Product">
                                            <label>Phone:</label>
                                            <div class=""><input name="BuyerPhoneNo" type="text" pattern="[0-9]{11}" value="<?php if(isset($_SESSION['Name'])){echo '+920'.$UserPhone;}else{echo '+92';} ?>" id="contact" required placeholder="Purchaser Contact No." class="form-control mb-2" title="Enter Phone No# Of Purchaser Who Buy That Product"></div>
                                            <label class="mt-3">Email:</label>
                                            <input value="<?php if(isset($_SESSION['Name'])){echo $UserEmail;} ?>" name="BuyerEmail" required type="email" placeholder="Purchaser Email" class="form-control mb-2" title="Enter Email Of Purchaser Who Buy That Product">
                                         </div>
                                     </div>
                                     <br><hr style="border:2px dotted gray;"><br>
                                     <h4 class="ml-4">Prices</h4>
                                     <div class="container row">
                                       <div class="col-lg-5 m-1">
                                        <label>Purchase Price:</label>
                                        <input value="" name="PurchasePrice" required type="number" min="0" placeholder="Rs. 0" class="form-control mb-2" title="Enter Purchase Price Of Product From Whom You Buy That Product">
                                       </div>
                                       <div class="col-lg-5 m-1">
                                        <label>Sale Price:</label>
                                        <input value="" name="SalePrice" required type="number" min="0" placeholder="Rs. 0" class="form-control mb-2" title="Enter Sale Price Of Product From Whom You Buy That Product">
                                       </div>
                                       <div class="col-lg-5 m-1">
                                        <label>Tax:</label>
                                        <input value="" name="Tax" required type="number" min="0" placeholder="Rs. 0" class="form-control mb-2" title="Enter Tax Price On Product From Whom You Buy That Product">
                                       </div>
                                       <div class="col-lg-5 m-1">
                                        <label>Shipping Cost:</label>
                                        <input value="" name="ShippingCost" required type="number" min="0" placeholder="Rs. 0" class="form-control mb-2" title="Enter Shipping Cost On Product From Whom You Buy That Product">
                                       </div>
                                     </div>
                                     </div>
                                     <label class="ml-4 mt-2">Payment Method:</label>
                                     <div style="margin-left:-30px;" class="container row">
                                       <div class="col-lg-4">
                                         <div title="Select Payment Method For Buying The Product" class="ml-4 mt-1">
                                           <select onchange="payment(this.value);" class="overflow-scroll form-control" style="cursor:pointer;" required>
                                             <option selected class="mb-3"><b class="mr-3">Cash</b><img width="40px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/cash.png"></option>
                                             <option class="mb-3"><b class="mr-3">Master Card</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/mastercard.png"></option>
                                             <option class="mb-3"><b class="mr-3">Debit Card</b><img width="40px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/credit-card.png"></option>
                                             <option class="mb-3"><b class="mr-3">Check</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/check.png"></option>
                                             <option class="mb-3"><b class="mr-3">Easy Paisa</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/easypaisa.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Jazz Cash</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/jazzcash.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Mobilink MicroFinance Bank</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/mobilink.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Telenor MicroFinance Bank</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/telenor.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Upaisa</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/upaisa.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">1 LINK</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/1link.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Al Baraka</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/albaraka.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Bank Alfalah</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/alfalah.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Bank Al Habib</b><img width="50px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/alhabib.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Allied Bank</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/allied.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Apna Bank</b><img width="60px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/apna.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Askari Bank</b><img width="50px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/askari.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">The Bank Of Khyber</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/bok.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">The Bank Of Punjab</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/bop.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Deutsche Bank</b><img width="60px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/deutsche.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Dubai Islamic Bank</b><img width="60px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/dubai.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Faysal Bank</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/faysal.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">First Women Bank</b><img width="60px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/firstwomen.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Habib Metro</b><img width="60px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/habibmetro.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Bank Islami</b><img width="60px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/islami.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">JS Bank</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/js.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Konnect</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/konnect.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">MCB</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/mcb.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Meezan Bank</b><img width="60px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/meezan.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">MIB</b><img width="50px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/mib.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">MNET</b><img width="60px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/mnet.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Mobile Paisa</b><img width="60px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/mobilepaisa.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Nadra Sahulat</b><img width="50px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/nadrasahulat.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">NBP</b><img width="60px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/nbp.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Omni</b><img width="60px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/omni.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">POST</b><img width="50px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/post.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Samba</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/samba.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Silk Bank</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/silk.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Sindh Bank</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/sindh.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">SME Bank</b><img width="90px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/sme.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Soneri Bank</b><img width="50px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/soneri.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Standard Chartered</b><img width="80px" height="40px" class="img-box img-responsive mr-3" src="../images/payment/standard.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">Summit Bank</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/summit.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">UBL</b><img width="80px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/ubl.jpg"></option>
                                             <option class="mb-3"><b class="mr-3">ZTBL</b><img width="60px" height="30px" class="img-box img-responsive mr-3" src="../images/payment/ztbl.jpg"></option>
                                           </select>  
                                          </div>
                                        </div>
                                       </div>
                                       <br><hr style="border:2px dotted gray;"><br>
                                       <h4 class="ml-4">QR - Code</h4>
                                       <div class="container row ml-4">
                                         <div class="col-lg-5 m-1" title="Please Select QR-Code Option">
                                          <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Generate QR</a>
                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Scan QR</a>
                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Upload QR</a>
                                             </div>
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active m-5 " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                   <input name="autoqr" class="form-check-input" type="checkbox" id="autoqr">
                                                   <label style="font-weight:bold;" class="form-check-label" for="autoqr" title="Automatically Create QR-Code Of Product">Auto Generate QR - Code</label>
                                                </div>
                                                <div class="tab-pane fade m-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                  <input name="scanqr" class="form-check-input" type="checkbox" id="scanqr">
                                                  <label style="font-weight:bold;" class="form-check-label" for="scanqr" title="Scan QR - Code, If You Already Have . . .">Scan QR - Code</label>
                                                </div>
                                                <div class="tab-pane fade m-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                   <input name="uploadqr" type="file" accept=".jpg, .jpeg, .png" value="" class="" title="QR-Code (Format: JPG, JPEG, PNG)">
                                                   <br><br>
                                                   <label style="font-weight:bold;" class="" for="uploadqr">Upload QR - Code</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       </div>
                                       </div>
                                       <input id="paymentvalue" value="Cash" name="paymentvalue" hidden type="text">
                                     <div class="col-lg-5 m-1">
                                        <button class="main_bt mt-5" type="submit" id="submit" name="submit">Add Product</button>
                                     </div>
                                    </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p><a href="../../index.html" rel="designer">
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
      <script src="../modal/js/bootstrap.min.js"></script>
      <!-- select country -->
      <script src="../js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="../js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="../js/Chart.min.js"></script>
      <script src="../js/Chart.bundle.min.js"></script>
      <script src="../js/utils.js"></script>
      <script src="../js/analyser.js"></script>
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
      <!-- fancy box js -->
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/jquery.fancybox.min.js"></script>
      <script type="text/javascript">
         function logout() {
            var massage = confirm('Do You Want To Logout . . . ?');
            if(massage == true){ window.location.replace('../php/logout.php') }
         };
         function payment(value) {
          document.getElementById("paymentvalue").value = value;
         };
         function pid(){
          var pid = document.getElementById('pid');
          var num = Math.floor(Math.random() * 1000000) + 1;
          pid.value = num;
         }
         pid();
         function n0(){
          var n0 = document.getElementById('n0');
          var num = Math.floor(Math.random() * 1000) + 1;
          n0.value = num;
         }
         n0();
         function n1(){
          var n1 = document.getElementById('n1');
          var num = Math.floor(Math.random() * 1000) + 1;
          n1.value = num;
         }
         n1();
         function n2(){
          var n2 = document.getElementById('n2');
          var num = Math.floor(Math.random() * 1000) + 1;
          n2.value = num;
         }
         n2();
         setTimeout(
            function psno(){
           var sel = document.getElementById('ProductSerialNo');
           var n0 = document.getElementById('n0').value;
           var n1 = document.getElementById('n1').value;
           var n2 = document.getElementById('n2').value;
           var comb = n0+n1+n2;
           sel.value=comb;
           }
            ,100);
      </script>
      <script>
        $('.authInput').keyup(function(e) {
          if (this.value.length === this.maxLength) {
             let next = $(this).data('next');
              $('#n' + next).focus();
            }
         });
      </script>
      <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            separateDialCode: true,
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
      </script>
      <script>
        var input = document.querySelector("#contact");
        window.intlTelInput(input, {
            separateDialCode: true,
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
      </script>
      <script>
        $(document).ready(function(){
           var form = $('#form');
           $.ajax({
              url: form.attr('action'),
              type: 'POST',
              data: $('#form input').serialize()
             });
         });
     </script>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>