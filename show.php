<?php
session_start();
require('connection.php');
if (isset($_SESSION['expert'])){
  if ($_GET['step'] == 1){
  $expertid = $_SESSION['expert'];
  $selectchampions = $con->query("SELECT * FROM `experts` WHERE `expert_id` = $expertid;");
  $row = $selectchampions->fetch_assoc();
  }
  else if ($_GET['step'] == 2){

  }
  else if ($_GET['step'] == 3){

  }
  else{
  session_destroy();
  header('Location: index.php');
  }
}
else{
  session_destroy();
  header('Location: index.php');
}

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
       <div class="boxSelect2" id="mydiv">
         <div class="chmapionbh">
           <div class="summonerPhoto"><img style="border-radius:5px;" src="img/profileicon/1000.png" alt="" width="85" height="85" /></div>
           <div class="summonerName">Skt t1 feed3r - <span class="summonerrank"> GOLD IV</span></div>
           <div class="summonerserver">North America</div>
           <img style="border-radius:5px;position:position;" src="img/bgeffect.png" width="580" height="115" />
         </div>
         <div class="clear"></div>
         <div class="typeWidth">
         <span id="typed" class="stringstyles"></span>
         <div id="typed-strings">
          <p>Welcome to <span style="color:red;">You Can Do It App </span> - The Summoner Champion Analytic ... <br /><br />My name's <span style="color:red;"><?php echo $row['expert_name']; ?></span>, I live in <span style="color:red;"><?php echo $row['expert_country']; ?> </span> , I play league of legends game for  <span style="color:red;"><?php echo $row['expert_years']; ?> Seasons </span> , I play in <span style="color:red;"><?php echo $row['expert_server']; ?> </span> Region with summoner account <span style="color:red;"><?php echo $row['expert_summoner']; ?> </span> My Current Rank in game is <span style="color:red;"><?php echo $row['expert_rank']; ?> </span> and my rank was in last season  <span style="color:red;"><?php echo $row['expert_lastseason']; ?> </span> , I Prefer to play as <span style="color:red;"><?php echo $row['expert_lane']; ?> </span> , My main champion is <span style="color:red;"><?php echo $row['expert_champion']; ?> </span> .... <br /><br /><br /><span style="font-size:25px;">Today</span>, I will be your trainer and i hope you can use my tips wisely ... <br />please don't forget to rate me at the end of Analytic.... <br /><br /><br /> Good Luck.</p>
        </div>
        <span id="typed"></span>

         
         <div class="buttonNext" style="display:hidden;" id="btnContinue"><a href="show.php?step=2"> Next </a></div>


  </div>
  <div class="clear"></div>
      </div>
    </div>
  </div>
</div>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="js/typed.js" type="text/javascript"></script>

<script src="js/loadPage/nanobar.js"></script>
<script>
    var nextstep;
    window.nextstep = '<?=$_GET['step']?>'; // That's for a string
  if (nextstep.toString() == "1"){
  $(document).ready(function() {
    var simplebar = new Nanobar();
    simplebar.go(35);
  });
}
else if (nextstep.toString() == "2"){
  $(document).ready(function() {
    var simplebar = new Nanobar();
    simplebar.go(70);
  });
}
else if (nextstep.toString() == "3"){
  $(document).ready(function() {
    var simplebar = new Nanobar();
    simplebar.go(100);
  });
}
</script>
</script>

<script>
  $(function(){
    $("#typed").typed({
      stringsElement: $('#typed-strings'),
      typeSpeed: 50
    });
  });
</script>


<script type="text/javascript">

        function showButton()
        {
            document.getElementById("btnContinue").style.visibility = "visible";
        }

        function hideButton()
        {
            document.getElementById("btnContinue").style.visibility = "hidden";
        }
        hideButton();


var myVar = setInterval(didfound, 1000);

function didfound() {
var searchValue = "Luck";
$("#typed").each(function(){
  if($(this).html().indexOf(searchValue) > -1){
     showButton();
     clearInterval(myVar);
  }
});
}




    </script>


</body>


