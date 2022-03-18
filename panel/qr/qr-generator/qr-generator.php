<?php
session_start();
include "phpqrcode/qrlib.php";
if(!isset($_SESSION['Name'])){
    ?>
    <script>history.back();</script>
    <?php
 }

$InvoiceNo = $_SESSION['in'];
$ProductName = $_GET['pn'];

$text = $ProductName;

$img = substr(md5(microtime()), 0, 10);
$file = "../qrcodes/".$img.".png";
$ecc = 'H';
$pixel_size = 20;
$frame_size = 5;

$qr = QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);

$qrimg = "/qrcodes/".$img.".png";

echo "<script>location.replace('./saveqr.php?in=".$InvoiceNo."&&qr=".$qrimg."');</script>"; 

?>