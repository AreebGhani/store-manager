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
      <title>Users &#8211; Store Inventory Manager</title>
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
                  <h4>Users</h4>
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
                           <li><a href="./users.php"><span>All User</span></a></li>
                           <li><a href="./insertuser.php"><span>Add User</span></a></li>
                           <li><a href="./join.php"><span>Joining Request</span></a></li>
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
                                       <a class="dropdown-item" href="../php/badgenotification.php?pg=additionaluser"><span style="font-weight:bold;">Mark As Read</span></a>
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
                                       <a class="dropdown-item" href="../php/badgemail.php?pg=additionaluser"><span style="font-weight:bold;">Mark As Read</span></a>
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
                              <h2>View All Users</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div id="team" class="row column1">
                        <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Add New User<small><span onclick="addUser();" class="btn btn-success" style="border:solid 1px;border-radius:25px;padding:5px;padding-left:14px;padding-right:14px;margin-left:10px;"><a style="font-size:20px;font-weight:900;"> <i class="fa fa-plus"></i> </a></span></small></h2>
                              </div>
                              <div class="pull-right position search_inbox">
                                 <div class="input-append d-inline-flex" title="Search Here . . .">
                                  <input  type="text" id="findinput" onkeyup="" class="form-control" placeholder="Search Something . . .">
                                  <button class="btn btn-success" type="button" onclick="findmail();"><i class="fa fa-search"></i></button>
                                 </div>
                              </div>
                           </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                   <?php 
                                   $select = "SELECT * FROM users";
                                   $result = mysqli_query($connect, $select);
                                   while($array3 = mysqli_fetch_array($result)){
                                   ?> 
                                    <!-- column contact --> 
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 profile_details margin_bottom_30">
                                       <div style="background:lightyellow;" class="contact_blog">
                                          <h4 class="brief"></h4>
                                          <div class="contact_inner">
                                             <div class="left">
                                                <h3 class="text-capitalize"><?php echo $array3['Names']; ?></h3>
                                                <p><strong>About: </strong><?php echo $array3['About']; ?></p>
                                                <ul class="list-unstyled">
                                                   <li class="d-inline-flex"><i class="mr-1 fa fa-envelope-o"></i> : <a class="ml-1" href="mailto:<?php echo $array3['Emails']; ?>" style="font-size:12px;"><?php echo $array3['Emails']; ?></a></li>
                                                   <li class="d-inline-flex"><i class="mr-1 fa fa-phone"></i> : <a class="ml-1" href="tel:<?php echo $array3['Phone']; ?>" style="font-size:12px;"><?php echo $array3['Phone']; ?></a></li>
                                                </ul>
                                             </div>
                                             <div class="right">
                                                <div class="profile_contacts">
                                                  <a data-fancybox="gallery" href=".<?php echo $array3['Photo']; ?>"><img class="img-responsive" src=".<?php echo $array3['Photo']; ?>" alt="team" /></a>
                                                </div>
                                             </div>
                                             <div class="bottom_list">
                                                <div class="left_rating">
                                                   <p class="ratings">
                                                      <form class="stars" method="post" id="formStar1" action="../php/star.php?pg=u"><input name="Star1" value="<?php echo $array3['id']; ?>" hidden><?php if($array3['Star1'] == 1){echo"<span class='fa fa-star'></span>";}else{echo"<button style='background:transparent;border:none;cursor:pointer;' type='submit' name='submit' class='fa fa-star-o'></button>";} ?></form>
                                                      <form class="stars" method="post" id="formStar2" action="../php/star.php?pg=u"><input name="Star2" value="<?php echo $array3['id']; ?>" hidden><?php if($array3['Star2'] == 1){echo"<span class='fa fa-star'></span>";}else{echo"<button style='background:transparent;border:none;cursor:pointer;' type='submit' name='submit' class='fa fa-star-o'></button>";} ?></form>
                                                      <form class="stars" method="post" id="formStar3" action="../php/star.php?pg=u"><input name="Star3" value="<?php echo $array3['id']; ?>" hidden><?php if($array3['Star3'] == 1){echo"<span class='fa fa-star'></span>";}else{echo"<button style='background:transparent;border:none;cursor:pointer;' type='submit' name='submit' class='fa fa-star-o'></button>";} ?></form>
                                                      <form class="stars" method="post" id="formStar4" action="../php/star.php?pg=u"><input name="Star4" value="<?php echo $array3['id']; ?>" hidden><?php if($array3['Star4'] == 1){echo"<span class='fa fa-star'></span>";}else{echo"<button style='background:transparent;border:none;cursor:pointer;' type='submit' name='submit' class='fa fa-star-o'></button>";} ?></form>
                                                      <form class="stars" method="post" id="formStar5" action="../php/star.php?pg=u"><input name="Star5" value="<?php echo $array3['id']; ?>" hidden><?php if($array3['Star5'] == 1){echo"<span class='fa fa-star'></span>";}else{echo"<button style='background:transparent;border:none;cursor:pointer;' type='submit' name='submit' class='fa fa-star-o'></button>";} ?></form>
                                                      <script>
                                                       var form = $('#formStar1'); $.ajax({ url: form.attr('action'), type: 'POST', data: $('#formStar1 input').serialize() });
                                                      </script>
                                                      <script>
                                                       var form = $('#formStar2'); $.ajax({ url: form.attr('action'), type: 'POST', data: $('#formStar2 input').serialize() });
                                                      </script>
                                                      <script>
                                                       var form = $('#formStar3'); $.ajax({ url: form.attr('action'), type: 'POST', data: $('#formStar3 input').serialize() });
                                                      </script>
                                                      <script>
                                                       var form = $('#formStar4'); $.ajax({ url: form.attr('action'), type: 'POST', data: $('#formStar4 input').serialize() });
                                                      </script>
                                                      <script>
                                                       var form = $('#formStar5'); $.ajax({ url: form.attr('action'), type: 'POST', data: $('#formStar5 input').serialize() });
                                                      </script>
                                                   </p>
                                                </div>
                                                <div class="right_button">
                                                   <a><button type="button" onclick="editProfile(<?php echo $array3['id'] ?>);" class="btn btn-success btn-xs">
                                                    <i class="fa fa-edit"> </i> Edit
                                                   </button></a>
                                                   <a><button type="button" onclick="viewProfile(<?php echo $array3['id'] ?>);" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-user"> </i> View Profile
                                                   </button></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end column contact  -->
                                   <?php
                                   }
                                  ?>
                                 </div>
                              </div>
                           </div>
                        </div>
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
              <!-- Edit Modal -->
              <button id="editmodal" data-bs-toggle="modal" data-bs-target="#edit" hidden></button>
              <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">          
                <div class="modal-dialog">
                  <div class="modal-content bg-dark">    
                     <div class="modal-header">
                        <h3 class="modal-title text-white" id="editLabel">Edit User Detail</h3>
                        <div><button type="button" class="btn btnclose" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-lg"></i></button></div>
                    </div>     
                    <div class="modal-body">
                        <div class="m-auto">
                           <form id="form" action="./updateuser.php" method="POST" enctype="multipart/form-data" class="col-lg-12">
                           <?php 
                           if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $users = "SELECT * FROM users WHERE id = '$id'";
                            $result = mysqli_query($connect, $users);                       
                            while($prod = mysqli_fetch_array($result)){ ?>
                              <div class="m-1 text-light">
                                 <label class="font-weight-bold">User Name:</label>
                                 <input value="<?php echo $prod['Names']; ?>" name="name" type="text" maxlength="20" placeholder="Enter User Name" class="form-control" title="Enter Name Of The User Which You Want To Get Access To Store Inventory Manager" required>
                             </div>
                             <div class="m-1 mt-2 text-light">
                                 <label class="font-weight-bold">Email:</label>
                                 <input value="<?php echo $prod['Emails']; ?>" name="email" type="email" placeholder="Enter User Email Address" required class="form-control" title="Enter Email Address Of The User Which You Want To Get Access To Store Inventory Manager">
                             </div>
                              <div class="m-1 mt-2 text-light" title="Enter Product Serial No.">
                                 <label class="font-weight-bold">Password:</label>
                                 <input value="<?php echo $prod['Password']; ?>" name="password" type="text" placeholder="Enter User Password" required class="form-control" title="Create Custom Password Of The User Which You Want To Get Access To Store Inventory Manager">
                             </div>
                              <div class="m-1 mt-2 text-light">
                                 <label class="font-weight-bold">Address:</label>
                                 <input value="<?php echo $prod['Address']; ?>" name="address" type="text" placeholder="Enter User Address" class="form-control" title="Enter Address Of The User Which You Want To Get Access To Store Inventory Manager" required>
                              </div>
                              <div class="m-1 mt-2 text-light">
                                 <label class="font-weight-bold">About:</label>
                                 <input value="<?php echo $prod['About']; ?>" name="about" type="text" placeholder="Write About Some User" class="form-control" title="Write About Some User Which You Want To Get Access To Store Inventory Manager" required>
                              </div>
                              <div class="m-1 mt-2 text-light">
                                 <label class="font-weight-bold">Phone No:</label>
                                 <div class=""><input name="phone" pattern="[0-9]{11}" value="+92<?php echo $prod['Phone']; ?>" id="phone" required placeholder="Enter User Contact No." class="form-control mb-2" title="Enter Phone No# Of The User Which You Want To Get Access To Store Inventory Manager"></div>
                              </div>
                              <div class="m-1">
                              <label class="text-light font-weight-bold mr-3">User:</label>
                              <a data-fancybox="gallery" href=".<?php echo $prod['Photo']; ?>"><img class="img-responsive m-3" src=".<?php echo $prod['Photo']; ?>" width="100px" height="100px" alt="team" /></a>
                              </div>
                              <div class="m-1 mt-2 text-light">
                                 <label class="font-weight-bold">Change Photo:</label>
                                 <input name="photo" type="file" accept=".jpg, .jpeg, .png" value="" class="form-control" title="User Photo (Format: JPG, JPEG, PNG)" required>
                              </div>
                              <div class="m-1 mt-2 text-light">
                                 <button class="main_bt mt-5" type="submit" id="submit" name="submit">Update User Data</button>
                              </div>
                              <?php 
                             }   
                             echo "<input name='id' value='".$id."' hidden>"; 
                           } 
                           ?>
                           </form>
                        </div>
                     </div>
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
         }
         function findmail() {
            var input = document.getElementById("findinput");
            var inputvalue = input.value;
            if(inputvalue){
             var search = window.find(inputvalue);
             if(!search){alert("Word Not Found 😥, Try Another . . . ");};
            }else{
             alert("⁕ Search Keyword Required 🔎 . . . ");
            };
         }
         function viewProfile(id){
            var id = id;
            location.href="viewprofile.php?id="+id; 
         }
         function editProfile(id){
            var id = id;
            location.href="./users.php?edit=true&&id="+id;
         }
         function addUser(){
            location.href="./insertuser.php";
         }
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
         <?php if(isset($_GET['edit'])){echo ""; } ?>
      </script>
      <?php
      if(isset($_GET['edit'])){?>
        <script>$(document).ready(function(){ $('#editmodal').click(); });</script>
      <?php
      } ?>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>