<?php
session_start();
if(!isset($_SESSION['Name'])){
  ?>
  <script>history.back();</script>
  <?php
} 
?>
<html>
  <head>
    <title>QR &ndash; Reader</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <style>.none{display:none;}</style>
    <script>
      setTimeout(function () {
       alert('Time Out . . .');
       history.back();
	    }, 9000);
    </script>
  </head>
  <body>
    <div id="app" class="row">
      <div class="sidebar col-lg-6 col-sm-12">
        <section class="cameras">
          <h2>Cameras</h2>
          <ul>
            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
            <li v-for="camera in cameras">
              <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
              <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
              </span>
            </li>
          </ul>
        </section>
        <section class="scans text-center">
          <h2>Scans</h2>
          <ul v-if="scans.length === 0">
            <li class="empty">No scans yet</li>
          </ul>
          <transition-group name="scans" tag="ul">
            <li id="data" v-for="scan in scans" :key="scan.date" :title="scan.content">
              {{ scan.content }}
            </li>
          </transition-group>
        </section>
      </div>
      <div class="preview-container col-lg-6 col-sm-12">
        <video id="preview"></video>
      </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
    <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
    <script>
      function save(){
       var x = document.getElementById("qr").value;
       window.location.replace('./newqr.php?qr=' + x);
      }
      <?php
      if(isset($_GET['searchqr'])){
      ?>
        $(document).ready(function(){
          setTimeout(function(){
            var qr =  $('#data').text();
            scan = qr.replace(/ {1,}/g,' ').trim();
            if(scan){
              window.location.replace('../../php/searchproduct.php?data='+scan+'');
            }else{alert('Please Retry . . .');history.back();}
          },4000);
        });
      <?php
      }
      if(isset($_GET['salling'])){
      ?>
      $(document).ready(function(){
        setTimeout(function(){
          var qr =  $('#data').text();
           scan = qr.replace(/ {1,}/g,' ').trim();
          if(scan){
            window.location.replace('../../startsalling/scanprodcache.php?data='+scan+'');
          }else{alert('Please Retry . . .');history.back();}
        },4000);
      });
      <?php
      }
      if(isset($_GET['salling2'])){
        ?>
        $(document).ready(function(){
        setTimeout(function(){
          var qr =  $('#data').text();
          scan = qr.replace(/ {1,}/g,' ').trim();
          if(scan){
           window.location.replace('../../startsalling/scanprodcache.php?data2='+scan+'');
          }else{alert('Please Retry . . .');history.back();}
        },4000);
      });
        <?php
      }
      ?>
      <?php
       if(isset($_GET['addprod'])){
        ?>
          setTimeout(function(){
            var qr =  $('#data').text();
            scan = qr.replace(/ {1,}/g,' ').trim();
            if(scan){
             window.location.replace('./newqr.php?qr=' + scan);
            }else{alert('Please Retry . . .');history.back();}
          },4000);
        <?php
       }
      ?>
    </script>
  </body>
</html>
