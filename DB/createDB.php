<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "storeinventorymanager";
$table1 = "users";
$table2 = "joiningrequest";
$table3 = "conversation";
$table4 = "task";
$table5 = "purchaseproducts";
$table6 = "custcache";
$table7 = "prodcache";
$table8 = "soldproducts";
$table9 = "products";
$table10 = "returnproducts";
$table11 = "damageproducts";
$table12 = "borrowcache";
$table13 = "reportcache";

$connect = mysqli_connect($server, $user, $password);

$dbcreate = "CREATE DATABASE " . $database . "";
$CreatedDB = mysqli_query($connect, $dbcreate);

if ($CreatedDB) {

    $connect = mysqli_connect($server, $user, $password, $database);

    $table1create = "CREATE TABLE " . $table1 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Names VARCHAR(255) NOT NULL DEFAULT '', Emails VARCHAR(255) NOT NULL DEFAULT '', Password VARCHAR(255) NOT NULL DEFAULT '', Phone VARCHAR(255) NOT NULL DEFAULT '', Photo VARCHAR(255) NOT NULL DEFAULT '', About VARCHAR(255) NOT NULL DEFAULT '', Notification VARCHAR(255) NOT NULL DEFAULT '', Mail VARCHAR(255) NOT NULL DEFAULT '', PopUp VARCHAR(255) NOT NULL DEFAULT '', Star1 VARCHAR(255) NOT NULL DEFAULT '', Star2 VARCHAR(255) NOT NULL DEFAULT '', Star3 VARCHAR(255) NOT NULL DEFAULT '', Star4 VARCHAR(255) NOT NULL DEFAULT '', Star5 VARCHAR(255) NOT NULL DEFAULT '', JoinOn VARCHAR(255) NOT NULL DEFAULT '')";
    $CreatedTable1 = mysqli_query($connect, $table1create);

    if ($CreatedTable1) {

        $table2create = "CREATE TABLE " . $table2 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Names VARCHAR(255) NOT NULL DEFAULT '', Emails VARCHAR(255) NOT NULL DEFAULT '', ContactNo VARCHAR(255) NOT NULL DEFAULT '', Messages VARCHAR(255) NOT NULL DEFAULT '', At VARCHAR(255) NOT NULL DEFAULT '')";
        $CreatedTable2 = mysqli_query($connect, $table2create);

        if ($CreatedTable2) {

            $table3create = "CREATE TABLE " . $table3 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Names VARCHAR(255) NOT NULL DEFAULT '', Messages VARCHAR(255) NOT NULL DEFAULT '', Photo VARCHAR(255) NOT NULL DEFAULT '', Date VARCHAR(255) NOT NULL DEFAULT '', Time VARCHAR(255) NOT NULL DEFAULT '')";
            $CreatedTable3 = mysqli_query($connect, $table3create);

            if ($CreatedTable3) {

                $table4create = "CREATE TABLE " . $table4 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Names VARCHAR(255) NOT NULL DEFAULT '', Tasks VARCHAR(255) NOT NULL DEFAULT '', Photo VARCHAR(255) NOT NULL DEFAULT '', Date VARCHAR(255) NOT NULL DEFAULT '', Time VARCHAR(255) NOT NULL DEFAULT '')";
                $CreatedTable4 = mysqli_query($connect, $table4create);

                if ($CreatedTable4) {

                    $table5create = "CREATE TABLE " . $table5 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, InvoiceNo VARCHAR(255) NOT NULL DEFAULT '', ProductName VARCHAR(255) NOT NULL DEFAULT '', ProductID VARCHAR(255) NOT NULL DEFAULT '', ProductSerialNo VARCHAR(255) NOT NULL DEFAULT '', ProductQuantity VARCHAR(255) NOT NULL DEFAULT '', ProductDescription VARCHAR(255) NOT NULL DEFAULT '', ProductPhoto VARCHAR(255) NOT NULL DEFAULT '', SellerName VARCHAR(255) NOT NULL DEFAULT '', SellerAddress VARCHAR(255) NOT NULL DEFAULT '', SellerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', SellerEmail VARCHAR(255) NOT NULL DEFAULT '', BuyerName VARCHAR(255) NOT NULL DEFAULT '', BuyerAddress VARCHAR(255) NOT NULL DEFAULT '', BuyerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', BuyerEmail VARCHAR(255) NOT NULL DEFAULT '', QRCode VARCHAR(255) NOT NULL DEFAULT '', PurchasePrice VARCHAR(255) NOT NULL DEFAULT '', SalePrice VARCHAR(255) NOT NULL DEFAULT '', PaymentMethod VARCHAR(255) NOT NULL DEFAULT '', Tax VARCHAR(255) NOT NULL DEFAULT '', ShippingCost VARCHAR(255) NOT NULL DEFAULT '', AddedBy VARCHAR(255) NOT NULL DEFAULT '', MarkAs VARCHAR(255) NOT NULL DEFAULT '', Date VARCHAR(255) NOT NULL DEFAULT '', Time VARCHAR(255) NOT NULL DEFAULT '')";
                    $CreatedTable5 = mysqli_query($connect, $table5create);

                    if ($CreatedTable5) {

                        $table6create = "CREATE TABLE " . $table6 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, custna VARCHAR(255) NOT NULL DEFAULT '', custad VARCHAR(255) NOT NULL DEFAULT '', custcno VARCHAR(255) NOT NULL DEFAULT '', custem VARCHAR(255) NOT NULL DEFAULT '')";
                        $CreatedTable6 = mysqli_query($connect, $table6create);

                        if ($CreatedTable6) {

                            $table7create = "CREATE TABLE " . $table7 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, pna VARCHAR(255) NOT NULL DEFAULT '', pid VARCHAR(255) NOT NULL DEFAULT '', ppr VARCHAR(255) NOT NULL DEFAULT '', pqty VARCHAR(255) NOT NULL DEFAULT '', ptx VARCHAR(255) NOT NULL DEFAULT '', pdis VARCHAR(255) NOT NULL DEFAULT '', subtotal VARCHAR(255) NOT NULL DEFAULT '')";
                            $CreatedTable7 = mysqli_query($connect, $table7create);

                            if ($CreatedTable7) {

                                $table8create = "CREATE TABLE " . $table8 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, InvoiceNo VARCHAR(255) NOT NULL DEFAULT '', ProductName VARCHAR(255) NOT NULL DEFAULT '', ProductID VARCHAR(255) NOT NULL DEFAULT '', ProductSerialNo VARCHAR(255) NOT NULL DEFAULT '', ProductQuantity VARCHAR(255) NOT NULL DEFAULT '', ProductDescription VARCHAR(255) NOT NULL DEFAULT '', ProductPhoto VARCHAR(255) NOT NULL DEFAULT '', SellerName VARCHAR(255) NOT NULL DEFAULT '', SellerAddress VARCHAR(255) NOT NULL DEFAULT '', SellerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', SellerEmail VARCHAR(255) NOT NULL DEFAULT '', BuyerName VARCHAR(255) NOT NULL DEFAULT '', BuyerAddress VARCHAR(255) NOT NULL DEFAULT '', BuyerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', BuyerEmail VARCHAR(255) NOT NULL DEFAULT '', QRCode VARCHAR(255) NOT NULL DEFAULT '', PurchasePrice VARCHAR(255) NOT NULL DEFAULT '', SalePrice VARCHAR(255) NOT NULL DEFAULT '', subtotal VARCHAR(255) NOT NULL DEFAULT '', PaymentMethod VARCHAR(255) NOT NULL DEFAULT '', Tax VARCHAR(255) NOT NULL DEFAULT '', Borrow VARCHAR(255) NOT NULL DEFAULT '', AddedBy VARCHAR(255) NOT NULL DEFAULT '', MarkAs VARCHAR(255) NOT NULL DEFAULT '', Date VARCHAR(255) NOT NULL DEFAULT '', Time VARCHAR(255) NOT NULL DEFAULT '')";
                                $CreatedTable8 = mysqli_query($connect, $table8create);

                                if ($CreatedTable8) {

                                    $table9create = "CREATE TABLE " . $table9 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, InvoiceNo VARCHAR(255) NOT NULL DEFAULT '', ProductName VARCHAR(255) NOT NULL DEFAULT '', ProductID VARCHAR(255) NOT NULL DEFAULT '', ProductSerialNo VARCHAR(255) NOT NULL DEFAULT '', ProductQuantity VARCHAR(255) NOT NULL DEFAULT '', ProductDescription VARCHAR(255) NOT NULL DEFAULT '', ProductPhoto VARCHAR(255) NOT NULL DEFAULT '', SellerName VARCHAR(255) NOT NULL DEFAULT '', SellerAddress VARCHAR(255) NOT NULL DEFAULT '', SellerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', SellerEmail VARCHAR(255) NOT NULL DEFAULT '', BuyerName VARCHAR(255) NOT NULL DEFAULT '', BuyerAddress VARCHAR(255) NOT NULL DEFAULT '', BuyerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', BuyerEmail VARCHAR(255) NOT NULL DEFAULT '', QRCode VARCHAR(255) NOT NULL DEFAULT '', PurchasePrice VARCHAR(255) NOT NULL DEFAULT '', SalePrice VARCHAR(255) NOT NULL DEFAULT '', PaymentMethod VARCHAR(255) NOT NULL DEFAULT '', Tax VARCHAR(255) NOT NULL DEFAULT '', ShippingCost VARCHAR(255) NOT NULL DEFAULT '', AddedBy VARCHAR(255) NOT NULL DEFAULT '', MarkAs VARCHAR(255) NOT NULL DEFAULT '', Date VARCHAR(255) NOT NULL DEFAULT '', Time VARCHAR(255) NOT NULL DEFAULT '')";
                                    $CreatedTable9 = mysqli_query($connect, $table9create);

                                    if ($CreatedTable9) {

                                        $table10create = "CREATE TABLE " . $table10 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, InvoiceNo VARCHAR(255) NOT NULL DEFAULT '', ProductName VARCHAR(255) NOT NULL DEFAULT '', ProductID VARCHAR(255) NOT NULL DEFAULT '', ProductSerialNo VARCHAR(255) NOT NULL DEFAULT '', ProductQuantity VARCHAR(255) NOT NULL DEFAULT '', ProductDescription VARCHAR(255) NOT NULL DEFAULT '', ProductPhoto VARCHAR(255) NOT NULL DEFAULT '', SellerName VARCHAR(255) NOT NULL DEFAULT '', SellerAddress VARCHAR(255) NOT NULL DEFAULT '', SellerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', SellerEmail VARCHAR(255) NOT NULL DEFAULT '', BuyerName VARCHAR(255) NOT NULL DEFAULT '', BuyerAddress VARCHAR(255) NOT NULL DEFAULT '', BuyerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', BuyerEmail VARCHAR(255) NOT NULL DEFAULT '', QRCode VARCHAR(255) NOT NULL DEFAULT '', PurchasePrice VARCHAR(255) NOT NULL DEFAULT '', SalePrice VARCHAR(255) NOT NULL DEFAULT '', PaymentMethod VARCHAR(255) NOT NULL DEFAULT '', Tax VARCHAR(255) NOT NULL DEFAULT '', ShippingCost VARCHAR(255) NOT NULL DEFAULT '', AddedBy VARCHAR(255) NOT NULL DEFAULT '', MarkAs VARCHAR(255) NOT NULL DEFAULT '', Date VARCHAR(255) NOT NULL DEFAULT '', Time VARCHAR(255) NOT NULL DEFAULT '')";
                                        $CreatedTable10 = mysqli_query($connect, $table10create);

                                        if ($CreatedTable10) {

                                            $table11create = "CREATE TABLE " . $table11 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, InvoiceNo VARCHAR(255) NOT NULL DEFAULT '', ProductName VARCHAR(255) NOT NULL DEFAULT '', ProductID VARCHAR(255) NOT NULL DEFAULT '', ProductSerialNo VARCHAR(255) NOT NULL DEFAULT '', ProductQuantity VARCHAR(255) NOT NULL DEFAULT '', ProductDescription VARCHAR(255) NOT NULL DEFAULT '', ProductPhoto VARCHAR(255) NOT NULL DEFAULT '', SellerName VARCHAR(255) NOT NULL DEFAULT '', SellerAddress VARCHAR(255) NOT NULL DEFAULT '', SellerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', SellerEmail VARCHAR(255) NOT NULL DEFAULT '', BuyerName VARCHAR(255) NOT NULL DEFAULT '', BuyerAddress VARCHAR(255) NOT NULL DEFAULT '', BuyerPhoneNo VARCHAR(255) NOT NULL DEFAULT '', BuyerEmail VARCHAR(255) NOT NULL DEFAULT '', QRCode VARCHAR(255) NOT NULL DEFAULT '', PurchasePrice VARCHAR(255) NOT NULL DEFAULT '', SalePrice VARCHAR(255) NOT NULL DEFAULT '', PaymentMethod VARCHAR(255) NOT NULL DEFAULT '', Tax VARCHAR(255) NOT NULL DEFAULT '', ShippingCost VARCHAR(255) NOT NULL DEFAULT '', AddedBy VARCHAR(255) NOT NULL DEFAULT '', MarkAs VARCHAR(255) NOT NULL DEFAULT '', Date VARCHAR(255) NOT NULL DEFAULT '', Time VARCHAR(255) NOT NULL DEFAULT '')";
                                            $CreatedTable11 = mysqli_query($connect, $table11create);

                                            if ($CreatedTable11) {

                                                $table12create = "CREATE TABLE " . $table12 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, billno VARCHAR(255) NOT NULL DEFAULT '', remaining VARCHAR(255) NOT NULL DEFAULT '')";
                                                $CreatedTable12 = mysqli_query($connect, $table12create);

                                                if ($CreatedTable12) {

                                                    $table13create = "CREATE TABLE " . $table13 . "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, No VARCHAR(255) NOT NULL DEFAULT '', Total VARCHAR(255) NOT NULL DEFAULT '')";
                                                    $CreatedTable13 = mysqli_query($connect, $table13create);

                                                    if ($CreatedTable13) {

                                                        echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:green;'>Database Created Successfully . . . 😊</h1>";
                                                    } else {

                                                        echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                                                    }
                                                } else {

                                                    echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                                                }
                                            } else {

                                                echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                                            }
                                        } else {

                                            echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                                        }
                                    } else {

                                        echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                                    }
                                } else {

                                    echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                                }
                            } else {

                                echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                            }
                        } else {

                            echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                        }
                    } else {

                        echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                    }
                } else {

                    echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
                }
            } else {

                echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
            }
        } else {

            echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
        }
    } else {

        echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
    }
} else {

    echo "<h1 style='text-align:center;width:100%;height:100%;top:0;bottom:0;left:0;right:0;font-weight:900;color:red;'>Ooop's Something Went Wrong . . . 😥</h1>";
}

// $q = "INSERT INTO products  (SELECT * FROM storeinventorymanager.purchaseproducts)";
// $i = mysqli_query($connect, $q);
// if ($i) {
//     echo "Done";
// }