<?php
session_start(); 
include '../dbconnect.php';
if(!isset($_SESSION['Name'])){
   ?>
   <script>history.back();</script>
   <?php
}
if(isset($_GET['searchname'])){
    $searchname = $_GET['searchname'];
    $_SESSION['searchname'] = $searchname;
}
if(isset($_SESSION['searchname'])){
    $searchname = $_SESSION['searchname'];
}
if(isset($_GET['db'])){
    $db = $_GET['db'];
    $_SESSION['db'] = $db;
}
if(isset($_SESSION['db'])){
    $db = $_SESSION['db'];
}
$server3 = "localhost";$user3 = "root";$password3 = "";$database3 = $db;
$connect3 = mysqli_connect($server3, $user3, $password3,$database3);
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
      <title>Start Selling &#8211; Store Inventory Manager</title>
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
      <!-- fancy box css-->
      <link rel="stylesheet" href="../css/jquery.fancybox.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         @media (max-width: 400px){.margin_top{margin-top:75px;}.responsive-text{font-size:10px;}.responsive{font-size:8px;}}
         @media (max-width: 350px){.margin_top{margin-top:85px;}.responsive-text{font-size:8px;}.responsive{font-size:5px;}}
         @media (max-width: 450px){.margin_top{margin-top:65px;}.responsive-text{font-size:12px;}.responsive{font-size:9px;}}
         @media (max-width: 500px){.margin_top{margin-top:55px;}.responsive-text{font-size:15px;}.responsive{font-size:10px;}}
         @media (max-width: 550px){.margin_top{margin-top:45px;}.responsive-text{font-size:18px;}.responsive{font-size:11px;}}
         @media (max-width: 600px){.margin_top{margin-top:35px;}.responsive-text{font-size:20px;}.responsive{font-size:12px;}}
         @media only screen and (min-width:1201px) and (max-width:5000px) {.searchbill{margin-left:700px;}}
         @media only screen and (min-width:1101px) and (max-width:1200px) {.searchbill{margin-left:600px;}}
         @media only screen and (min-width:1001px) and (max-width:1100px) {.searchbill{margin-left:500px;}}
         @media only screen and (min-width:993px) and (max-width:1000px) {.searchbill{margin-left:450px;}}
         .task{padding:10px;border:3px solid lightsteelblue;}
         .btnclose{background:lightgrey;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;}
         .btnclose:hover{background:red;color:white;cursor:pointer;}
         .btnprint{background:lightgrey;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;}
         .btnprint:hover{background:green;color:white;cursor:pointer;}
         .btnsave{background:lightgrey;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;}
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
       #tr td:hover{background:lightgray;color:red;}
       .rs{border:solid 1px gray;background:lightgray;color:black;border-radius:5px;}
      </style>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
          <!-- Sidebar  -->
          <nav id="sidebar">
             <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                    <div class="text-center" style="margin-left:-25px;margin-right:-20px;background: #004370b2;">
                      <a href="../dashboard.php"><h4>Dashboard</h4></a>
                       <br>
                       <span class="ml-2">🕛</span><span style="font-weight:bolder;" id="clock"></span>
                       <br>
                       <span class="ml-2">📅</span><span style="font-weight:bolder;"><?php echo date('l, F j, Y'); ?></span>
                       <hr style="background:transparent;">
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Product Detail:</h4>
                   <div class="container row col-lg-12 mt-3">
                      <label class="text-white ml-3 mt-2">Bar Code:</label>
                      <button class="ml-3 btn btn-warning" style="font-size:12px;cursor:not-allowed;" onclick="">Scan Now</button>
                   </div>
                    <br>
                    <div id="" action="" method="" class="container row col-lg-12 mt-3">
                      <label class="text-white ml-3">Product Name:</label>
                      <input readonly style="cursor:not-allowed;" id="" name="pna" class="form-control ml-3" type="text" required placeholder="Enter Product Name" style="font-size:15px;">
                      <br>
                      <label class="mt-2 text-white ml-3">Product Quantity:</label>
                      <input readonly style="cursor:not-allowed;" name="pqty" class="form-control ml-3" type="number" min="0" required placeholder="Enter Product Quantity" style="font-size:15px;">
                      <br>
                      <span style="cursor:not-allowed;" title="Check How Much Quantity Of Product Avaliable" class="m-3 d-inline-flex"><span class="m-1" style="font-size:10px;"><i onclick="" style="cursor:not-allowed;" class="btn btn-send fa fa-refresh"></i></span><input id="" style="cursor:not-allowed;" class="form-control" readonly value="Stock"></span>
                      <br>
                      <label class="mt-2 text-white ml-3">Tax (Rs.)</label>
                      <input style="cursor:not-allowed;" readonly name="ptx" class="form-control ml-3" type="number" min="0" required placeholder="Tax" style="font-size:15px;">
                      <br>
                      <label class="mt-2 text-white ml-3">Discount (Rs.)</label>
                      <input style="cursor:not-allowed;" readonly name="pdis" class="form-control ml-3" type="number" min="0" required placeholder="Discount" style="font-size:15px;">
                      <br>
                      <button style="cursor:not-allowed;" type="" id="submit" name="submit" class="ml-3 mt-4 btn btn-primary" onclick="add();">Add</button>
                    </div>
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
                            <h3 class="responsive-text text-center text-white text-uppercase" style="margin-top:10px;margin-left:8px;font-weight:900;">Start Selling</h3>
                        </div>
                        <div class="right_topbar d-inline-flex">
                          <div class="container-fluid m-1">
                             <button onclick="returnprod();" title="Add Return Products" class="responsive text-dark font-weight-bold btn btn-warning mt-2">Customer Return</button>
                           </div>
                           <div class="container-fluid m-1">
                             <button data-bs-toggle="modal" data-bs-target="#search" class="responsive btn btn-success mt-2" type="submit">Search Bill</button>
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
                           <div class="page_title mt-3">
                             <nav class="navbar navbar-expand-lg navbar-light margin_top">
                             <a class="navbar-brand" style="color:black;">Customer Detail:</a>
                               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                               </button>
                               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                               <div id="" action="" method="" class="container-fluid row">
                                <div class="col-lg-6">
                                 <label class="m-1" style="font-weight:bold;">Name:</label>
                                 <input style="cursor:not-allowed;" readonly name="custna" class="form-control m-1" type="text" required placeholder="Customer Name" style="font-size:15px;">
                                 <label class="m-1" style="font-weight:bold;">Address:</label>
                                 <input style="cursor:not-allowed;" readonly name="custad" class="form-control m-1" type="text" required placeholder="Customer Address" style="font-size:15px;">
                                </div> 
                                <div class="col-lg-6">
                                 <label class="m-1" style="font-weight:bold;">Contact No.</label>
                                 <input style="cursor:not-allowed;" readonly name="custcno" class="form-control m-1" type="number" min="0" required placeholder="Customer Contact No." style="font-size:15px;">
                                 <label class="m-1" style="font-weight:bold;">Email:</label>
                                 <input style="cursor:not-allowed;" readonly name="custem" class="form-control m-1" type="email" required placeholder="Customer Email" style="font-size:15px;">
                                </div>
                               <button style="cursor:not-allowed;" type="" id="submit" name="submit" class="ml-4 mt-3 btn btn-secondary m-1" style="font-size:12px;">Continue</button>
                             </div>
                              </div>
                             </nav>
                           </div>
                        </div>
                    </div>
                    <!-- Stock --> 
                  <div class="row column1">
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full bg-dark graph_head">
                              <div class="heading1 margin_0" style="display:inline-flex;">
                                   <h2 class="text-white">
                                      <i class="fa fa-file-text-o"></i> Billing Area |
                                    </h2>
                                    <h5 class="ml-2 mr-2 text-secondary"> 
                                        <span onclick="printbill();" class="btnprint">
                                            Print <i class="fa fa-print"></i>
                                        </span>
                                    </h5> 
                                    <h2 class="text-white">|</h2> 
                                    <span class="ml-2 mr-2 text-secondary">
                                        <span onclick="" class="btnsave" style="cursor:not-allowed;" style="font-weight:bold;">
                                          SAVE  <i class="fa fa-save"></i>
                                        </span>
                                    </span>
                                    <h2 class="text-white">|</h2> 
                                    <span class="ml-2">
                                        <span onclick="closebill();" class="btnclose">
                                            <i class="fa fa-close"></i>
                                        </span>
                                    </span>
                               </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <div id="customer" class="col-lg-12">
                                 <p style="margin-top:-15px;margin-bottom:-4px;">Store Name, Sahiwal, Punjab, Pakistan</p>
                                 <hr style="border:2px dotted gray;">
                                  <div class="row">
                                     <div class="col-lg-6">
                                     <?php
                                            $customers = "SELECT * FROM ".$searchname."";
                                            $result = mysqli_query($connect3, $customers);
                                            while($cust = mysqli_fetch_array($result)){
                                              $custna = $cust['custna'];
                                              $custad = $cust['custad'];
                                              $custcno = $cust['custcno'];
                                              $billno = $cust['billno'];
                                            }
                                          ?>
                                       <p style="margin-bottom:-2px;margin-top:-4px;">Bill Number : <?php echo $billno; ?></p>
                                       <p style="margin-top:-4px;margin-bottom:-4px;">Customer Name : <span class="text-capitalize"><?php echo $custna; ?></span></p>
                                     </div>
                                     <div class="col-lg-6">
                                       <p style="margin-bottom:-2px;margin-top:-4px;">Customer Address : <span class="text-capitalize"><?php echo $custad; ?></span></p>
                                       <p style="margin-top:-4px;margin-bottom:-4px;">Customer Contact No. : <span class="text-capitalize"><?php echo $custcno; ?></span></p>
                                     </div>
                                  </div>
                                 <hr style="border:2px dotted gray;"><br>
                                    <div class="table-responsive-sm">
                                       <table id="products" class="table table-striped text-center text-capitalize projects">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th>Name</th>
                                                <th>QTY</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Sub Total</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                               $products = "SELECT * FROM ".$searchname."";
                                               $result = mysqli_query($connect3, $products);
                                               while($prod = mysqli_fetch_array($result)){ ?>
                                              <tr id="tr">
                                                <td><?php echo $prod['pna']; ?></td>
                                                <td><?php echo $prod['pqty']; ?></td>
                                                <td>Rs. <?php echo $prod['ppr']; ?></td>
                                                <td>Rs. <?php echo $prod['pdis']; ?></td>
                                                <td>Rs. <?php echo $prod['subtotal']; ?></td>
                                              </tr>
                                             <?php 
                                               }
                                               if(isset($_GET['total'])){
                                                $total = $_GET['total'];
                                                if($total == 'true'){
                                                ?>
                                                <tr>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td><hr style="border:1px dotted black;"><br><h4>Total: Rs. 
                                                   <?php 
                                                    $query = "SELECT SUM(subtotal) FROM ".$searchname."";
                                                    $sql = mysqli_query($connect3, $query);
                                                    $row = mysqli_fetch_array($sql);
                                                    $sum = $row[0];
                                                    $_SESSION['total'] = $sum;
                                                    echo $sum;
                                                   ?>
                                                   </h4></td>
                                                </tr>
                                                <?php  
                                               }
                                              }
                                            ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Search Bill Modal -->
              <div class="modal fade" id="search" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">          
                <div class="modal-dialog">
                  <div class="modal-content bg-dark">    
                     <div class="modal-header">
                        <h3 class="modal-title text-white" id="searchLabel">Search Bill</h3>
                        <div><button type="button" class="btn btnclose" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-lg"></i></button></div>
                    </div>     
                    <div class="modal-body">
                        <div class="m-auto">
                           <form method="GET" action="./searchbill.php">
                              <h4 class="text-white text-uppercase">Customer Name :</h4>
                              <input name="search" class="form-control" required>
                              <button name="submit" class="mt-4 main_bt">Search For It</buttom>
                           </form>
                        </div>
                     </div>
                  </div>
                </div>
               </div>
            <!-- end dashboard inner -->
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
      <script>
          function printbill(){
              window.location.replace('./printdbsearchbill.php');
          }
          function closebill(){
            alert("If Bill Is Edit You Cannot View It Later . . .");
            var massage = confirm('Do You Want To Remove This And Create New Bill . . . ?');
            if(massage == true){
               window.location.replace('./bill.php?data=closebill');
            }
          }
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
         function returnprod(){
            var massage = confirm('Customer Return : \n => Delete This Bill & Restore Solded Items . . . ?');
            if(massage == true){ alert('Customer Return = Rs. <?php echo $_SESSION['total']; ?>'); window.location.replace('./addreturn.php') }
         }
      </script>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>