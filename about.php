<?php
session_start();
if (isset($_GET['newsearch'])){
  session_destroy();
}
// error_reporting(-1);
require('connection.php');

// include('helper.php');

$_SESSION['step1'] = uniqid();
$_SESSION['step2'] = uniqid();
$_SESSION['step3'] = uniqid();
$_SESSION['current'] = $_SESSION['step1'];
$newornot = false;
$noob = 0;
$aggrisvi = 0;
$save = 0;



?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<title>You Can Do It ! - About</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>

<body>
  <div class="leftMenu hidden-xs hidden-sm">
    <ul>
      <li><img src="img/logo.png" alt="" /></li>
      <li><a href="index.php">Home</a></li>
      <li><a href="how.php">How it works ?</a></li>
      <li><a href="about.php">About</a></li>
    </ul>
  </div>

  <nav class="navbar navbar-static-top hidden-md hidden-lg hidden-xl">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" width="20" height="20" /></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="https://github.com/ahmedsafadii/YouCanDoIt/blob/master/README.md">How it works ?</a></li>
          <li><a href="about.php">About</a></li>     
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


  <div class="container">
    <div class="row">
      <div class="mainContent">You Can Do It</div>
    </div>
    <div class="row">
      <div class="selectBox">
        <div class="titleSelect">
          You Can Do It
        </div>
        <div class="colorme">
        You Can Do It - Riot Games API Challenge 2016 <Br /><br />
          By (<a href="https://www.facebook.com/Ahmed.Safady">Ahmed Safadi - SKT T1 FEED3R(EUW)</a> & <a href="https://www.facebook.com/m7mad3wad">Mohammed Awad - Aza3em(EUW)</a>


          </div>
            <div class="clear"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
  <script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
  <script type="text/javascript">
    $('#save_image_locally').click(function(){
      html2canvas([document.getElementById('mydiv')],
      {
        onrendered: function (canvas) {
          var a = document.createElement('a');
          a.href = canvas.toDataURL('image/png');
          a.download = 'somefilename.jpg';
          a.click();
        }
      });
    });
  </script>
</body>


