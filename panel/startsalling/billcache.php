<?php
session_start();
include '../dbconnect.php';
if (!isset($_SESSION['Name'])) {
?>
<script>
history.back();
</script>
<?php
}
$data = $_GET['data'];
extract($_POST);
if ($data == 'customer') {
  if (isset($_POST['submit'])) {
    $custna = $_POST['custna'];
    $custad = $_POST['custad'];
    $custcno = $_POST['custcno'];
    $custem = $_POST['custem'];
    $g = "SELECT * FROM custcache";
    $x = mysqli_query($connect, $g);
    $a = mysqli_num_rows($x);
    if ($a == 1) {
      echo "<script type='text/javascript'>alert('Customer Detail Is Already Added . . .');window.location.replace('./index.php?billcache=cust#customer');</script>";
    } else {
      $query = "INSERT INTO custcache (custna, custad, custcno, custem) VALUES ('$custna','$custad','$custcno','$custem')";
      $insert = mysqli_query($connect, $query);
      if ($insert) {
        $_SESSION['billcache'] = "cust";
        echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust#customer');</script>";
      } else {
        echo "<script type='text/javascript'>alert('Please Retry . . .');window.location.replace('./index.php');</script>";
      }
    }
  }
}
if ($data == 'product') {
  if (isset($_SESSION['billcache'])) {
    $billcache = $_SESSION['billcache'];
    if ($billcache == 'cust') {
      if (isset($_POST['submit'])) {
        $pna = $_POST['pna'];
        $pqty = $_POST['pqty'];
        $ptx = $_POST['ptx'];
        $pdis = $_POST['pdis'];
        $products = "SELECT * FROM purchaseproducts WHERE ProductName = '$pna'";
        $result = mysqli_query($connect, $products);
        $Check = mysqli_num_rows($result);
        if ($Check > 0) {
          while ($array = mysqli_fetch_array($result)) {
            $ppr = $array['SalePrice'];
            $qty = $array['ProductQuantity'];
            $pid = $array['ProductID'];
          }
          if ($pqty > $qty) {
            echo "<script type='text/javascript'>alert('Maximum Quantity Reached . . .');window.location.replace('./index.php?billcache=cust#customer');</script>";
          }
        } else {
          echo "<script type='text/javascript'>alert('Product Not Found . . .');window.location.replace('./index.php?billcache=cust#customer');</script>";
        }
        $subtotal = $ppr * $pqty - $pdis;
        $billno = round(microtime(true));
        if (!isset($_SESSION['billno'])) {
          $_SESSION['billno'] = $billno;
        }
        $query = "INSERT INTO prodcache (pna, pid, ppr, pqty, ptx, pdis, subtotal) VALUES ('$pna','$pid','$ppr','$pqty','$ptx','$pdis','$subtotal')";
        $insert = mysqli_query($connect, $query);
        if (isset($_SESSION['billcache3'])) {
          $billcache3 = $_SESSION['billcache3'];
          if ($billcache3 == 'table') {
            $cust = "SELECT * FROM custcache";
            $result1 = mysqli_query($connect, $cust);
            while ($custarray = mysqli_fetch_array($result1)) {
              $custna = $custarray['custna'];
              $custad = $custarray['custad'];
              $custcno = $custarray['custcno'];
              $custem = $custarray['custem'];
            }
            $query = "INSERT INTO " . $custna . " (custna, custad, custcno, custem, pna, pid, ppr, pqty, ptx, pdis, subtotal) VALUES ('$custna','$custad','$custcno','$custem','$pna','$pid','$ppr','$pqty','$ptx','$pdis','$subtotal')";
            $insert = mysqli_query($connect, $query);
            echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
          }
        }
        if ($insert) {
          $_SESSION['billcache2'] = "prod";
          echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno#products');</script>";
        } else {
          echo "<script type='text/javascript'>alert('Please Retry . . .');window.location.replace('./index.php');</script>";
        }
      }
    } else {
      echo "<script type='text/javascript'>alert('Please Add Customer Detail First . . .');window.location.replace('./index.php');</script>";
    }
  } else {
    echo "<script type='text/javascript'>alert('Please Add Customer Detail First . . .');window.location.replace('./index.php');</script>";
  }
}
if ($data == 'productfromsearch') {
  if (isset($_POST['submit'])) {
    $searchname = $_SESSION['searchname'];
    $pna = $_POST['pna'];
    $pqty = $_POST['pqty'];
    $ptx = $_POST['ptx'];
    $pdis = $_POST['pdis'];
    $products = "SELECT * FROM purchaseproducts WHERE ProductName = '$pna'";
    $result = mysqli_query($connect, $products);
    $Check = mysqli_num_rows($result);
    if ($Check > 0) {
      while ($array = mysqli_fetch_array($result)) {
        $ppr = $array['SalePrice'];
        $qty = $array['ProductQuantity'];
        $pid = $array['ProductID'];
      }
      if ($pqty > $qty) {
        echo "<script type='text/javascript'>alert('Maximum Quantity Reached . . .');history.back();</script>";
      }
    } else {
      echo "<script type='text/javascript'>alert('Product Not Found . . .');history.back;</script>";
    }
    $subtotal = $ppr * $pqty - $pdis;
    date_default_timezone_set("Asia/Karachi");
    $datetime =  date("d/m/Y . h:i:s a", time());
    $temp = explode(".", $datetime);
    $date = $temp[0];
    $time = end($temp);
    $select = "SELECT * FROM " . $searchname . "";
    $result = mysqli_query($connect, $select);
    $Rows = mysqli_num_rows($result);
    while ($getarray = mysqli_fetch_array($result)) {
      $pnadata = $getarray['pna'];
      $billno = $getarray['billno'];
      $custna = $getarray['custna'];
      $custad = $getarray['custad'];
      $custcno = $getarray['custcno'];
      $custem = $getarray['custem'];
    }
    if ($Rows == 1) {
      if ($pnadata == '') {
        $query1 = "UPDATE " . $searchname . " SET pna = '$pna' WHERE id = 1";
        mysqli_query($connect, $query1);
        $query2 = "UPDATE " . $searchname . " SET ppr = '$ppr' WHERE id = 1";
        mysqli_query($connect, $query2);
        $query3 = "UPDATE " . $searchname . " SET pqty = '$pqty' WHERE id = 1";
        mysqli_query($connect, $query3);
        $query4 = "UPDATE " . $searchname . " SET ptx = '$ptx' WHERE id = 1";
        mysqli_query($connect, $query4);
        $query5 = "UPDATE " . $searchname . " SET pdis = '$pdis' WHERE id = 1";
        mysqli_query($connect, $query5);
        $query6 = "UPDATE " . $searchname . " SET subtotal = '$subtotal' WHERE id = 1";
        mysqli_query($connect, $query6);
        $query7 = "UPDATE " . $searchname . " SET date = '$date' WHERE id = 1";
        mysqli_query($connect, $query7);
        $query8 = "UPDATE " . $searchname . " SET time = '$time' WHERE id = 1";
        mysqli_query($connect, $query8);
        $query9 = "UPDATE " . $searchname . " SET pid = '$pid' WHERE id = 1";
        mysqli_query($connect, $query9);
      } else {
        $query = "INSERT INTO " . $searchname . " (billno, custna, custad, custcno, custem, pna, ppr, pqty, ptx, pdis, subtotal, date, time) VALUES ('$billno','$custna','$custad','$custcno','$custem','$pna','$ppr','$pqty','$ptx','$pdis','$subtotal','$time','$date')";
        $insert = mysqli_query($connect, $query);
      }
    } else {
      $query = "INSERT INTO " . $searchname . " (billno, custna, custad, custcno, custem, pna, ppr, pqty, ptx, pdis, subtotal, date, time) VALUES ('$billno','$custna','$custad','$custcno','$custem','$pna','$ppr','$pqty','$ptx','$pdis','$subtotal','$time','$date')";
      $insert = mysqli_query($connect, $query);
    }
    $_SESSION['billcache'] = "cust";
    $_SESSION['billcache2'] = "prod";
    echo "<script type='text/javascript'>window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
  }
}
if ($data == 'savebill') {
  if (isset($_SESSION['billcache'])) {
    $billcache1 = $_SESSION['billcache'];
    if ($billcache1 == 'cust') {
      if (isset($_SESSION['billcache2'])) {
        $billcache2 = $_SESSION['billcache2'];
        if ($billcache2 == 'prod') {
          $cust = "SELECT * FROM custcache";
          $result1 = mysqli_query($connect, $cust);
          while ($custarray = mysqli_fetch_array($result1)) {
            $custna = $custarray['custna'];
            $custad = $custarray['custad'];
            $custcno = $custarray['custcno'];
            $custem = $custarray['custem'];
          }
          $billno = $_SESSION['billno'];
          date_default_timezone_set("Asia/Karachi");
          $datetime =  date("d/m/Y . h:i:s a", time());
          $temp = explode(".", $datetime);
          $date = $temp[0];
          $time = end($temp);
          if (isset($_SESSION['billcache3'])) {
            $billcache3 = $_SESSION['billcache3'];
            if ($billcache3 == 'table') {
              echo "<script type='text/javascript'>alert('Bill Saved . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
            }
          } else {
            $table = "CREATE TABLE " . $custna . " (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, billno VARCHAR(255) NOT NULL DEFAULT '', custna VARCHAR(255) NOT NULL DEFAULT '', custad VARCHAR(255) NOT NULL DEFAULT '', custcno VARCHAR(255) NOT NULL DEFAULT '', custem VARCHAR(255) NOT NULL DEFAULT '', pna VARCHAR(255) NOT NULL DEFAULT '', pid VARCHAR(255) NOT NULL DEFAULT '', ppr VARCHAR(255) NOT NULL DEFAULT '', pqty VARCHAR(255) NOT NULL DEFAULT '', ptx VARCHAR(255) NOT NULL DEFAULT '', pdis VARCHAR(255) NOT NULL DEFAULT '', subtotal VARCHAR(255) NOT NULL DEFAULT '', date VARCHAR(255) NOT NULL DEFAULT '', time VARCHAR(255) NOT NULL DEFAULT '')";
            $tablecreated = mysqli_query($connect, $table);
            if ($tablecreated) {
              $_SESSION['billcache3'] = "table";
              $prod = "SELECT * FROM prodcache";
              $result2 = mysqli_query($connect, $prod);
              while ($prodarray = mysqli_fetch_array($result2)) {
                $pna = $prodarray['pna'];
                $pid = $prodarray['pid'];
                $ppr = $prodarray['ppr'];
                $pqty = $prodarray['pqty'];
                $ptx = $prodarray['ptx'];
                $pdis = $prodarray['pdis'];
                $subtotal = $prodarray['subtotal'];
                $query = "INSERT INTO " . $custna . " (billno, custna, custad, custcno, custem, pna, pid, ppr, pqty, ptx, pdis, subtotal, date, time) VALUES ('$billno','$custna','$custad','$custcno','$custem','$pna','$pid','$ppr','$pqty','$ptx','$pdis','$subtotal','$date','$time')";
                $insert = mysqli_query($connect, $query);
              }
              echo "<script type='text/javascript'>alert('Bill Saved . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
            } else {
              echo "<script type='text/javascript'>alert('Customer Bill Already Exists . . .                                                                First Delete That Bill To Save Another Bill Of Same Customer');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
            }
          }
        } else {
          echo "<script type='text/javascript'>alert('Cannot Save . . . * Please Add Products First');window.location.replace('./index.php?billcache=cust');</script>";
        }
      } else {
        echo "<script type='text/javascript'>alert('Cannot Save . . . * Please Add Products First');window.location.replace('./index.php?billcache=cust');</script>";
      }
    } else {
      echo "<script type='text/javascript'>alert('Cannot Save . . . * Please Add Customer Detail First');window.location.replace('./index.php');</script>";
    }
  } else {
    echo "<script type='text/javascript'>alert('Cannot Save . . . * Please Add Customer Detail First');window.location.replace('./index.php');</script>";
  }
}
if ($data == 'savebillfromsearch') {
  echo "<script type='text/javascript'>alert('Bill Saved . . .');window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
}
if ($data == 'editdetail') {
  if (isset($_POST['submit'])) {
    $pna = $_POST['pna'];
    $pqty = $_POST['pqty'];
    $ppr = $_POST['ppr'];
    $pdis = $_POST['pdis'];
    $id = $_POST['id'];
    $cal = ($pqty * $ppr) - $pdis;
    $products = "SELECT * FROM purchaseproducts WHERE ProductName = '$pna'";
    $result = mysqli_query($connect, $products);
    $Check = mysqli_num_rows($result);
    if ($Check > 0) {
      while ($array = mysqli_fetch_array($result)) {
        $ppr = $array['SalePrice'];
        $qty = $array['ProductQuantity'];
        $pid = $array['ProductID'];
      }
      if ($pqty > $qty) {
        echo "<script type='text/javascript'>alert('Maximum Quantity Reached . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
      }
    } else {
      echo "<script type='text/javascript'>alert('Product Not Found . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
    }
    $query1 = "UPDATE prodcache SET pna = '$pna' WHERE id = '$id'";
    mysqli_query($connect, $query1);
    $query2 = "UPDATE prodcache SET pqty = '$pqty' WHERE id = '$id'";
    mysqli_query($connect, $query2);
    $query3 = "UPDATE prodcache SET ppr = '$ppr' WHERE id = '$id'";
    mysqli_query($connect, $query3);
    $query4 = "UPDATE prodcache SET pdis = '$pdis' WHERE id = '$id'";
    mysqli_query($connect, $query4);
    $query5 = "UPDATE prodcache SET subtotal = '$cal' WHERE id = '$id'";
    mysqli_query($connect, $query5);
    $query11 = "UPDATE prodcache SET pid = '$pid' WHERE id = '$id'";
    mysqli_query($connect, $query11);
    if (isset($_SESSION['billcache3'])) {
      $billcache3 = $_SESSION['billcache3'];
      if ($billcache3 == 'table') {
        $cust = "SELECT * FROM custcache";
        $result1 = mysqli_query($connect, $cust);
        while ($custarray = mysqli_fetch_array($result1)) {
          $custna = $custarray['custna'];
        }
        $query6 = "UPDATE " . $custna . " SET pna = '$pna' WHERE id = '$id'";
        mysqli_query($connect, $query6);
        $query7 = "UPDATE " . $custna . " SET pqty = '$pqty' WHERE id = '$id'";
        mysqli_query($connect, $query7);
        $query8 = "UPDATE " . $custna . " SET ppr = '$ppr' WHERE id = '$id'";
        mysqli_query($connect, $query8);
        $query9 = "UPDATE " . $custna . " SET pdis = '$pdis' WHERE id = '$id'";
        mysqli_query($connect, $query9);
        $query10 = "UPDATE " . $custna . " SET subtotal = '$cal' WHERE id = '$id'";
        mysqli_query($connect, $query10);
        $query12 = "UPDATE " . $custna . " SET pid = '$pid' WHERE id = '$id'";
        mysqli_query($connect, $query12);
        echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
      } else {
        echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
      }
    } else {
      echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
    }
  }
}
if ($data == 'editdetailfromsearch') {
  if (isset($_POST['submit'])) {
    $searchname = $_SESSION['searchname'];
    $pna = $_POST['pna'];
    $pqty = $_POST['pqty'];
    $ppr = $_POST['ppr'];
    $pdis = $_POST['pdis'];
    $id = $_POST['id'];
    $cal = ($pqty * $ppr) - $pdis;
    $products = "SELECT * FROM purchaseproducts WHERE ProductName = '$pna'";
    $result = mysqli_query($connect, $products);
    $Check = mysqli_num_rows($result);
    if ($Check > 0) {
      while ($array = mysqli_fetch_array($result)) {
        $ppr = $array['SalePrice'];
        $qty = $array['ProductQuantity'];
        $pid = $array['ProductID'];
      }
      if ($pqty > $qty) {
        echo "<script type='text/javascript'>alert('Maximum Quantity Reached . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
      }
    } else {
      echo "<script type='text/javascript'>alert('Product Not Found . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
    }
    $query1 = "UPDATE " . $searchname . " SET pna = '$pna' WHERE id = '$id'";
    mysqli_query($connect, $query1);
    $query2 = "UPDATE " . $searchname . " SET pqty = '$pqty' WHERE id = '$id'";
    mysqli_query($connect, $query2);
    $query3 = "UPDATE " . $searchname . " SET ppr = '$ppr' WHERE id = '$id'";
    mysqli_query($connect, $query3);
    $query4 = "UPDATE " . $searchname . " SET pdis = '$pdis' WHERE id = '$id'";
    mysqli_query($connect, $query4);
    $query5 = "UPDATE " . $searchname . " SET subtotal = '$cal' WHERE id = '$id'";
    mysqli_query($connect, $query5);
    $query5 = "UPDATE " . $searchname . " SET pid = '$pid' WHERE id = '$id'";
    mysqli_query($connect, $query5);
    echo "<script type='text/javascript'>window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
  }
}
if ($data == 'delete') {
  $id = $_GET['id'];
  $query1 = "DELETE FROM prodcache WHERE id = $id";
  mysqli_query($connect, $query1);
  if (isset($_SESSION['billcache3'])) {
    $billcache3 = $_SESSION['billcache3'];
    if ($billcache3 == 'table') {
      $cust = "SELECT * FROM custcache";
      $result1 = mysqli_query($connect, $cust);
      while ($custarray = mysqli_fetch_array($result1)) {
        $custna = $custarray['custna'];
      }
      $query2 = "DELETE FROM " . $custna . " WHERE id = '$id'";
      mysqli_query($connect, $query2);
      echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
    } else {
      echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
    }
  } else {
    echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
  }
}
if ($data == 'deletefromsearch') {
  $id = $_GET['id'];
  $searchname = $_SESSION['searchname'];
  $select = "SELECT * FROM " . $searchname . "";
  $result = mysqli_query($connect, $select);
  $Rows = mysqli_num_rows($result);
  if ($Rows == '1') {
    $query1 = "UPDATE " . $searchname . " SET pna = '' WHERE id = $id";
    mysqli_query($connect, $query1);
    $query2 = "UPDATE " . $searchname . " SET ppr = '' WHERE id = $id";
    mysqli_query($connect, $query2);
    $query3 = "UPDATE " . $searchname . " SET pqty = '' WHERE id = $id";
    mysqli_query($connect, $query3);
    $query4 = "UPDATE " . $searchname . " SET ptx = '' WHERE id = $id";
    mysqli_query($connect, $query4);
    $query5 = "UPDATE " . $searchname . " SET pdis = '' WHERE id = $id";
    mysqli_query($connect, $query5);
    $query6 = "UPDATE " . $searchname . " SET subtotal = '' WHERE id = $id";
    mysqli_query($connect, $query6);
    $query7 = "UPDATE " . $searchname . " SET date = '' WHERE id = $id";
    mysqli_query($connect, $query7);
    $query8 = "UPDATE " . $searchname . " SET time = '' WHERE id = $id";
    mysqli_query($connect, $query8);
    $query9 = "UPDATE " . $searchname . " SET pid = '' WHERE id = $id";
    mysqli_query($connect, $query9);
  } else {
    $query = "DELETE FROM " . $searchname . " WHERE id = '$id'";
    mysqli_query($connect, $query);
  }
  echo "<script type='text/javascript'>window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
}
if ($data == 'printbill') {
  if (isset($_SESSION['billcache'])) {
    $billcache1 = $_SESSION['billcache'];
    if ($billcache1 == 'cust') {
      if (isset($_SESSION['billcache2'])) {
        $billcache2 = $_SESSION['billcache2'];
        if ($billcache2 == 'prod') {
          $billno = $_SESSION['billno'];
          $cust = "SELECT * FROM custcache";
          $result1 = mysqli_query($connect, $cust);
          while ($custarray = mysqli_fetch_array($result1)) {
            $custna = $custarray['custna'];
            $custad = $custarray['custad'];
            $custcno = $custarray['custcno'];
            $custem = $custarray['custem'];
          }
          $server2 = "localhost";
          $user2 = "root";
          $password2 = "";
          $database2 = $custna;
          $connect2 = mysqli_connect($server2, $user2, $password2);
          $r = mysqli_query($connect2, "SHOW DATABASES");
          while ($row = mysqli_fetch_array($r)) {
            if ($row[0] == $custna) {
              $server3 = "localhost";
              $user3 = "root";
              $password3 = "";
              $database3 = $custna;
              $connect3 = mysqli_connect($server3, $user3, $password3, $database3);
              $table = "CREATE TABLE " . $custna . $billno . " (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, billno VARCHAR(255) NOT NULL DEFAULT '', custna VARCHAR(255) NOT NULL DEFAULT '', custad VARCHAR(255) NOT NULL DEFAULT '', custcno VARCHAR(255) NOT NULL DEFAULT '', custem VARCHAR(255) NOT NULL DEFAULT '', pna VARCHAR(255) NOT NULL DEFAULT '', pid VARCHAR(255) NOT NULL DEFAULT '', ppr VARCHAR(255) NOT NULL DEFAULT '', pqty VARCHAR(255) NOT NULL DEFAULT '', ptx VARCHAR(255) NOT NULL DEFAULT '', pdis VARCHAR(255) NOT NULL DEFAULT '', subtotal VARCHAR(255) NOT NULL DEFAULT '', total VARCHAR(255) NOT NULL DEFAULT '', received VARCHAR(255) NOT NULL DEFAULT '', adjustment VARCHAR(255) NOT NULL DEFAULT '', remaining VARCHAR(255) NOT NULL DEFAULT '', cashback VARCHAR(255) NOT NULL DEFAULT '', borrow VARCHAR(255) NOT NULL DEFAULT '', payment VARCHAR(255) NOT NULL DEFAULT '', date VARCHAR(255) NOT NULL DEFAULT '', time VARCHAR(255) NOT NULL DEFAULT '')";
              $tablecreated = mysqli_query($connect3, $table);
              if ($tablecreated) {
                if (isset($_GET['submit'])) {
                  $total = $_GET['totalamount'];
                  $received = $_GET['receivedamount'];
                  $adjustment = $_GET['adjustment'];
                  $remaining = $_GET['remaining'];
                  $cashback = $_GET['cashback'];
                  $borrow = $_GET['borrowamount'];
                  $payment = $_GET['paymentvalue'];
                  date_default_timezone_set("Asia/Karachi");
                  $datetime =  date("d/m/Y . h:i:s a", time());
                  $temp = explode(".", $datetime);
                  $date = $temp[0];
                  $time = end($temp);
                  $prod = "SELECT * FROM prodcache";
                  $result2 = mysqli_query($connect, $prod);
                  while ($prodarray = mysqli_fetch_array($result2)) {
                    $pna = $prodarray['pna'];
                    $pid = $prodarray['pid'];
                    $ppr = $prodarray['ppr'];
                    $pqty = $prodarray['pqty'];
                    $ptx = $prodarray['ptx'];
                    $pdis = $prodarray['pdis'];
                    $subtotal = $prodarray['subtotal'];
                    $query = "INSERT INTO " . $custna . $billno . " (billno, custna, custad, custcno, custem, pna, pid, ppr, pqty, ptx, pdis, subtotal, total, received, adjustment, remaining, cashback, borrow, payment, date, time) VALUES ('$billno','$custna','$custad','$custcno','$custem','$pna','$pid','$ppr','$pqty','$ptx','$pdis','$subtotal','$total','$received','$adjustment','$remaining','$cashback','$borrow','$payment','$date','$time')";
                    $insert = mysqli_query($connect3, $query);
                  }
                  if ($insert) {
                    echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true&&billcache4=printbill#products');</script>";
                  } else {
                    echo "<script type='text/javascript'>alert('Please Retry . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
                  }
                }
              }
            } else {
              $dbcreate = "CREATE DATABASE " . $custna . "";
              $database = mysqli_query($connect2, $dbcreate);
              if ($database) {
                $connect3 = mysqli_connect($server2, $user2, $password2, $database2);
                $table = "CREATE TABLE " . $custna . $billno . " (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, billno VARCHAR(255) NOT NULL DEFAULT '', custna VARCHAR(255) NOT NULL DEFAULT '', custad VARCHAR(255) NOT NULL DEFAULT '', custcno VARCHAR(255) NOT NULL DEFAULT '', custem VARCHAR(255) NOT NULL DEFAULT '', pna VARCHAR(255) NOT NULL DEFAULT '', pid VARCHAR(255) NOT NULL DEFAULT '', ppr VARCHAR(255) NOT NULL DEFAULT '', pqty VARCHAR(255) NOT NULL DEFAULT '', ptx VARCHAR(255) NOT NULL DEFAULT '', pdis VARCHAR(255) NOT NULL DEFAULT '', subtotal VARCHAR(255) NOT NULL DEFAULT '', total VARCHAR(255) NOT NULL DEFAULT '', received VARCHAR(255) NOT NULL DEFAULT '', adjustment VARCHAR(255) NOT NULL DEFAULT '', remaining VARCHAR(255) NOT NULL DEFAULT '', cashback VARCHAR(255) NOT NULL DEFAULT '', borrow VARCHAR(255) NOT NULL DEFAULT '', payment VARCHAR(255) NOT NULL DEFAULT '', date VARCHAR(255) NOT NULL DEFAULT '', time VARCHAR(255) NOT NULL DEFAULT '')";
                $tablecreated = mysqli_query($connect3, $table);
                if ($tablecreated) {
                  if (isset($_GET['submit'])) {
                    $total = $_GET['totalamount'];
                    $received = $_GET['receivedamount'];
                    $adjustment = $_GET['adjustment'];
                    $remaining = $_GET['remaining'];
                    $cashback = $_GET['cashback'];
                    $borrow = $_GET['borrowamount'];
                    $payment = $_GET['paymentvalue'];
                    date_default_timezone_set("Asia/Karachi");
                    $datetime =  date("d/m/Y . h:i:s a", time());
                    $temp = explode(".", $datetime);
                    $date = $temp[0];
                    $time = end($temp);
                    $prod = "SELECT * FROM prodcache";
                    $result2 = mysqli_query($connect, $prod);
                    while ($prodarray = mysqli_fetch_array($result2)) {
                      $pna = $prodarray['pna'];
                      $pid = $prodarray['pid'];
                      $ppr = $prodarray['ppr'];
                      $pqty = $prodarray['pqty'];
                      $ptx = $prodarray['ptx'];
                      $pdis = $prodarray['pdis'];
                      $subtotal = $prodarray['subtotal'];
                      $query = "INSERT INTO " . $custna . $billno . " (billno, custna, custad, custcno, custem, pna, pid, ppr, pqty, ptx, pdis, subtotal, total, received, adjustment, remaining, cashback, borrow, payment, date, time) VALUES ('$billno','$custna','$custad','$custcno','$custem','$pna','$pid','$ppr','$pqty','$ptx','$pdis','$subtotal','$total','$received','$adjustment','$remaining','$cashback','$borrow','$payment','$date','$time')";
                      $insert = mysqli_query($connect3, $query);
                    }
                    if ($insert) {
                      echo "<script type='text/javascript'>window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true&&billcache4=printbill#products');</script>";
                    } else {
                      echo "<script type='text/javascript'>alert('Please Retry . . .');window.location.replace('./index.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
                    }
                  }
                }
              }
            }
          }
        } else {
          echo "<script type='text/javascript'>alert('Cannot Print . . . * Please Add Products First');window.location.replace('./index.php?billcache=cust');</script>";
        }
      } else {
        echo "<script type='text/javascript'>alert('Cannot Print . . . * Please Add Products First');window.location.replace('./index.php?billcache=cust');</script>";
      }
    } else {
      echo "<script type='text/javascript'>alert('Cannot Print . . . * Please Add Customer Detail First');window.location.replace('./index.php');</script>";
    }
  } else {
    echo "<script type='text/javascript'>alert('Cannot Print . . . * Please Add Customer Detail First');window.location.replace('./index.php');</script>";
  }
}
if ($data == 'printbillfromsearch') {
  $searchname = $_SESSION['searchname'];
  $select = "SELECT * FROM " . $searchname . "";
  $result = mysqli_query($connect, $select);
  while ($getarray = mysqli_fetch_array($result)) {
    $billno = $getarray['billno'];
    $custna = $getarray['custna'];
    $custad = $getarray['custad'];
    $custcno = $getarray['custcno'];
    $custem = $getarray['custem'];
  }
  $server2 = "localhost";
  $user2 = "root";
  $password2 = "";
  $database2 = $searchname;
  $connect2 = mysqli_connect($server2, $user2, $password2);
  $r = mysqli_query($connect2, "SHOW DATABASES");
  while ($row = mysqli_fetch_array($r)) {
    if ($row[0] == $searchname) {
      $server3 = "localhost";
      $user3 = "root";
      $password3 = "";
      $database3 = $searchname;
      $connect3 = mysqli_connect($server3, $user3, $password3, $database3);
      $table = "CREATE TABLE " . $searchname . $billno . " (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, billno VARCHAR(255) NOT NULL DEFAULT '', custna VARCHAR(255) NOT NULL DEFAULT '', custad VARCHAR(255) NOT NULL DEFAULT '', custcno VARCHAR(255) NOT NULL DEFAULT '', custem VARCHAR(255) NOT NULL DEFAULT '', pna VARCHAR(255) NOT NULL DEFAULT '', pid VARCHAR(255) NOT NULL DEFAULT '', ppr VARCHAR(255) NOT NULL DEFAULT '', pqty VARCHAR(255) NOT NULL DEFAULT '', ptx VARCHAR(255) NOT NULL DEFAULT '', pdis VARCHAR(255) NOT NULL DEFAULT '', subtotal VARCHAR(255) NOT NULL DEFAULT '', total VARCHAR(255) NOT NULL DEFAULT '', received VARCHAR(255) NOT NULL DEFAULT '', adjustment VARCHAR(255) NOT NULL DEFAULT '', remaining VARCHAR(255) NOT NULL DEFAULT '', cashback VARCHAR(255) NOT NULL DEFAULT '', borrow VARCHAR(255) NOT NULL DEFAULT '', payment VARCHAR(255) NOT NULL DEFAULT '', date VARCHAR(255) NOT NULL DEFAULT '', time VARCHAR(255) NOT NULL DEFAULT '')";
      $tablecreated = mysqli_query($connect3, $table);
      if ($tablecreated) {
        if (isset($_GET['submit'])) {
          $total = $_GET['totalamount'];
          $received = $_GET['receivedamount'];
          $adjustment = $_GET['adjustment'];
          $remaining = $_GET['remaining'];
          $cashback = $_GET['cashback'];
          $borrow = $_GET['borrowamount'];
          $payment = $_GET['paymentvalue'];
          date_default_timezone_set("Asia/Karachi");
          $datetime =  date("d/m/Y . h:i:s a", time());
          $temp = explode(".", $datetime);
          $date = $temp[0];
          $time = end($temp);
          $prod = "SELECT * FROM " . $searchname . "";
          $result2 = mysqli_query($connect, $prod);
          while ($prodarray = mysqli_fetch_array($result2)) {
            $pna = $prodarray['pna'];
            $pid = $prodarray['pid'];
            $ppr = $prodarray['ppr'];
            $pqty = $prodarray['pqty'];
            $ptx = $prodarray['ptx'];
            $pdis = $prodarray['pdis'];
            $subtotal = $prodarray['subtotal'];
            $query = "INSERT INTO " . $custna . $billno . " (billno, custna, custad, custcno, custem, pna, pid, ppr, pqty, ptx, pdis, subtotal, total, received, adjustment, remaining, cashback, borrow, payment, date, time) VALUES ('$billno','$custna','$custad','$custcno','$custem','$pna','$pid','$ppr','$pqty','$ptx','$pdis','$subtotal','$total','$received','$adjustment','$remaining','$cashback','$borrow','$payment','$date','$time')";
            $insert = mysqli_query($connect3, $query);
          }
          if ($insert) {
            echo "<script type='text/javascript'>window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true&&billcache4=printbill#products');</script>";
          } else {
            echo "<script type='text/javascript'>alert('Please Retry . . .');window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
          }
        }
      }
    } else {
      $dbcreate = "CREATE DATABASE " . $searchname . "";
      $database = mysqli_query($connect2, $dbcreate);
      if ($database) {
        $connect3 = mysqli_connect($server2, $user2, $password2, $database2);
        $table = "CREATE TABLE " . $searchname . $billno . " (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, billno VARCHAR(255) NOT NULL DEFAULT '', custna VARCHAR(255) NOT NULL DEFAULT '', custad VARCHAR(255) NOT NULL DEFAULT '', custcno VARCHAR(255) NOT NULL DEFAULT '', custem VARCHAR(255) NOT NULL DEFAULT '', pna VARCHAR(255) NOT NULL DEFAULT '', pid VARCHAR(255) NOT NULL DEFAULT '', ppr VARCHAR(255) NOT NULL DEFAULT '', pqty VARCHAR(255) NOT NULL DEFAULT '', ptx VARCHAR(255) NOT NULL DEFAULT '', pdis VARCHAR(255) NOT NULL DEFAULT '', subtotal VARCHAR(255) NOT NULL DEFAULT '', total VARCHAR(255) NOT NULL DEFAULT '', received VARCHAR(255) NOT NULL DEFAULT '', adjustment VARCHAR(255) NOT NULL DEFAULT '', remaining VARCHAR(255) NOT NULL DEFAULT '', cashback VARCHAR(255) NOT NULL DEFAULT '', borrow VARCHAR(255) NOT NULL DEFAULT '', payment VARCHAR(255) NOT NULL DEFAULT '', date VARCHAR(255) NOT NULL DEFAULT '', time VARCHAR(255) NOT NULL DEFAULT '')";
        $tablecreated = mysqli_query($connect3, $table);
        if ($tablecreated) {
          if (isset($_GET['submit'])) {
            $total = $_GET['totalamount'];
            $received = $_GET['receivedamount'];
            $adjustment = $_GET['adjustment'];
            $remaining = $_GET['remaining'];
            $cashback = $_GET['cashback'];
            $borrow = $_GET['borrowamount'];
            $payment = $_GET['paymentvalue'];
            date_default_timezone_set("Asia/Karachi");
            $datetime =  date("d/m/Y . h:i:s a", time());
            $temp = explode(".", $datetime);
            $date = $temp[0];
            $time = end($temp);
            $prod = "SELECT * FROM " . $searchname . "";
            $result2 = mysqli_query($connect, $prod);
            while ($prodarray = mysqli_fetch_array($result2)) {
              $pna = $prodarray['pna'];
              $pid = $prodarray['pid'];
              $ppr = $prodarray['ppr'];
              $pqty = $prodarray['pqty'];
              $ptx = $prodarray['ptx'];
              $pdis = $prodarray['pdis'];
              $subtotal = $prodarray['subtotal'];
              $query = "INSERT INTO " . $searchname . $billno . " (billno, custna, custad, custcno, custem, pna, pid, ppr, pqty, ptx, pdis, subtotal, total, received, adjustment, remaining, cashback, borrow, payment, date, time) VALUES ('$billno','$custna','$custad','$custcno','$custem','$pna','$pid','$ppr','$pqty','$ptx','$pdis','$subtotal','$total','$received','$adjustment','$remaining','$cashback','$borrow','$payment','$date','$time')";
              $insert = mysqli_query($connect3, $query);
            }
            if ($insert) {
              echo "<script type='text/javascript'>window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true&&billcache4=printbill#products');</script>";
            } else {
              echo "<script type='text/javascript'>alert('Please Retry . . .');window.location.replace('./getsearchbill.php?billcache=cust&&billcache2=prod&&billcache3=billno&&total=true#products');</script>";
            }
          }
        }
      }
    }
  }
}
?>