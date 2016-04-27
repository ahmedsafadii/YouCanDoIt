<?php
require('connection.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<title>You Can Do It !</title>
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
      <li><a href="#">Home</a></li>
      <li><a href="#">Expert Players</a></li>
      <li><a href="#">About</a></li>
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
      <li><a href="#">Home</a></li>
      <li><a href="#">Expert Players</a></li>
      <li><a href="#">About</a></li>      
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
      <div class="boxSelect">
        <form action="#" method="get">
        <div class="form-group" style="float:left;width:340px;padding-right:10px;">
        <input type="text" placeholder="Enter Summoner Name..." class="form-control" id="usr">
        </div>    
          <div class="form-group" style="float:left;">
            <select title="Select Region" name="id" data-live-search="true" data-size="5" data-width="200px" class="selectpicker">
            <option class="bs-title-option" value="">Select Region</option>
            <option label="re-na" value="re-na" data-content="<img class='img-circle' src='../img/regions/s6.png' width='20' height='20' alt='North America Region' /> North America"></option> 
            <option label="re-euw" value="re-euw" data-content="<img class='img-circle' src='../img/regions/s2.png' width='20' height='20' alt='Europe West Region' /> Europe West"></option> 
            <option label="re-eune" value="re-eune" data-content="<img class='img-circle' src='../img/regions/s3.png' width='20' height='20' alt='Europe Nordic & East Region' /> Europe Nordic & East"></option> 
            <option label="re-kr" value="re-kr" data-content="<img class='img-circle' src='../img/regions/s5.png' width='20' height='20' alt='Korea Region' /> Korea"></option> 
            <option label="re-oce" value="re-oce" data-content="<img class='img-circle' src='../img/regions/s9.png' width='20' height='20' alt='Oceania Region' /> Oceania"></option> 
            <option label="re-jp" value="re-jp" data-content="<img class='img-circle' src='../img/regions/s4.png' width='20' height='20' alt='Japan Region' /> Japan"></option> 
            <option label="re-br" value="re-br" data-content="<img class='img-circle' src='../img/regions/s1.png' width='20' height='20' alt='Brazil Region' /> Brazil"></option> 
            <option label="re-las" value="re-las" data-content="<img class='img-circle' src='../img/regions/s7.png' width='20' height='20' alt='Latin America South Region' /> Latin America South"></option> 
            <option label="re-lan" value="re-lan" data-content="<img class='img-circle' src='../img/regions/s8.png' width='20' height='20' alt='Latin America North Region' /> Latin America North"></option> 
            <option label="re-ru" value="re-ru" data-content="<img class='img-circle' src='../img/regions/s10.png' width='20' height='20' alt='Russia Region' /> Russia"></option> 
            <option label="re-tr" value="re-tr" data-content="<img class='img-circle' src='../img/regions/s11.png' width='20' height='20' alt='Turkey Region' /> Turkey"></option> 
            </select>
           </div>
           <div class="clear"></div>
          <div class="form-group" style="float:left;">
            <select title="Select Champion" name="id" data-live-search="true" data-size="5" data-width="540px" class="selectpicker">
            <option class="bs-title-option" value="">Select Champion</option>
            <option label="1026" value="1026" data-content="<img class='img-circle' src='http://mqds.edu.ps/aparena/images/item/3003.png' width='20' height='20' alt='Europe Nordic & East' /> Europe Nordic & East"></option> 
            </select>
           </div>
           <div class="clear"></div>
          <div class="form-group" style="float:left;padding-right:10px;">
            <select title="Select Expert Player" name="id" data-live-search="true" data-size="5" data-width="330px" class="selectpicker">
            <option class="bs-title-option" value="">Select Expert Player</option>
            <option label="1026" value="1026" data-content="<img class='img-circle' src='http://mqds.edu.ps/aparena/images/item/3003.png' width='20' height='20' alt='Europe Nordic & East' /> Europe Nordic & East"></option> 
            </select>
           </div>
          <div class="form-group" style="float:left;">
            <select title="Select Language" name="id" data-live-search="true" data-size="5" data-width="200px" class="selectpicker">
            <option class="bs-title-option" value="">Select Language</option>
            <option label="la-ar" value="la-ar" data-content="<img class='img-circle' src='../img/lang/r-1.png' width='20' height='20' alt='Arabic Language' /> Arabic"></option> 
            <option label="la-en" value="la-en" data-content="<img class='img-circle' src='../img/lang/r-3.png' width='20' height='20' alt='English Language' /> English"></option> 
            <option label="la-sp" value="la-sp" data-content="<img class='img-circle' src='../img/lang/r-2.png' width='20' height='20' alt='Spain Language' /> Spain"></option> 
            <option label="la-fr" value="la-fr" data-content="<img class='img-circle' src='../img/lang/r-7.png' width='20' height='20' alt='France Language' /> France"></option> 
            <option label="la-ch" value="la-ch" data-content="<img class='img-circle' src='../img/lang/r-4.png' width='20' height='20' alt='China Language' /> China"></option> 
            <option label="la-ru" value="la-ru" data-content="<img class='img-circle' src='../img/lang/r-5.png' width='20' height='20' alt='Russia Language' /> Russia"></option> 
            </select>
           </div>
          <div class="form-group" style="float:left;">
          <button type="submit" class="btn btn-primary" style="width:540px;">Start</button>
           </div>
           <div class="clear"></div>
         </form>
       </div>
       </div>
     </div>
   </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
 </body>

