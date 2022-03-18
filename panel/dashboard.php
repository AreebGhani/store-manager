<?php 
session_start(); 
include './dbconnect.php';
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
      <title>Dashboard &#8211; Store Inventory Manager</title>
      <meta name="keywords" content="Store Inventory Manager">
      <meta name="description" content="Store Inventory Manager, Created by Areeb Ghani => +923041554698">
      <meta name="author" content="Store Inventory Manager">
      <!-- site icon -->
      <link rel="icon" href="../content/img/stock.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- fancy box css-->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
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
         .btnclose{background:lightgrey;border:none;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;}
         .btnclose:hover{background:red;color:white;cursor:pointer;}
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
       .stars{display:inline-flex;}
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
                        <a href="../index.html"><img class="logo_icon img-responsive" src="../content/img/inventory.png" alt="store-manager" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side" style="cursor:pointer;" onclick="location.href='./profile.php'">
                        <div class="user_img"><img class="img-responsive" src="<?php if(isset($_SESSION['Photo'])){echo $_SESSION['Photo'];} ?>" alt="user" /></div>
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
                  <h4>Dashboard</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="dashboard.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     </li>
                     <li class="active">
                        <a href="./startsalling/index.php"><i class="fa fa-dollar green_color"></i> <span>Start Selling</span></a>
                     </li>
                     <li>
                        <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-eye purple_color"></i> <span>View Stock</span></a>
                        <ul class="collapse list-unstyled" id="stock">
                           <li><a href="./viewstock/avaliable.php"><span>Avaliable</span></a></li>
                           <li><a href="./viewstock/sold.php"><span>Sold</span></a></li>
                           <li><a href="./viewstock/purchase.php"><span>Purchase</span></a></li>
                           <li><a href="./viewstock/return.php"><span>Return</span></a></li>
                           <li><a href="./viewstock/damage.php"><span>Damage</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#add" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus blue2_color"></i> <span>Add An Item</span></a>
                        <ul class="collapse list-unstyled" id="add">
                           <li><a href="./additem/purchase.php"><span>Purchased Product</span></a></li>
                           <li><a href="./additem/damage.php"><span>Damaged Product</span></a></li>
                        </ul>
                     </li> 
                     <li>
                        <a href="#delete" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-remove blue2_color"></i> <span>Remove An Item</span></a>
                        <ul class="collapse list-unstyled" id="delete">
                           <li><a href="./removeitem/purchase.php"><span>Purchased Product</span></a></li>
                           <li><a href="./removeitem/aval&sold.php"><span>Avaliable & Solded Product</span></a></li>
                           <li><a href="./removeitem/return.php"><span>Returned Product</span></a></li>
                           <li><a href="./removeitem/damage.php"><span>Damaged Product</span></a></li>
                        </ul>
                     </li>  
                     <li class="active">
                        <a href="./report/report.php"><i class="fa fa-object-group blue2_color"></i><span>Inventory Report</span></a>
                     </li>
                     <li>
                        <a href="#chat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-group yellow_color"></i> <span>Chat</span></a>
                        <ul class="collapse list-unstyled" id="chat">
                           <li><a href="./task.php"><span>Tasks</span></a></li>
                           <li>
                              <a href="./talk.php"><span>Messages</span></a>
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
                           <li><a href="./additional/users.php"><span>All User</span></a></li>
                           <li><a href="./additional/insertuser.php"><span>Add User</span></a></li>
                           <li><a href="./additional/join.php"><span>Joining Request</span></a></li>
                           <li> <a href="./404_error.html"><span>404 Error</span></a></li>
                        </ul>
                     </li>
                        <?php
                         $select = "SELECT PopUp FROM users WHERE Names = '$Name'";
                         $result = mysqli_query($connect, $select);
                         while($a = mysqli_fetch_array($result)){
                            $pop = $a['PopUp'];
                           }
                         if(isset($pop)){
                            if($pop == '1'){
                         ?>
                           <script>
                           setTimeout(function(){
                              alert('Someone Request For Joining . . .');
                              var massage = confirm('GoTo Joining Request Page . . . ?');
                              if(massage == true){ location.href='./additional/join.php'; }
                           },1000);
                           </script>
                          <?php
                           }
                         }
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
                           <a href="../index.html"><h1 class="responsive-text text-center text-white text-uppercase" style="margin-top:13px;margin-left:8px;font-weight:900;"><i>Store Manager</i></h1></a>
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
                                       <a class="dropdown-item" href="./php/badgenotification.php"><span style="font-weight:bold;">Mark As Read</span></a>
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
                                         <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='./task.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $taskdate = $arrayNotif['Date']; $inttaskdate = intval($taskdate);
                                         if($intdate == $inttaskdate){echo $arrayNotif['Tasks']." <b style='font-size:10px;font-weight:bolder;' class='text-uppercase'> <br>🕛 ".$arrayNotif['Time']."</b>"; }?></span></span></a>
                                         <?php
                                          }
                                        }else{
                                          $select = "SELECT * FROM task WHERE id > '$new_id2' ORDER BY id DESC";
                                          $result = mysqli_query($connect, $select);                                                 
                                          while($arrayNotif = mysqli_fetch_array($result)){
                                        ?>
                                         <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='./task.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $taskdate = $arrayNotif['Date']; $inttaskdate = intval($taskdate);
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
                                       <a class="dropdown-item" href="./php/badgemail.php"><span style="font-weight:bold;">Mark As Read</span></a>
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
                                       <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='./talk.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $maildate = $arrayMail['Date']; $intmaildate = intval($maildate);
                                        if($intdate == $intmaildate){echo $arrayMail['Messages']." <b style='font-size:10px;font-weight:bolder;' class='text-uppercase'> <br>🕛 ".$arrayMail['Time']."</b>"; }?></span></span></a>
                                       <?php
                                         }
                                        }else{
                                          $select = "SELECT * FROM conversation WHERE id > '$new_id' ORDER BY id DESC";
                                          $result = mysqli_query($connect, $select);
                                                                                                                                      
                                          while($arrayMail = mysqli_fetch_array($result)){
                                        ?>
                                         <a class="dropdown-item"><span><span class="text-capitalize" onclick="location.href='./talk.php';"><?php date_default_timezone_set("Asia/Karachi"); $date = date("d/m/Y"); $intdate = intval($date); $maildate = $arrayMail['Date']; $intmaildate = intval($maildate);
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
                                       <a class="dropdown-item" href="./help.php"><span>Contact With Site Developer</span></a>
                                    </div>
                                 </li>
                                 <?php
                                     }
                                   }
                                 ?>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="<?php if(isset($_SESSION['Photo'])){echo $_SESSION['Photo'];} ?>" alt="user" /><span class="name_user text-capitalize"><?php if(isset($_SESSION['Name'])){echo $_SESSION['Name'];} ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.php">My Profile</a>
                                       <a class="dropdown-item" href="help.php">Help</a>
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
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1 margin_bottom_30">
                        <!-- search -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Search Product</h2>
                                 </div>
                              </div>
                              <div class="full graph_revenue">
                                 <div class="row">
                                    <div class="col-md-12">
                                          <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">By Name</a>
                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">By ID</a>
                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">By Serial No</a>
                                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">By QR - Code</a>
                                             </div>
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                  <form id="byname" action="./php/searchproduct.php?by=name" method="post" class="container-fluid" style="display:inline-flex">
                                                     <input type="text" class="task form-control" id="name" name="name" placeholder="Enter Name" title="Enter The Name Of The Product To Search It" required>
                                                      <button class="btn btn-success" type="submit" id="submit" name="submit"><i style="margin-left:5px;margin-right:5px;" class="fa fa-search"></i></button>
                                                   </form>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                  <form id="byid" action="./php/searchproduct.php?by=id" method="post" class="container-fluid" style="display:inline-flex">
                                                     <input type="number" min="0" class="task form-control" id="id" name="id" placeholder="Enter ID" title="Enter The ID Number Of The Product To Search It" required>
                                                      <button class="btn btn-success" type="submit" id="submit" name="submit"><i style="margin-left:5px;margin-right:5px;" class="fa fa-search"></i></button>
                                                   </form>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                  <form id="serial" action="./php/searchproduct.php?by=serial" method="post" class="container-fluid" style="display:inline-flex">
                                                     <input type="number" min="0" class="task form-control" id="serial" name="serial" placeholder="Enter Serial No." title="Enter The Serial Number Of The Product To Search It" required>
                                                      <button class="btn btn-success" type="submit" id="submit" name="submit"><i style="margin-left:5px;margin-right:5px;" class="fa fa-search"></i></button>
                                                   </form>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                  <form id="byqr" action="./php/searchproduct.php?by=qr" method="post" class="container-fluid" style="display:inline-flex">
                                                     <select onchange="qroption(this.value);" class="form-control" title="Select QR - Code Option" required>
                                                        <option>Scan QR - Code</option>
                                                      </select>
                                                      <input name="qrinput" value="Scan QR - Code" id="qrinput" type="text" hidden>
                                                      <button class="btn btn-success" type="submit" id="submit" name="submit"><i style="margin-left:5px;margin-right:5px;" class="fa fa-search"></i></button>
                                                   </form>
                                                </div>
                                             </div>
                                        </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end search -->
                     </div>
                     <div class="row column4 graph margin_bottom_30">
                        <div class="col-md-6">
                           <div class="dash_blog" id="todaytask">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-calendar"></i>
                                    <script>var today = new Date;var dd = String(today.getDate()).padStart(2, '0');var mm = String(today.getMonth() + 1).padStart(2, '0');var yyyy = today.getFullYear();today = dd + '/' + mm + '/' + yyyy;document.write(today);</script>
                                    </span><span class="plus_green_bt" style="cursor:pointer;"><a data-bs-toggle="modal" data-bs-target="#task">+</a></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Today Tasks</p>
                                 </div>
                                 <div class="task_list_main">
                                    <ul class="task_list">
                                    <?php
                                                         $query2 = "SELECT * FROM task";
                                                         $get2 = mysqli_query($connect, $query2);
                                                         while($ary2=mysqli_fetch_array($get2)){
                                                           $get_id2 = $ary2['id'];
                                                         }
                                                         if(isset($get_id2)){
                                                         $new_id2 = $get_id2 - 5 ;
                                                         if($get_id2 <= 3){
                                                            $select = "SELECT * FROM task ORDER BY id DESC";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($aray3 = mysqli_fetch_array($result)){
                                                           ?>
                                                      <li><strong class="text-capitalize"><?php echo $aray3['Tasks']; ?></strong><br><span class="mt-2 text-uppercase"><?php echo $aray3['Time']; ?></span></li>
                                                      <?php
                                                           }
                                                         }else{
                                                            $select = "SELECT * FROM task WHERE id > '$new_id2' ORDER BY id DESC";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($aray3 = mysqli_fetch_array($result)){
                                                           ?>
                                                           <li><strong class="text-capitalize"><?php echo $aray3['Tasks']; ?></strong><br><span class="mt-2 text-uppercase"><?php echo $aray3['Time']; ?></span></li>
                                                          <?php
                                                           }
                                                         }
                                                         }else{echo '<li><strong>No Task Yet . . .</strong></li>';}
                                                         ?>
                                    </ul>
                                 </div>
                                 <div class="read_more">
                                    <div class="center"><a class="main_bt read_bt" href="./task.php">Read More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash_blog" id="conversation">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-comments-o"></i> Talk's</span><span style="cursor:pointer;" class="plus_green_bt"><a data-bs-toggle="modal" data-bs-target="#talk">+</a></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Today Conversations</p>
                                 </div>
                                 <div class="msg_list_main">
                                    <ul class="msg_list">
                                    <?php
                                                        $query = "SELECT * FROM conversation";
                                                         $get = mysqli_query($connect, $query);
                                                         while($ary=mysqli_fetch_array($get)){
                                                           $get_id = $ary['id'];
                                                         }
                                                         if(isset($get_id)){
                                                         $new_id = $get_id - 4 ;
                                                         if($get_id <= 3){
                                                            $select = "SELECT * FROM conversation ORDER BY id DESC";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($aray2 = mysqli_fetch_array($result)){
                                                           ?>
                                                          <li>
                                                           <span><img src="<?php echo $aray2['Photo']; ?>" class="img-responsive" alt="user" /></span>
                                                           <span>
                                                           <span class="name_user text-capitalize"><?php echo $aray2['Names']; ?></span>
                                                           <span class="msg_user text-capitalize"><?php echo $aray2['Messages']; ?></span>
                                                           <span class="time_ago text-uppercase"><?php echo $aray2['Time']; ?></span>
                                                           </span>
                                                           </li>
                                                          <?php
                                                           }
                                                         }else{
                                                            $select = "SELECT * FROM conversation WHERE id > '$new_id' ORDER BY id DESC";
                                                            $result = mysqli_query($connect, $select);                             
                                                            while($aray2 = mysqli_fetch_array($result)){
                                                           ?>
                                                          <li>
                                                           <span><img src="<?php echo $aray2['Photo']; ?>" class="img-responsive" alt="user" /></span>
                                                           <span>
                                                           <span class="name_user text-capitalize"><?php echo $aray2['Names']; ?></span>
                                                           <span class="msg_user text-capitalize"><?php echo $aray2['Messages']; ?></span>
                                                           <span class="time_ago text-uppercase"><?php echo $aray2['Time']; ?></span>
                                                           </span>
                                                           </li>
                                                          <?php
                                                           }
                                                         }
                                                         }else{echo '<li><span class="font-weight-bold"><strong>No Message Yet . . .</strong></span></li>';}
                                                         ?>
                                    </ul>
                                 </div>
                                 <div class="read_more">
                                    <div class="center"><a class="main_bt read_bt" href="./talk.php">Read More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    <!-- row -->
                     <div id="team" class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full dash_head">
                                <h3 class="text-center">Team Members</h3>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                   <?php 
                                   $select = "SELECT * FROM users";
                                   $result = mysqli_query($connect, $select);

                                   $num = 1;
                                                       
                                   while($array3 = mysqli_fetch_array($result)){
                                      $_SESSION['Name'.$num] = $array3['Names'];
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
                                                   <li class="d-inline-flex"><i class="mr-1 fa fa-envelope-o"></i> : <span class="ml-1" style="font-size:12px;"><?php echo $array3['Emails']; ?></span></li>
                                                   <li class="d-inline-flex"><i class="mr-1 fa fa-phone"></i> : <span class="ml-1" style="font-size:12px;"><?php echo $array3['Phone']; ?></span></li>
                                                </ul>
                                             </div>
                                             <div class="right">
                                                <div class="profile_contacts">
                                                  <a data-fancybox="gallery" href="<?php echo $array3['Photo']; ?>"><img class="img-responsive" src="<?php echo $array3['Photo']; ?>" alt="team" /></a>
                                                </div>
                                             </div>
                                             <div class="bottom_list">
                                                <div class="left_rating">
                                                   <p class="ratings">
                                                      <span class="stars"><?php if($array3['Star1'] == 1){echo"<i class='fa fa-star'></i>";}else{echo"<i class='fa fa-star-o'></i>";} ?></span>
                                                      <span class="stars"><?php if($array3['Star2'] == 1){echo"<i class='fa fa-star'></i>";}else{echo"<i class='fa fa-star-o'></i>";} ?></span>
                                                      <span class="stars"><?php if($array3['Star3'] == 1){echo"<i class='fa fa-star'></i>";}else{echo"<i class='fa fa-star-o'></i>";} ?></span>
                                                      <span class="stars"><?php if($array3['Star4'] == 1){echo"<i class='fa fa-star'></i>";}else{echo"<i class='fa fa-star-o'></i>";} ?></span>
                                                      <span class="stars"><?php if($array3['Star5'] == 1){echo"<i class='fa fa-star'></i>";}else{echo"<i class='fa fa-star-o'></i>";} ?></span>
                                                   </p>
                                                </div>
                                                <div class="right_button">
                                                   <a href="mailto:<?php echo $array3['Emails']; ?>"><button type="button" class="btn btn-success btn-xs">
                                                    Mail <i class="fa fa-comments-o"></i>
                                                   </button></a>
                                                   <a href="tel:<?php echo $array3['Phone']; ?>"><button type="button" class="btn btn-primary btn-xs">
                                                    Call <i class="fa fa-phone"></i>
                                                   </button></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end column contact  -->
                                   <?php
                                   $num++;
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
              <!-- Task Modal -->
              <div class="modal fade" id="task" tabindex="-1" aria-labelledby="taskLabel" aria-hidden="true">          
                <div class="modal-dialog">
                  <div class="modal-content">    
                     <div class="modal-header">
                        <h5 class="modal-title" id="taskLabel"><strong>Today Task</strong></h5>
                        <div><button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-lg"></i></button></div>
                    </div>     
                    <div class="modal-body">
                        <div class="m-auto">
                           <form id="form1" action="./php/task.php" method="post">
                                 <textarea class="task form-control" type="text" name="task" placeholder="Write Something . . ." required></textarea>
                                 <br>
                                 <button type="submit" name="submit" class="main_bt">Add Task</button>
                           </form>
                        </div>
                     </div>      
                  </div>
                </div>
               </div>
             <!-- Talk Modal -->
              <div class="modal fade" id="talk" tabindex="-1" aria-labelledby="talkLabel" aria-hidden="true">          
               <div class="modal-dialog">
                 <div class="modal-content">    
                    <div class="modal-header">
                       <h5 class="modal-title" id="talkLabel"><strong>Today Conversation</strong></h5>
                       <div><button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-lg"></i></button></div>
                   </div>     
                   <div class="modal-body">
                       <div class="m-auto">
                          <form id="form2" action="./php/talk.php" method="post">
                                <textarea class="task form-control" type="text" name="talk" placeholder="Your Message . . ." required maxlength="100"></textarea>
                                <br>
                                <button type="submit" name="submit" class="main_bt">Send Message</button>
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
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- Bootstrap -->
      <script src="js/bootstrap.min.js"></script>
      <script src="./modal/js/bootstrap.min.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- clock -->
      <script src="js/clock.js"></script>
      <!-- custom js -->
      <script src="js/chart_custom_style1.js"></script>
      <script src="js/custom.js"></script>
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
            var form = $('$form1');
            $.ajax({
               url: form.attr('action'),
               type: 'POST',
               data: $('#form1 input').serialize()
              });
          });
      </script>
      <script>
         $(document).ready(function(){
            var form = $('#form2');
            $.ajax({
               url: form.attr('action'),
               type: 'POST',
               data: $('#form2 input').serialize()
              });
          });
      </script>
      <script>
         $(document).ready(function(){
            var form = $('#byname');
            $.ajax({
               url: form.attr('action'),
               type: 'POST',
               data: $('#byname input').serialize()
              });
          });
      </script>
      <script>
         $(document).ready(function(){
            var form = $('#byid');
            $.ajax({
               url: form.attr('action'),
               type: 'POST',
               data: $('#byid input').serialize()
              });
          });
      </script>
            <script>
         $(document).ready(function(){
            var form = $('#byserial');
            $.ajax({
               url: form.attr('action'),
               type: 'POST',
               data: $('#byserial input').serialize()
              });
          });
      </script>
      <script>
         $(document).ready(function(){
            var form = $('#byqr');
            $.ajax({
               url: form.attr('action'),
               type: 'POST',
               data: $('#byqr input').serialize()
              });
          });
      </script>
      <script type="text/javascript">
         function logout() {
            var massage = confirm('Do You Want To Logout . . . ?');
            if(massage == true){ window.location.replace('./php/logout.php') }
         }
         $('#bell').click(function(){});
         function qroption(value){
            document.getElementById("qrinput").value = value;
         }
      </script>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>