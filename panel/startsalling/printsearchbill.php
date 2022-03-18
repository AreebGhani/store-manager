<?php
session_start(); 
include '../dbconnect.php';
$searchname = $_SESSION['searchname'];
$cust = "SELECT * FROM ".$searchname."";
$result3 = mysqli_query($connect, $cust);
while($custarray = mysqli_fetch_array($result3)){
    $billno = $custarray['billno'];
    $custna = $custarray['custna'];
    $custad = $custarray['custad'];
    $custcno = $custarray['custcno'];
    $custem = $custarray['custem'];
}
$server2 = "localhost";$user2 = "root";$password2 = "";$database2 = $searchname;
$connect2 = mysqli_connect($server2, $user2, $password2, $database2);
$data = "SELECT * FROM ".$searchname.$billno."";
$result = mysqli_query($connect2, $data);
while($getarray = mysqli_fetch_array($result)){
   $received = $getarray['received'];
   $adjustment = $getarray['adjustment'];
   $remaining = $getarray['remaining'];
   $cashback = $getarray['cashback'];
   $borrow = $getarray['borrow'];
   $payment = $getarray['payment'];
}
$prod = "SELECT * FROM ".$searchname."";
$result2 = mysqli_query($connect, $prod);
while($prodarray = mysqli_fetch_array($result2)){
 $pid = $prodarray['pid'];
 $pqty = $prodarray['pqty'];
 $products = "SELECT ProductQuantity FROM purchaseproducts WHERE ProductID = '$pid'";
 $result = mysqli_query($connect, $products);
  while($array = mysqli_fetch_array($result)){
     $qty = $array['ProductQuantity'];
   }
 $upQty = $qty - $pqty;
 $query = "UPDATE purchaseproducts SET ProductQuantity = '$upQty' WHERE ProductID = '$pid'";
 $insert = mysqli_query($connect, $query);
}
$SellerName = $_SESSION['Name'];
$AddedBy = $SellerName;
$users = "SELECT * FROM users WHERE Names = '$SellerName'";
$result = mysqli_query($connect, $users);                                                                                                   
while($arrayUsers = mysqli_fetch_array($result)){
   $SellerAddress = $arrayUsers['Address'];
   $SellerPhoneNo = $arrayUsers['Phone'];
   $SellerEmail = $arrayUsers['Emails'];
}
$cust = "SELECT * FROM ".$searchname."";
$result3 = mysqli_query($connect, $cust);
while($custarray = mysqli_fetch_array($result3)){
    $BuyerName = $custarray['custna'];
    $BuyerAddress = $custarray['custad'];
    $BuyerPhoneNo = $custarray['custcno'];
    $BuyerEmail = $custarray['custem'];
}
$prod = "SELECT * FROM ".$searchname."";
$result2 = mysqli_query($connect, $prod);
while($parray = mysqli_fetch_array($result2)){
 $ProductName = $parray['pna'];
 $ProductQuantity = $parray['pqty'];
 $SalePrice = $parray['ppr'];
 $Tax = $parray['ptx'];
 $pid = $parray['pid'];
 $products = "SELECT * FROM purchaseproducts WHERE ProductID = '$pid'";
 $result = mysqli_query($connect, $products);
  while($array = mysqli_fetch_array($result)){
      $InvoiceNo = $array['InvoiceNo'];
      $ProductID = $array['ProductID'];
      $ProductSerialNo = $array['ProductSerialNo'];
     $ProductDescription = $array['ProductDescription'];
     $ProductPhotoPath = $array['ProductPhoto'];
     $qrimg = $array['QRCode'];
     $PurchasePrice = $array['PurchasePrice'];
   }
   date_default_timezone_set("Asia/Karachi");
   $datetime =  date("d/m/Y . h:i:s a", time());
   $temp = explode(".", $datetime);
   $date = $temp[0];
   $time = end($temp);
   $g = "SELECT * FROM soldproducts WHERE ProductID = '$ProductID'";
   $x = mysqli_query($connect, $g);
   $a = mysqli_num_rows($x);
   if($a == 1){
      while ($ay=mysqli_fetch_array($x)) {
         $save_qty = $ay['ProductQuantity'];
      }
      $new_qty = $save_qty + $ProductQuantity;
     $up = "UPDATE soldproducts SET ProductQuantity = '$new_qty' WHERE ProductID = '$ProductID'";
     mysqli_query($connect, $up);
   } else {
      $query = "INSERT INTO soldproducts (InvoiceNo, ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, PurchasePrice, SalePrice, PaymentMethod, Tax, Borrow, AddedBy, QRCode, Date, Time) VALUES ('$InvoiceNo','$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhotoPath','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$PurchasePrice','$SalePrice','$payment','$Tax','$borrow','$AddedBy','$qrimg','$date','$time')";
      $insert = mysqli_query($connect, $query);
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
      <title>Print &#8211; Store Inventory Manager</title>
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
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         @media (max-width: 400px){.responsive-text{font-size:20px;margin-top:20px;}}
         @media (max-width: 350px){.responsive-text{font-size:15px;margin-top:20px;margin-left:5px;}}
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
       .rs{border:solid 1px gray;background:lightgray;color:black;border-radius:5px;}
       @media print {html:before{content:'By Ghani Developers';position:absolute;position:fixed;top:0;bottom:0;left:0;right:0;z-index:10;color:#0d745e;font-size:100px;font-weight:900px;display:grid;justify-content:center;align-content:center;opacity:0.3;transform:rotate(-10deg);}}
       @media print {body:before{content:'By Ghani Developers';position:absolute;position:fixed;top:10%;left:0;right:0;z-index:10;color:#0d745e;font-size:100px;font-weight:900px;display:grid;justify-content:center;align-content:center;opacity:0.3;transform:rotate(-10deg);}}
       @media print {body .row:before{content:'By Ghani Developers';position:absolute;position:fixed;bottom:15%;left:0;right:0;z-index:10;color:#0d745e;font-size:100px;font-weight:900px;display:grid;justify-content:center;align-content:center;opacity:0.1;transform:rotate(-10deg);}}
      </style>
   </head>

    <body>
            <!-- Bill -->
            <div class="row column1">
                     <div class="col-md-12">
                        <div class="full bg-transparent margin_bottom_30">
                           <div class="full text-center graph_head">
                              <div class="margin_0">
                                   <h2 class="bg-transparent">
                                      Store Name, Sahiwal, Punjab, Pakistan
                                    </h2>
                               </div>
                           </div>
                           <div class="full price_table bg-transparent padding_infor_info">
                              <div class="row bg-transparent">
                                 <div id="customer" class="col-lg-12">
                                 <br>
                                  <div class="container">
                                       <p style="margin-bottom:-3px;" class="col-12"><span style="font-weight:600;">Bill Number : </span> <span><?php echo $billno; ?></span></p>
                                       <p style="margin-bottom:-2px;" class="col-12"><span style="font-weight:600;">Customer Name : </span> <span class="text-capitalize"><?php echo $custna; ?></span></p>
                                       <p style="margin-bottom:-2px;" class="col-12"><span style="font-weight:600;">Customer Address : </span> <span class="text-capitalize"><?php echo $custad; ?></span></p>
                                       <p style="margin:;" class="col-12"><span style="font-weight:600;">Customer Contact No. : </span> <span class="text-capitalize"><?php echo $custcno; ?></span></p>
                                  </div>
                                 <hr style="border:2px dotted gray;"><br>
                                    <div class="table-responsive-sm bg-transparent">
                                       <table id="products" class="table text-center bg-transparent text-capitalize projects">
                                          <thead class="bg-transparent">
                                             <tr class="bg-transparent" style="border:dotted 1px black;">
                                                <th class="bg-transparent" style="font-weight:bold;">Name</th>
                                                <th class="bg-transparent" style="font-weight:bold;">QTY</th>
                                                <th class="bg-transparent" style="font-weight:bold;">Price</th>
                                                <th class="bg-transparent" style="font-weight:bold;">Discount</th>
                                                <th class="bg-transparent" style="font-weight:bold;">Sub Total</th>
                                             </tr>
                                          </thead>
                                          <tbody class="bg-transparent">
                                             <?php $products = "SELECT * FROM ".$searchname."";
                                               $result = mysqli_query($connect, $products);                       
                                               while($prod = mysqli_fetch_array($result)){ ?>
                                              <tr id="tr" class="bg-transparent" style="border:dotted 1px black;">
                                                <td class="bg-transparent"><?php echo $prod['pna']; ?></td>
                                                <td class="bg-transparent"><?php echo $prod['pqty']; ?></td>
                                                <td class="bg-transparent">Rs. <?php echo $prod['ppr']; ?></td>
                                                <td class="bg-transparent">Rs. <?php echo $prod['pdis']; ?></td>
                                                <td class="bg-transparent">Rs. <?php echo $prod['subtotal']; ?></td>
                                              </tr>
                                             <?php } ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="row bg-transparent">
                                        <div class="col-6 text-center">
                                         <p class="note_cont bg-transparent text-dark" style="border:dotted 1px black;">These products have been purchased by our customer <span class="text-capitalize"><?php echo $custna; ?></span>.<br> This Bill is computer generated, errors and ommissions can be expected.</p>
                                        </div>
                                        <div class="col-3 bg-transparent">
                                          <p class="mt-3 mb-2"><span style="font-weight:600;">Total: </span> Rs. 
                                          <?php 
                                          $query = "SELECT SUM(subtotal) FROM ".$searchname."";
                                          $sql = mysqli_query($connect, $query);
                                          $row = mysqli_fetch_array($sql);
                                          $sum = $row[0];
                                          echo $sum;
                                          ?>
                                          </p>
                                          <p class="mt-2"><span style="font-weight:600;">Amount Received: </span> Rs. <?php echo $received; ?></p>
                                          <p style="margin-top:-8px;margin-bottom:-8px;" class=""><hr style="border:1px dotted gray;margin-left:0px;margin-right:50px;"></spna>
                                          <p style="margin-top:-8px;" class="mb-2"><span style="font-weight:600;">CashBack: </span> Rs. <?php if($cashback == ''){echo 0;}else{echo $cashback;} ?></p>
                                        </div>
                                        <div class="col-3 bg-transparent">
                                          <p class="mt-3 m-1"><span style="font-weight:600;">Adjustment: </span> Rs. <?php echo $adjustment; ?></p>
                                          <p class="m-1"><span style="font-weight:600;">Remaining: </span> Rs. <?php echo $remaining; ?></p>
                                          <p class="m-1"><span style="font-weight:600;">Amount Borrow: </span> Rs. <?php if($borrow == ''){echo 0;}else{echo $borrow;} ?></p>
                                          <p class="m-1"><span style="font-weight:600;">Payment Method: </span> <?php echo $payment; ?></p>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
      <!-- custom js -->
      <script src="../js/chart_custom_style1.js"></script>
      <script src="../js/custom.js"></script>
      <script>
          $(document).ready(function(){
            window.print();
            setTimeout(function () {
	         	window.location.replace('./bill.php?data=billprintedfromsearch');
      	    }, 10);
          });
      </script>
   </body>
   <!-- Store Inventory Manager, Created By Areeb Ghani, Friday - 26 Nov 2021 15:41:54 GMT -->
</html>