<?php
$id = $_GET['id'];
session_start(); 
include '../../dbconnect.php';
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
      <title>Print &#8211; Store Inventory Manager</title>
      <meta name="keywords" content="Store Inventory Manager">
      <meta name="description" content="Store Inventory Manager, Created by Areeb Ghani => +923041554698">
      <meta name="author" content="Store Inventory Manager">
      <!-- site icon -->
      <link rel="icon" href="../../../content/img/stock.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- site css -->
      <link rel="stylesheet" href="../../style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="../../css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="../../css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="../../css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="../../css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="../../css/custom.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="../../css/jquery.fancybox.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         @media (max-width: 400px){.responsive-text{font-size:20px;margin-top:20px;}}
         @media (max-width: 350px){.responsive-text{font-size:15px;margin-top:20px;margin-left:5px;}}
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
         .invoice{margin:0px;}
      </style>
   </head>

    <body>

       <?php
            $products = "SELECT * FROM products WHERE id = '$id'";
            $result = mysqli_query($connect, $products);
                                                    
            while($array = mysqli_fetch_array($result)){
       ?>

            <!-- Invoice -->
            <div class="invoice">
                <br>
                 <div class="midde_cont">
                   <div class="container-fluid">
                    <!-- row -->
                     <div class="row">
                       <!-- invoice section -->
                         <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                            <div class="full graph_head">
                               <div class="heading1 margin_0" style="display:inline-flex;">
                                  <h2><i class="fa fa-file-text-o"></i> Invoice </h2>
                               </div>
                              </div>
                              <div id="printDiv">
                              <div class="full">
                                <div class="invoice_inner">
                                  <div class="row">
                                     <div class="col-md-4">
                                        <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                           <h4 class="text-center">Buyed From</h4>
                                           <p><strong class="text-capitalize"><?php echo $array['SellerName']; ?></strong><br>  
                                             <span class="text-capitalize"><?php echo $array['SellerAddress']; ?></span><br>  
                                              <strong>Phone : </strong><a href="tel:<?php echo $array['SellerPhoneNo']; ?>"><?php echo $array['SellerPhoneNo']; ?></a><br>  
                                              <strong>Email : </strong><a href="mailto:<?php echo $array['SellerEmail']; ?>"><?php echo $array['SellerEmail']; ?></a>
                                           </p>
                                        </div>
                                      </div>
                                       <div class="col-md-4">
                                        <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                           <h4 class="text-center">Purchase By</h4>
                                           <p><strong class="text-capitalize"><?php echo $array['BuyerName']; ?></strong><br>  
                                             <span class="text-capitalize"><?php echo $array['BuyerAddress']; ?></span><br>  
                                              <strong>Phone : </strong><a href="tel:<?php echo $array['BuyerPhoneNo']; ?>"><?php echo $array['BuyerPhoneNo']; ?></a><br>  
                                              <strong>Email : </strong><a href="mailto:<?php echo $array['BuyerEmail']; ?>"><?php echo $array['BuyerEmail']; ?></a>
                                           </p>
                                        </div>
                                       </div>
                                       <div class="col-md-4">
                                        <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                           <h4 class="text-center">Invoice No - <?php echo $array['InvoiceNo']; ?></h4>
                                           <p><strong>Product ID : </strong><?php echo $array['ProductID']; ?><br> 
                                              <strong>Added By : </strong><span class="text-capitalize"><?php echo $array['AddedBy']; ?></span><br>
                                              <strong>Purchase On : </strong><?php echo "<span class='text-uppercase container-sm'>📅 Date: ".$array['Date']."<br> 🕛 Time: ".$array['Time']."</span>"; ?><br> 
                                           </p>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <br><br>
                              <div class="full padding_infor_info">
                               <div class="table_row">
                                  <div class="table-responsive">
                                     <table class="table table-striped text-capitalize">
                                        <thead>
                                           <tr>
                                              <th>Qty</th>
                                              <th>Product</th>
                                              <th>Serial #</th>
                                              <th>Description</th>
                                              <th>Price</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                              <td><?php echo $array['ProductQuantity']; ?></td>
                                              <td><?php echo $array['ProductName']; ?></td>
                                              <td><?php echo $array['ProductSerialNo']; ?></td>
                                              <td><?php echo $array['ProductDescription']; ?>.</td>
                                              <td>Rs. <?php echo $array['PurchasePrice']; ?></td>
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
                   <!-- row -->
                   <div class="row">
                      <div class="col-md-6">
                         <div class="full white_shd">
                            <div class="full graph_head">
                               <div class="heading1 margin_0">
                                  <h2>Payment Methods</h2>
                               </div>
                            </div>
                            <div class="full padding_infor_info">
                               <ul class="payment_option">
                                  <?php if($array['PaymentMethod'] == 'Cash'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/cash.png" alt="cash" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Master Card'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/mastercard.png" alt="mastercard" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Debit Card'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/credit-card.png" alt="creditcard" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Check'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/check.png" alt="check" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Jazz Cash'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="50px" class="img-responsive" src="../../images/payment/jazzcash.jpg" alt="jazzcash" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Easy Paisa'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/easypaisa.jpg" alt="easypaisa" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Mobilink MicroFinance Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/mobilink.jpg" alt="mobilink" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Telenor MicroFinance Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/telenor.jpg" alt="telenor" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Upaisa'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/upaisa.jpg" alt="upaisa" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == '1 LINK'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/1link.jpg" alt="1link" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Al Baraka'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/albaraka.jpg" alt="albaraka" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Bank Alfalah'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/alfalah.jpg" alt="alfalah" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Bank Al Habib'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/alhabib.jpg" alt="alhabib" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Allied Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/allied.jpg" alt="allied" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Apna Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/apna.jpg" alt="apna" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Askari Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/askari.jpg" alt="askari" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'The Bank Of Khyber'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/bok.jpg" alt="khyber" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'The Bank Of Punjab'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/bop.jpg" alt="punjab" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Deutsche Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/deutsche.jpg" alt="deutsche" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Dubai Islamic Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/dubai.jpg" alt="dubai" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Faysal Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/faysal.jpg" alt="faysal" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'First Women Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/firstwomen.jpg" alt="firstwomen" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Habib Metro'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/habibmetro.jpg" alt="habibmetro" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Bank Islami'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/islami.jpg" alt="bankislami" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'JS Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/js.jpg" alt="js" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Konnect'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/konnect.jpg" alt="konnect" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'MCB'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/mcb.jpg" alt="mcb" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Meezan Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/meezan.jpg" alt="meezan" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'MIB'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/mib.jpg" alt="mib" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'MNET'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/mnet.jpg" alt="MNET" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Mobile Paisa'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/mobilepaisa.jpg" alt="mobilepaisa" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'NBP'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/nbp.jpg" alt="nbp" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Omni'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/omni.jpg" alt="omni" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'POST'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/post.jpg" alt="post" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Samba'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/samba.jpg" alt="samba" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Silk Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/silk.jpg" alt="silk" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Sindh Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/sindh.jpg" alt="sindh" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'SME Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/sme.jpg" alt="sme" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Soneri Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/soneri.jpg" alt="soneri" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Standard Chartered'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/standard.jpg" alt="standardchartered" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'Summit Bank'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/summit.jpg" alt="summit" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'UBL'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/ubl.jpg" alt="ubl" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; }
                                   if($array['PaymentMethod'] == 'ZTBL'){ echo '<li style="font-weight:900;" class="text-center text-uppercase container-sm"><img width="120px" height="80px" class="img-responsive" src="../../images/payment/ztbl.jpg" alt="ztbl" /><p class="m-3">'.$array['PaymentMethod'].'</p></li>'; } ?>
                               </ul>
                               <p style="margin-top:50px;" class="note_cont">These products have been purchased by the <span class="text-capitalize"><?php echo $array['BuyerName']; ?></span>. This Invoice is computer generated, errors and ommissions can be expected.</p>
                            </div>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="full white_shd">
                            <div class="full graph_head">
                               <div class="heading1 margin_0">
                                  <h2>Total Amount</h2>
                               </div>
                            </div>
                            <div class="full padding_infor_info">
                               <div class="price_table">
                                  <div class="table-responsive">
                                     <table class="table">
                                        <tbody>
                                        <tr>
                                              <th style="width:50%">Subtotal:</th>
                                              <td>Rs. <span id="subtotal"><?php echo $array['PurchasePrice']*$array['ProductQuantity']; ?></span></td>
                                           </tr>
                                           <tr>
                                              <th>Tax:</th>
                                              <td>Rs. <span id="tax"><?php echo $array['Tax']; ?></span></td>
                                           </tr>
                                           <tr>
                                              <th>Shipping:</th>
                                              <td>Rs. <span id="shipping"><?php echo $array['ShippingCost']; ?></span></td>
                                           </tr>
                                           <tr>
                                              <th>Total:</th>
                                              <td>Rs. <span id="total"></span></td>
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
            </div>

      <?php
            }
       ?>

      <!-- jQuery -->
      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="../../js/animate.js"></script>
      <!-- Bootstrap -->
      <script src="../../js/bootstrap.min.js"></script>
      <script src="./modal/js/bootstrap.min.js"></script>
      <!-- select country -->
      <script src="../../js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="../../js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="../../js/Chart.min.js"></script>
      <script src="../../js/Chart.bundle.min.js"></script>
      <script src="../../js/utils.js"></script>
      <script src="../../js/analyser.js"></script>
      <!-- fancy box js -->
      <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/jquery.fancybox.min.js"></script>
      <!-- nice scrollbar -->
      <script src="../../js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="../../js/chart_custom_style1.js"></script>
      <script src="../../js/custom.js"></script>
      <script>
         $(document).ready(function(){
            var subtotal = $('#subtotal').text();
            var tax = $('#tax').text();
            var shipping = $('#shipping').text();
            var int1 = parseInt(subtotal);
            var int2 = parseInt(tax);
            var int3 = parseInt(shipping);
            var cal = int1 + int2 + int3;
            document.getElementById("total").innerHTML = cal;
         });
      </script>
      <script>
          $(document).ready(function(){
            window.print();
            setTimeout(function () {
	         	window.close();
      	    }, 10);
          });
      </script>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>