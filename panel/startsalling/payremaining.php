<?php
if(isset($_GET['custna'])){$searchname = $_GET['custna'];}
if(isset($_GET['pay'])){$pay = $_GET['pay'];
  if($pay == 0){
    echo "<script >alert('No Remaining Payment By ‟".$searchname."”');history.back();</script>";
  }
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
       #tr td:hover{background:white;color:red;}
       .rs{border:solid 1px gray;background:lightgray;color:black;border-radius:5px;}
       .popup{opacity:0.5;background:black;position: fixed;width: 100%;height:100%;z-index:100;top:0;bottom: 0;left:0;right:0;transition:ease all 0.3s;}
       .popuptext{position: fixed;width: 100%;height:100%;z-index:100;top:0;bottom: 0;left:0;right:0;transition:ease all 0.3s;}
       .background{background:lightgray;border-radius:10px;}
      </style>
   </head>
   <div class="popup"></div>
   <body>
    <div id="display" class="popuptext">
        <div class="row">
           <div class="col-1"><br></div>
           <div class="mt-5 p-3 col-10 background">
           <button id="openprint" data-bs-toggle="modal" data-bs-target="#print" hidden></button>
              <div class="modal fade" id="print" tabindex="-1" aria-labelledby="printLabel" aria-hidden="true">          
                <div class="modal-dialog">
                  <div class="modal-content bg-dark">    
                     <div class="modal-header">
                        <h3 class="modal-title text-white" id="printLabel">Payment Detail Of <?php echo $searchname; ?></h3>
                        <div><button type="button" class="btn btnclose" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-lg"></i></button></div>
                    </div>     
                    <div class="modal-body">
                        <div class="m-auto">
                          <form id="" action="./remainingprocess.php" method="GET">
                             <input name="data" value="payremaining" hidden>
                             <input name="custna" value="<?php echo $searchname; ?>" hidden>
                             <div class="row">
                                <div class="col-lg-6">
                                  <h4 class="text-white text-uppercase">Total :</h4>
                                  <span class="d-inline-flex"><span class="rs pl-2 pr-2 pt-2">Rs. </span>
                                  <input name="totalamount" id="totalamount" required class="form-control" value="<?php echo $pay; ?>" readonly>
                                  </span>
                                  <br><br><h4 class="text-white text-uppercase">Amount Received :</h4>
                                  <span class="d-inline-flex"><span class="rs pl-2 pr-2 pt-2">Rs. </span><input name="receivedamount" id="receivedamount" type="number" min="0" required class="form-control" value=""></span>
                                </div>
                               <div class="col-lg-6">
                               <h4 class="text-white text-uppercase">Cash Back : </h4>
                               <span class="d-inline-flex"><span type="none" onclick="cashback();" class="mr-3 btn btn-warning"><i class="fa fa-refresh"></i></span><span class="rs pl-2 pr-2 pt-2">Rs. </span><input name="cashback" id="cashback" required class="form-control" value="" readonly></span>
                               <br><br><h4 class="text-white text-uppercase">Payment Method :</h4>
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
                             <input id="paymentvalue" value="Cash" name="paymentvalue" hidden type="text">
                              <br><button name="submit" type="submit" class="main_bt">Add Payment</button>
                          </form>
                        </div>
                     </div>
                  </div>
                </div>
               </div>
           </div>
           <div class="col-1"><br></div>
        </div>
     </div>
      <div class="full_container">
          <!-- Sidebar  -->
          <nav id="sidebar">
             <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                    <div class="text-center" style="margin-left:-25px;margin-right:-20px;background: #004370b2;">
                      <a href="../dashboard.php"><h4>Dashboard</h4></a>
                       <br>
                       <span class="ml-2">🕛</span><span style="font-weight:bold;" id="clock"></span>
                       <br>
                       <span class="ml-2">📅</span><span style="font-weight:bold;"><?php echo date('l, F j, Y'); ?></span>
                       <hr style="background:transparent;">
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Product Detail:</h4>
                   <div class="container row col-lg-12 mt-3">
                      <label class="text-white ml-3 mt-2">Bar Code:</label>
                      <button class="ml-3 btn btn-warning" style="font-size:12px;" onclick="scan();">Scan Now</button>
                   </div>
                    <br>
                    <form id="prod" action="" method="POST" class="container row col-lg-12 mt-3">
                    <label class="text-white ml-3">Product Name:</label>
                      <input id="pna" name="pna" class="form-control ml-3" type="text" required placeholder="Enter Product Name" style="font-size:15px;">
                      <br>
                      <label class="mt-2 text-white ml-3">Product Quantity:</label>
                      <input name="pqty" class="form-control ml-3" type="number" min="0" required placeholder="Enter Product Quantity" style="font-size:15px;">
                      <br>
                      <span title="Check How Much Quantity Of Product Avaliable" class="m-3 d-inline-flex"><span class="m-1" style="font-size:10px;"><i onclick="checkstock();" class="btn btn-send fa fa-refresh"></i></span><input id="qty" class="form-control" readonly value="Stock"></span>
                      <br>
                      <label class="mt-2 text-white ml-3">Tax (Rs.)</label>
                      <input name="ptx" class="form-control ml-3" type="number" min="0" required placeholder="Tax" style="font-size:15px;">
                      <br>
                      <label class="mt-2 text-white ml-3">Discount (Rs.)</label>
                      <input name="pdis" class="form-control ml-3" type="number" min="0" required placeholder="Discount" style="font-size:15px;">
                      <br>
                      <button type="submit" id="submit" name="submit" class="ml-3 mt-4 btn btn-primary" onclick="add();">Add</button>
                    </form>
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
                        <div class="right_topbar">
                           <div class="container-fluid">
                                 <button name="submit" class="responsive btn btn-success mt-2" type="submit">Search Bill</button>
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
                               <form id="cust" action="" method="" class="container-fluid row">
                                <div class="col-lg-6">
                                 <label class="m-1" style="font-weight:bold;">Name:</label>
                                 <input name="custna" class="form-control m-1" type="text" required placeholder="Customer Name" style="font-size:15px;">
                                 <label class="m-1" style="font-weight:bold;">Address:</label>
                                 <input name="custad" class="form-control m-1" type="text" required placeholder="Customer Address" style="font-size:15px;">
                                </div> 
                                <div class="col-lg-6">
                                 <label class="m-1" style="font-weight:bold;">Contact No.</label>
                                 <input name="custcno" class="form-control m-1" type="number" min="0" required placeholder="Customer Contact No." style="font-size:15px;">
                                 <label class="m-1" style="font-weight:bold;">Email:</label>
                                 <input name="custem" class="form-control m-1" type="email" required placeholder="Customer Email" style="font-size:15px;">
                                </div>
                               <button type="submit" id="submit" name="submit" class="ml-4 mt-3 btn btn-secondary m-1" style="font-size:12px;">Continue</button>
                             </form>
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
                                        <span class="btnprint">
                                            Print <i class="fa fa-print"></i>
                                        </span>
                                    </h5> 
                                    <h2 class="text-white">|</h2> 
                                    <span class="ml-2 mr-2 text-secondary">
                                        <span class="btnprint" style="font-weight:bold;">
                                          SAVE  <i class="fa fa-save"></i>
                                        </span>
                                    </span>
                                    <h2 class="text-white">|</h2> 
                                    <span class="ml-2">
                                        <span class="btnclose">
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
                                       <p style="margin-bottom:-2px;margin-top:-4px;">Bill Number : </p>
                                       <p style="margin-top:-4px;margin-bottom:-4px;">Customer Name : <span class="text-capitalize"></span></p>
                                     </div>
                                     <div class="col-lg-6">
                                       <p style="margin-bottom:-2px;margin-top:-4px;">Customer Address : <span class="text-capitalize"></span></p>
                                       <p style="margin-top:-4px;margin-bottom:-4px;">Customer Contact No. : <span class="text-capitalize"></span></p>
                                     </div>
                                  </div>
                                 <hr style="border:2px dotted gray;"><br>
                                    <div class="table-responsive-sm">
                                       <table id="products" class="table table-striped text-center text-capitalize projects">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th style="width:2%;"></th>
                                                <th>Name</th>
                                                <th>QTY</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Sub Total</th>
                                                <th style="width:2%;"></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                              <tr id="tr">
                                                <td style="cursor:pointer;"><i class="fa fa-close"></i></td>
                                                <td></td>
                                                <td></td>
                                                <td>Rs. </td>
                                                <td>Rs. </td>
                                                <td>Rs. </td>
                                                <td style="cursor:pointer;"><i class="fa fa-edit"></i></td>
                                              </tr>
                                                 <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><hr style="border:1px dotted black;"><br><h4>Total: Rs. 
                                                    </h4></td>
                                                    <td></td>
                                                 </tr>
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
        $(document).ready(function(){
          $('#openprint').click();
          $('#display').removeClass("popuptext");
        });
        function cashback(){
            var totalamount = document.getElementById("totalamount").value;
            var receivedamount = document.getElementById("receivedamount").value;
            var cashback = document.getElementById("cashback");
            var int1 = parseInt(receivedamount);
            var int2 = parseInt(totalamount);
            var back = int1 - int2;
            cashback.value = back;
          }
          function payment(value){
            document.getElementById("paymentvalue").value = value;
         };
      </script>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>