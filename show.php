<?php
session_start();
require('connection.php');
$aggr = 0;
$save = 0;
$noob = 0;
if (isset($_SESSION['expert'])){
  if ($_GET['step'] == $_SESSION['step1']){
  $expertid = $_SESSION['expert'];
  $selectchampions = $con->query("SELECT * FROM `experts` WHERE `expert_id` = $expertid");
  $row = $selectchampions->fetch_assoc();
  }
  else if ($_GET['step'] == $_SESSION['step2']){
  $playerid = $_SESSION['player'];
  $championid = $_SESSION['champion'];
  $region = $_SESSION['region'];
  $selectedplayer = $con->query("SELECT * FROM `searchedPlayer` WHERE `player_id` = '$playerid' and `champion_id` = '$championid' and `region_id` = '$region'");
  $rowS = $selectedplayer->fetch_assoc();
  $selectedStatus = $con->query("SELECT * FROM `statusPlayer` WHERE `player_id` = '$playerid' and `champion_id` = '$championid' and `region_id` = '$region'");
  $rowST = $selectedStatus->fetch_assoc();
  $file = file_get_contents('generetor/champion.json');
  $generate = json_decode($file,true);
  }
  else if ($_GET['step'] == $_SESSION['step3']){

  $playerid = $_SESSION['player'];
  $championid = $_SESSION['champion'];
  $region = $_SESSION['region'];
  $selectedplayer = $con->query("SELECT * FROM `searchedPlayer` WHERE `player_id` = '$playerid' and `champion_id` = '$championid' and `region_id` = '$region'");
  $rowS = $selectedplayer->fetch_assoc();
  $selectedStatus = $con->query("SELECT * FROM `statusPlayer` WHERE `player_id` = '$playerid' and `champion_id` = '$championid' and `region_id` = '$region'");
  $rowST = $selectedStatus->fetch_assoc();
  $file = file_get_contents('generetor/champion.json');
  $generate = json_decode($file,true);
  }
  else{
  header('Location: show.php?step='.$_SESSION['current']);
  }
}
else{
  session_destroy();
  header('Location: index.php');
}

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}
function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}



function grade_calculate($grade){

  global $aggr;
  global $save;
  global $noob;


  if ($grade > 0 && $grade < 10){
    $noob = $noob + 30;
    return "Boosted";
  }
  else if ($grade > 10 && $grade < 35){
    $noob = $noob + 30;
    return "Very Bad";
  }
  else if ($grade > 35 && $grade < 50){
    $save = $save + 30;
    return "Bad";
  }    
  else if ($grade > 51 && $grade < 60){
    $save = $save + 30;
    return "Very Good";
  }
  else if ($grade > 60 && $grade < 80){
    $aggr = $aggr + 30;
    return "Excellent";
  }
  else{
    $aggr = $aggr + 30;
    return "Perfect";
  }
}

function kda_calculate($kda){

    global $aggr;
  global $save;
  global $noob;

  if ($kda >= 3){
        $aggr = $aggr + 30;

    return "Perfect";
  }
  else if ($kda >= 2){
        $save = $save + 30;

    return "Normal";
  }
  else {
        $noob = $noob + 30;

    return "Bad";
  }

}

function farms_calculate($farm){

  global $aggr;
  global $save;
  global $noob;


  if ($farm >= 180){
    $aggr = $aggr + 5;
    return "Perfect";
  }
  else if ($farm > 100 && $farm < 179){
    $aggr = $aggr + 5;
    return "Normal";
  }
  else if ($farm < 100){
    $aggr = $aggr + 5;
    return "Pretty Bad";
  }

}

function gold_calcualte($gold){

    global $aggr;
  global $save;
  global $noob;

  if ($gold >= 10000){
    $aggr = $aggr + 5;
    return "Perfect";
  }
  else if ($gold < 10000 && $gold > 8000){
    $save = $save + 5;
    return "Normal";
  }
  else if ($gold < 8000){
    $noob = $noob + 5;
    return "Pretty Bad";
  }


}


function tower_calcualte($tower){


  global $aggr;
  global $save;
  global $noob;



  if ($tower >= 1.0){
    $aggr = $aggr + 5;
    return "Perfect";
  }
  else if ($tower > 1.0 && $tower > 0.5){
    $save = $save + 5;
    return "Normal";
  }
  else if ($tower < 0.5){
    $noob = $noob + 5;
    return "Pretty Bad";
  }


}

function custom_number_format($number, $precision = 3, $divisors = null) {

    // Setup default $divisors if not provided
    if (!isset($divisors)) {
        $divisors = array(
            pow(1000, 0) => '', // 1000^0 == 1
            pow(1000, 1) => 'K', // Thousand
            pow(1000, 2) => 'M', // Million
            pow(1000, 3) => 'B', // Billion
            pow(1000, 4) => 'T', // Trillion
            pow(1000, 5) => 'Qa', // Quadrillion
            pow(1000, 6) => 'Qi', // Quintillion
        );    
    }

    // Loop through each $divisor and find the
    // lowest amount that matches
    foreach ($divisors as $divisor => $shorthand) {
        if ($number < ($divisor * 1000)) {
            // We found a match!
            break;
        }
    }

    // We found our match, or there were no matches.
    // Either way, use the last defined value for $divisor.
    return number_format($number / $divisor) . $shorthand;
}


function rank_calcualte($rank){

  global $aggr;
  global $save;
  global $noob;
  $killequal;

  if ($rank > 6){
    $noob = $noob + 25;
  }
  else if ($rank > 3 && $rank < 6){
    $killequal = 1;
    $save = $save + 25 + $killequal;
  }
  else{
    $killequal = 2;
    $aggr = $aggr + 25+ $killequal;
  }

  $typeofrank = array("Aggressive"=>$aggr,"Balanced"=>$save,"Beginner"=>$noob);



  $key = array_search(max($typeofrank), $typeofrank);

  return $key;
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
    <?php
              foreach ($generate["data"] as $key => $val){
           if ($championid == $val["key"]){
            $chmapionname =  $val["id"];
          }
        }

        ?>
    <div class="row">
      <div class="selectBox">
       <div class="boxSelect2" id="mydiv">
         <div class="chmapionbh" style="background-image: url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $chmapionname; ?>_0.jpg');">
           <div class="summonerPhoto"><img style="border-radius:5px;" src="img/profileicon/<?php echo $_SESSION['profileIconId']; ?>.png" alt="" width="85" height="85" /></div>
           <div class="summonerName"><?php echo $_SESSION['name']; ?></div>
           <div class="summonerserver"><?php echo $_SESSION['rank']; ?></div>
           <img style="border-radius:5px;position:position;" src="img/bgeffect.png" width="580" height="115" />
         </div>
         <div class="clear"></div>
         <?php
         if ($_GET['step'] == $_SESSION['step3']){
         ?>
         <div class="bannar" style="background-image: url('../img/exportme.png'),url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $chmapionname; ?>_0.jpg'">
            <div class="ranknumber">1</div>
            <div class="summonername">test</div>
            <div class="summonerserver">test</div>
            <div class="sumoonerpoints">test</div>
            <div class="summonertypejugne">test</div>
            <div class="summonertypejugnenumber">test</div>
            <div class="championlevel">12</div>
            <div class="championgrade">A+</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
            <div class="playedmatch">21</div>
         </div>
         <?php } ?>  

         <?php 
         if ($_GET['step'] == $_SESSION['step1']){
          ?>
          <div class="typeWidth">
         <span id="typed" class="stringstyles"></span>
         <div id="typed-strings">
        <p>Welcome to <span style="color:#aa0000">You Can Do It App </span> - The Summoner Champion Analytic ... <br /><br />My name's <span style="color: #317daf;"><?php echo $row['expert_name']; ?></span>, I live in <span style="color: #317daf;"><?php echo $row['expert_country']; ?> </span> , I play league of legends game for  <span style="color: #317daf;"><?php echo $row['expert_years']; ?> Seasons </span> , I play in <span style="color: #317daf;"><?php echo $row['expert_server']; ?> </span> Region with summoner account <span style="color: #317daf;"><?php echo $row['expert_summoner']; ?> </span> My Current Rank in game is <span style="color: #317daf;"><?php echo $row['expert_rank']; ?> </span> and my rank was in last season  <span style="color: #317daf;"><?php echo $row['expert_lastseason']; ?> </span> , I Prefer to play as <span style="color: #317daf;"><?php echo $row['expert_lane']; ?> </span> , My main champion is <span style="color: #317daf;"><?php echo $row['expert_champion']; ?> </span> .... <br /><br /><br /><span style="font-size:25px;">Today</span>, I will be your trainer and i hope you can use my tips wisely ... <br />please don't forget to rate me at the end of Analytic.... <br /><br /><br /> Good Luck.</p>
                 </div>
        <span id="typed"></span>
         <?php }
         else if ($_GET['step'] == $_SESSION['step2']){
        $winrate = intval(($rowST['match_win'] / $rowST['match_played']) * 100);
        $killpermatch = intval(($rowST['match_kills'] + $rowST['match_assist'] ) / $rowST['match_death']);
        $kdamatch = intval($rowST['match_kills']/$rowST['match_played']).":".intval($rowST['match_death']/$rowST['match_played']).":".intval($rowST['match_assist']/$rowST['match_played']);
        $farms = intval($rowST['match_farms'] / $rowST['match_played']);
        $golds = intval($rowST['match_gold'] / $rowST['match_played']);
        $tower = round($rowST['match_turret']/$rowST['match_played'], 2);
         ?>
                  <div class="typeWidth">
         <span id="typed" class="stringstyles"></span>
         <div id="typed-strings">
        <p>Let's talk about <span style="color: #317daf;"><?php echo $chmapionname; ?></span> statistics. The rank of this champion is the <span style="color: #317daf;"><?php echo ordinal($rowS['champion_rank']); ?></span> and he has reached the <span style="color: #317daf;"><?php  echo ordinal($rowS['champion_level']); ?></span> level, <?php if ($rowS['champion_grade'] == ""){ echo "he didn't achieved highest grade"; }else{echo "his highest grade is";} ?> <span style="color: #317daf;"><?php echo $rowS['champion_grade']; ?></span> , last time he played with <span style="color: #317daf;"><?php echo $chmapionname; ?></span> was <span style="color: #317daf;"><?php echo time_elapsed_string(substr($rowS['champion_last_played'], 0, -3)); ?></span>. <br /><br />
        


        Statistics shows that he played <span style="color: #317daf;"><?php echo $rowST['match_played']; ?></span>  
        matches with <span style="color: #317daf;"><?php echo $chmapionname; ?></span>  with 
        <span style="color: #317daf;"><?php echo $winrate; ?>%</span>  average win rate which is 
        <span style="color: #317daf;"><?php echo grade_calculate($winrate); ?></span> he achieved 
        <span style="color: #317daf;"><?php echo $kdamatch; ?></span> KDA which is <span style="color: #317daf;"><?php echo $killpermatch; ?></span> kill per match which is
        <span style="color: #317daf;"><?php echo kda_calculate($killpermatch); ?></span> average for <span style="color: #317daf;"><?php echo $rowST['match_played'] ?></span> matches,
         He achieved the average of <span style="color: #317daf;"><?php echo $farms; ?></span> CS per game which is 
        <span style="color: #317daf;"><?php echo farms_calculate($farms); ?></span>. <br /><br />
        
        

        Concerning the gold, he earns <span style="color: #317daf;"><?php echo custom_number_format($golds); ?>
        </span> average  gold per match which is a <span style="color: #317daf;"><?php echo gold_calcualte($golds); ?></span>
         average,and for the turrets he destroyed  <span style="color: #317daf;"><?php echo $tower; ?></span> tower per game which is 
          <span style="color: #317daf;"><?php echo tower_calcualte($tower); ?></span>.
        <br />
        <br />


        My conclusion of <span style="color: #317daf;"><?php echo $_SESSION['name']; ?></span> Skills with 
         <span style="color: #317daf;"><?php echo $chmapionname; ?></span> is closer to be  <br /><br />
        



        <span style="font-size: 40px; color: #aa0000; margin-left: 28%;"><?php echo rank_calcualte($rowS['champion_rank']); ?></span><br /><br />

        This is my opinion as an expert player , but just remember that the numbers doesn't prove a thing.
        </p>
                </div>
        <span id="typed"></span>
         <?php }
         ?>  

         <?php 
         if ($_GET['step'] == $_SESSION['step1']){
          ?>
         <div class="buttonNext" style="display:hidden;" id="btnContinue"><a href="show.php?step=<?php echo $_SESSION['step2']; ?>"> Next </a></div>
         <?php }
         else if ($_GET['step'] == $_SESSION['step2']){
         ?>
         <div class="buttonNext" style="display:hidden;" id="btnContinue"><a href="show.php?step=<?php echo $_SESSION['step3']; ?>"> Next </a></div>
         <?php 
       }
       ?>


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
    window.nextstep = '<?= $_GET['step']; ?>'; // That's for a string
    var currentstep;
    currentstep = '<?= $_SESSION['current']; ?>';
  if (nextstep.toString() == currentstep){
  $(document).ready(function() {
    var simplebar = new Nanobar();
    simplebar.go(35);
  });
}
else if (nextstep.toString() == currentstep){
  $(document).ready(function() {
    var simplebar = new Nanobar();
    simplebar.go(70);
  });
}
else if (nextstep.toString() == currentstep){
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
      typeSpeed: 1 // 50
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
var searchValue2 = "prove";
$("#typed").each(function(){
  if($(this).html().indexOf(searchValue) > -1){
     showButton();
     clearInterval(myVar);  
  }
});
$("#typed").each(function(){
  if($(this).html().indexOf(searchValue2) > -1){
     showButton();
     clearInterval(myVar);
  }
});
}




    </script>


</body>


