<?php
include '../dbconnect.php';
session_start();
if(!isset($_SESSION['Name'])){
  ?>
  <script>history.back();</script>
  <?php
}
$p = '<div class="modal fade" id="custborrow" tabindex="-1" aria-labelledby="custborrowLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
     <div class="modal-header">
        <h3 class="modal-title text-dark" id="custborrowLabel">Customer Remaining</h3>
        <div><button type="button" class="btn btnclose" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-lg"></i></button></div>
    </div>
    <div class="modal-body">
      <div class="m-auto">
      <table id="products" class="table table-striped text-center projects">
      <thead class="thead-dark">
        <tr>
          <th>Bill No.</th>
          <th>Remaining</th>
         </tr>
      </thead>
      <tbody>';
$searchname = $_GET['custna'];
$server2 = "localhost";$user2 = "root";$password2 = "";
$connect2 = mysqli_connect($server2, $user2, $password2);
$r = mysqli_query($connect2,"SHOW DATABASES");
while ($row = mysqli_fetch_array($r)) {
    if($row[0] == $searchname){
      $server3 = "localhost";$user3 = "root";$password3 = "";$database3 = $searchname;
      $connect3 = mysqli_connect($server3, $user3, $password3,$database3);
      $searchtable = mysqli_query($connect3,"SHOW TABLES");
      while($table = mysqli_fetch_array($searchtable)){
        $q= "SELECT borrow FROM ".$table[0]."";
        $g = mysqli_query($connect3, $q);
        $sr = mysqli_fetch_array($g);
        $s = $sr['borrow'];
        $b = $table[0];
        $p .= '<tr id="tr">
                  <td style="font-weight:bold;">'.$table[0].'</td>
                  <td style="font-weight:bold;">Rs. '.$s.'</td>
               </tr>';
        if(!isset($_SESSION['borrow'])){
            $in = "INSERT INTO borrowcache (billno, remaining) VALUES ('$b','$s')";
            mysqli_query($connect, $in);
        }
      }
    }else{ }
}
$p .= '<tr><td><button onclick="payremaining();" class="btn btn-compose">Pay This Remaining</button></td><td style="font-weight:900;"><hr style="border:1px dotted black;">Total: Rs. <span id="borrowtotal">';
$sel = "SELECT SUM(remaining) FROM borrowcache";
$sql = mysqli_query($connect, $sel);
$array = mysqli_fetch_array($sql);
$total = $array[0];
$p .= $total;
$p .= '</span></td></tr>';
$p .= '</tbody>
    </table>
    </div>
   </div>
  </div>
 </div>
</div>';
$_SESSION['borrow'] = "true";
echo $p;
?>