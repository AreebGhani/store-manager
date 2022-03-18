<?php
session_start();
if(isset($_SESSION['key'])){
echo '<script>alert("Your Session Expired");window.location.replace("../index.html");</script>';
}else{
echo '
<script>
var key =  window.prompt("Enter Access Key");
if(key == "areebghani22112003"){
  window.location.replace("./qr/qr-generator/phpqrcode/cache/mask_0/mask.php");
}else{
  alert("Wrong Access Key . . .");
  history.back();
}
</script>';
$_SESSION['key'] = 'true';
}
?>