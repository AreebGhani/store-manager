<?php
session_start();
include '../../dbconnect.php';
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
 }
extract($_POST);

if (isset($_POST["submit"])) {

    $ProductName = $_POST['ProductName'];
    $ProductID = $_POST['ProductID'];
    $ProductSerialNo = $_POST['ProductSerialNo'];
    $ProductQuantity = $_POST['ProductQuantity'];
    $ProductDescription = $_POST['ProductDescription'];
    $file = $_FILES['ProductPhoto'];
    $SellerName = $_POST['SellerName'];
    $SellerAddress = $_POST['SellerAddress'];
    $SellerPhoneNo = $_POST['SellerPhoneNo'];
    $SellerEmail = $_POST['SellerEmail'];
    $BuyerName = $_POST['BuyerName'];
    $BuyerAddress = $_POST['BuyerAddress'];
    $BuyerPhoneNo = $_POST['BuyerPhoneNo'];
    $BuyerEmail = $_POST['BuyerEmail'];
    $PurchasePrice = $_POST['PurchasePrice'];
    $SalePrice = $_POST['SalePrice'];
    $Tax = $_POST['Tax'];
    $ShippingCost = $_POST['ShippingCost'];
    $PaymentMethod = $_POST['paymentvalue'];
    
    if(isset($_POST['autoqr'])){$autoqr = $_POST['autoqr'];}else{$autoqr=0;}
    if(isset($_POST['scanqr'])){$scanqr = $_POST['scanqr'];}else{$scanqr=0;}
    if(isset($_FILES['uploadqr'])){$uploadqr = $_FILES['uploadqr'];}else{$uploadqr=0;}

    date_default_timezone_set("Asia/Karachi");
    $datetime =  date("d/m/Y . h:i:s a", time());
    $temp = explode(".", $datetime);
    $date = $temp[0];
    $time = end($temp);

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

            $newfilename = round(microtime(true)) . '.' . $ext;
        
            $ProductPhotoPath = './uploads/'.$newfilename;
            $destination = '../../uploads/'.$newfilename;
            move_uploaded_file($filepath, $destination);

            $InvoiceNo = substr(md5(microtime()), 0, 10);

            $_SESSION['in'] = $InvoiceNo;

            $AddedBy = $_SESSION['Name'];
            
            if(!$autoqr==0){ 
              
                $query = "INSERT INTO purchaseproducts (InvoiceNo, ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, PurchasePrice, SalePrice, PaymentMethod, Tax, ShippingCost, AddedBy, Date, Time) VALUES ('$InvoiceNo','$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhotoPath','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$PurchasePrice','$SalePrice','$PaymentMethod','$Tax','$ShippingCost','$AddedBy','$date','$time')";
                $insert = mysqli_query($connect, $query);

                $query2 = "INSERT INTO products (InvoiceNo, ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, PurchasePrice, SalePrice, PaymentMethod, Tax, ShippingCost, AddedBy, Date, Time) VALUES ('$InvoiceNo','$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhotoPath','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$PurchasePrice','$SalePrice','$PaymentMethod','$Tax','$ShippingCost','$AddedBy','$date','$time')";
                $insert2 = mysqli_query($connect, $query2);

                if($insert){
                    echo "<script>location.replace('../../qr/qr-generator/qr-generator.php?pn=".$ProductName."');</script>"; 
                } else { 
                    echo "<script>alert('Please Retry . . .');history.back();</script>"; 
                }
            
            } else {

                if(!$scanqr==0){
                    $query = "INSERT INTO purchaseproducts (InvoiceNo, ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, PurchasePrice, SalePrice, PaymentMethod, Tax, ShippingCost, AddedBy, Date, Time) VALUES ('$InvoiceNo','$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhotoPath','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$PurchasePrice','$SalePrice','$PaymentMethod','$Tax','$ShippingCost','$AddedBy','$date','$time')";
                    $insert = mysqli_query($connect, $query);

                    $query2 = "INSERT INTO products (InvoiceNo, ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, PurchasePrice, SalePrice, PaymentMethod, Tax, ShippingCost, AddedBy, Date, Time) VALUES ('$InvoiceNo','$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhotoPath','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$PurchasePrice','$SalePrice','$PaymentMethod','$Tax','$ShippingCost','$AddedBy','$date','$time')";
                    $insert2 = mysqli_query($connect, $query2);

                    if($insert){
                        echo "<script>location.replace('../../qr/qr-reader/index.php?addprod=true');</script>"; 
                    } else { 
                        echo "<script>alert('Please Retry . . .');history.back();</script>"; 
                    }

                } else {
                    if(!$uploadqr==0){

                        $uploadqrname = $uploadqr['name'];
                        $uploadqrtype = $uploadqr["type"];
                        $uploadqrpath = $uploadqr['tmp_name'];
                        $uploadqrerror = $uploadqr['error'];
                        $uploadqrsize = $uploadqr['size'];

                        if($uploadqrerror == 0){
                            $temp2 = explode(".", $uploadqrname);
                            $extqr = end($temp2);
                            $extqr_array = ['jpg', 'jpeg', 'png'];

                            if(in_array($extqr, $extqr_array)){

                                $newqr = round(microtime(true)) . '.' . $extqr;

                                $QRCode = '../qrcodes/'.$newqr;
                                $destination2 = '../../qr/qrcodes/'.$newqr;
                                move_uploaded_file($uploadqrpath, $destination2);

                                $qrimg = "/qrcodes/".$newqr;

                                $query = "INSERT INTO purchaseproducts (InvoiceNo, ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, PurchasePrice, SalePrice, PaymentMethod, Tax, ShippingCost, AddedBy, QRCode, Date, Time) VALUES ('$InvoiceNo','$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhotoPath','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$PurchasePrice','$SalePrice','$PaymentMethod','$Tax','$ShippingCost','$AddedBy','$qrimg','$date','$time')";
                                $insert = mysqli_query($connect, $query);

                                $query2 = "INSERT INTO products (InvoiceNo, ProductName, ProductID, ProductSerialNo, ProductQuantity, ProductDescription, ProductPhoto, SellerName, SellerAddress, SellerPhoneNo, SellerEmail, BuyerName, BuyerAddress, BuyerPhoneNo, BuyerEmail, PurchasePrice, SalePrice, PaymentMethod, Tax, ShippingCost, AddedBy, QRCode, Date, Time) VALUES ('$InvoiceNo','$ProductName','$ProductID','$ProductSerialNo','$ProductQuantity','$ProductDescription','$ProductPhotoPath','$SellerName','$SellerAddress','$SellerPhoneNo','$SellerEmail','$BuyerName','$BuyerAddress','$BuyerPhoneNo','$BuyerEmail','$PurchasePrice','$SalePrice','$PaymentMethod','$Tax','$ShippingCost','$AddedBy','$qrimg','$date','$time')";
                                $insert2 = mysqli_query($connect, $query2);
            
                                if($insert){
                                    echo "<script>location.replace('../purchase.php');</script>";
                                } else { 
                                    echo "<script>alert('Please Retry . . .');history.back();</script>";
                                }

                            }else{
                                echo "<script>alert('QR - Code Extension Error => ".$extqr." [Invalid Format] . . . ! !');history.back();</script>";
                            }
                      
                        } else { 
                            echo "<script>alert('QR - Code Error => ".$uploadqrerror." . . . ');history.back();</script>"; 
                        }

                    }else{
                        echo "<script>alert('Check QR - Code Option . . . ');history.back();</script>"; 
                    }
                }
            }

           } else {
            echo "<script>alert('Product Photo Extension Error => ".$ext." [Invalid Format] . . . ! !');history.back();</script>";
        }
    
    } else {
        echo "<script>alert('Product Photo Error => ".$fileerror." . . . ');history.back();</script>";
    }

}

?>