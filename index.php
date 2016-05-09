<?php
ob_start();
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
          <li><a href="index.php">Home</a></li>
          <li><a href="https://github.com/ahmedsafadii/YouCanDoIt/blob/master/README.md">How it works ?</a></li>
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
        <?php
        if(isset($_POST['send_data'])){


          $nochmapion = true;
          $noenoughmatch = false;
          $summonername = iconv(mb_detect_encoding($_POST['summonername'], mb_detect_order(), true), "UTF-8", $_POST['summonername']);
          $summonerregion = $_POST['summonerregion'];


          switch ($summonerregion) {
              case "na":
                  $re = "na1";
                  $_SESSION['rank'] = "North America";
                  break;
              case "euw":
                  $re = "euw1";
                  $_SESSION['rank'] = "Europe West";
                  break;
              case "eune":
                  $re = "eun1";
                  $_SESSION['rank'] = "Europe Nordic & East";
                  break;
              case "br":
                  $re = "br1";
                  $_SESSION['rank'] = "Brazil";
                  break;
              case "tr":
                  $re = "tr1";
                  $_SESSION['rank'] = "Turkey";
                  break;
              case "ru":
                  $re = "ru";
                  $_SESSION['rank'] = "Russia";
                  break;
              case "lan":
                  $re = "la1";
                  $_SESSION['rank'] = "Latin America North";
                  break;
              case "las":
                  $re = "la2";
                  $_SESSION['rank'] = "Latin America South";
                  break;
              case "oce":
                  $re = "oc1";
                  $_SESSION['rank'] = "Oceania";
                  break;
              case "kr":
                  $re = "ru";
                  $_SESSION['rank'] = "Russia";
                  break;
              case "jp":
                  $re = "jp1";
                  $_SESSION['rank'] = "Japan";
                  break;
          }


          $summonerchampion = $_POST['summonerchampion'];
          $expertplayer = $_POST['expertplayer'];
          $selectedLanguage = $_POST['language'];

          //   //$id = base64_decode($expertplayer);

          // if(is_numeric($expertplayer)){
          //   // check if this expert registerd with the database
          // }


          // check if the summoner is exisist or not ?
          $response = @file_get_contents('https://'.$summonerregion.'.api.pvp.net/api/lol/'.$summonerregion.'/v1.4/summoner/by-name/'.rawurlencode($summonername).'?api_key=b246e73f-6f17-4eb2-ad8d-6e4292a02875');
          if($response === FALSE) { 
            echo "<div class=\"alert alert-danger\">Summoner not found on server $summonerregion.</div>";
          }
          else{
            $responseData = json_decode($response, TRUE);
            foreach($responseData as $key => $value){
              $summonerid = $value["id"];
              $selectedStatusx = $con->query("SELECT * FROM `statusPlayer` WHERE `player_id` = '$summonerid' and `champion_id` = '$summonerchampion' and `region_id` = '$summonerregion'");
              $rowS = $selectedStatusx->fetch_assoc();
              if ($rowS > 0){
                $newornot = true;
              }              $selectedStatus = $con->query("SELECT * FROM `searchedPlayer` WHERE `player_id` = '$summonerid' and `champion_id` = '$summonerchampion' and `region_id` = '$summonerregion'");
              $rowST = $selectedStatus->fetch_assoc();
              if ($rowST > 0){
                $newornot = true;
              }
              $_SESSION['name'] = $value["name"];
              $_SESSION['profileIconId'] = $value["profileIconId"];
            }
            $response = file_get_contents('https://'.$summonerregion.'.api.pvp.net/api/lol/'.$summonerregion.'/v2.5/league/by-summoner/'.$summonerid.'?api_key=b246e73f-6f17-4eb2-ad8d-6e4292a02875');
            if($response === FALSE) { 
              echo "<div class=\"alert alert-danger\">This Summoner is unranked.</div>";
            }
            else{
              $response = file_get_contents('https://'.$summonerregion.'.api.pvp.net/api/lol/'.$summonerregion.'/v1.3/stats/by-summoner/'.$summonerid.'/ranked?season=SEASON2016&api_key=b246e73f-6f17-4eb2-ad8d-6e4292a02875');
              $responseData = json_decode($response, TRUE);
              foreach($responseData['champions'] as $key => $value){
                if ($value['id'] == $summonerchampion){
                  $nochmapion = false;
                  if($value['stats']['totalSessionsPlayed'] > 10){
                    $responsesChampionMaystry = json_decode(file_get_contents('https://'.$summonerregion.'.api.pvp.net/championmastery/location/'.$re.'/player/'.$summonerid.'/champions?api_key=b246e73f-6f17-4eb2-ad8d-6e4292a02875'), TRUE);
                    $responsesPlayerStatus = json_decode(file_get_contents('https://'.$summonerregion.'.api.pvp.net/api/lol/'.$summonerregion.'/v1.3/stats/by-summoner/'.$summonerid.'/ranked?season=SEASON2016&api_key=b246e73f-6f17-4eb2-ad8d-6e4292a02875'), TRUE);
                    foreach($responsesChampionMaystry as $key => $value){
                      if ($value['championId'] == $summonerchampion){
                        if (isset($value['highestGrade'])){
                            $ashivegrade = $value['highestGrade'];
                        }
                        else{
                            $ashivegrade = "";                        
                        }
                       $rank = intval($key + 1);
                       if($newornot){
                       $queryit = $con->query("UPDATE `searchedPlayer` SET `player_id`='$summonerid',`champion_id`='$summonerchampion',`region_id`='$summonerregion',`expert_id`='$expertplayer',`champion_grade`='$ashivegrade',`champion_points`='{$value['championPoints']}',`champion_box`='{$value['chestGranted']}',`champion_level`='{$value['championLevel']}',`champion_rank`='$rank',`champion_last_played`='{$value['lastPlayTime']}' WHERE id = '{$rowST['id']}'");
                       }
                       else{
                       $queryit = $con->query("INSERT INTO `searchedPlayer`(`player_id`, `champion_id`, `region_id`, `expert_id`, `champion_grade`, `champion_points`, `champion_box`, `champion_level`, `champion_rank`, `champion_last_played`) VALUES ('$summonerid','$summonerchampion','$summonerregion','$expertplayer','$ashivegrade','{$value['championPoints']}','{$value['chestGranted']}','{$value['championLevel']}','$rank','{$value['lastPlayTime']}')");
                        }
                      }
                    }
                    foreach ($responsesPlayerStatus['champions'] as $key => $value) {
                      if ($value['id'] == $summonerchampion){
                        if($newornot){

                     $queryit2 = $con->query("UPDATE `statusPlayer` SET `match_played`='{$value['stats']['totalSessionsPlayed']}',`match_win`='{$value['stats']['totalSessionsWon']}',`match_lose`='{$value['stats']['totalSessionsLost']}',`match_kills`='{$value['stats']['totalChampionKills']}',`match_farms`='{$value['stats']['totalMinionKills']}',`match_death`='{$value['stats']['totalDeathsPerSession']}',`match_gold`='{$value['stats']['totalGoldEarned']}',`match_assist`='{$value['stats']['totalAssists']}',`match_turret`='{$value['stats']['totalTurretsKilled']}',`match_pkill`='{$value['stats']['totalPentaKills']}',`match_qkill`='{$value['stats']['totalQuadraKills']}',`match_tkill`='{$value['stats']['totalTripleKills']}',`match_dkill`='{$value['stats']['totalDoubleKills']}' WHERE id = '{$rowS['id']}'");

                     }
                     else{
                      $queryit2 = $con->query("INSERT INTO `statusPlayer`(`player_id`, `champion_id`, `region_id`,`match_played`, `match_win`, `match_lose`, `match_kills`, `match_farms`, `match_death`, `match_gold`, `match_assist`, `match_turret`, `match_pkill`, `match_qkill`, `match_tkill`, `match_dkill`) VALUES ('$summonerid','$summonerchampion','$summonerregion','{$value['stats']['totalSessionsPlayed']}','{$value['stats']['totalSessionsWon']}','{$value['stats']['totalSessionsLost']}','{$value['stats']['totalChampionKills']}','{$value['stats']['totalMinionKills']}','{$value['stats']['totalDeathsPerSession']}','{$value['stats']['totalGoldEarned']}','{$value['stats']['totalAssists']}','{$value['stats']['totalTurretsKilled']}','{$value['stats']['totalPentaKills']}','{$value['stats']['totalQuadraKills']}','{$value['stats']['totalTripleKills']}','{$value['stats']['totalDoubleKills']}')");
                     }
                     }
                     }
                     $_SESSION['expert'] = $expertplayer;
                     $_SESSION['player'] = $summonerid;
                     $_SESSION['champion'] = $summonerchampion;
                     $_SESSION['region'] = $summonerregion;
                     header('Location: show.php?step='.$_SESSION['step1']);
                  }
                  else{
                    $noenoughmatch = true;
                  }
                }
              }
              if ($nochmapion){
                echo "<div class=\"alert alert-danger\">The summoner hasn't play with this champion in ranked games.</div>";         
              }
              else if($noenoughmatch){
                echo "<div class=\"alert alert-danger\">The summoner must have played more than 10 ranked games with this champion.</div>";         
              }
            }
          }
        }
        ?>
        <div class="boxSelect" id="mydiv">
          <form action="index.php" method="post">
            <div class="form-group" style="float:left;width:340px;padding-right:10px;">
              <input type="text" name="summonername" placeholder="Enter Summoner Name..." class="form-control" id="usr">
            </div>    
            <div class="form-group" style="float:left;">
              <select title="Select Region" name="summonerregion" data-live-search="true" data-size="5" data-width="200px" class="selectpicker">
                <option class="bs-title-option" value="">Select Region</option>
                <option label="re-na" value="na" data-content="<img class='img-circle' src='img/regions/s6.png' width='20' height='20' alt='North America Region' /> North America"></option> 
                <option label="re-euw" value="euw" data-content="<img class='img-circle' src='img/regions/s2.png' width='20' height='20' alt='Europe West Region' /> Europe West"></option> 
                <option label="re-eune" value="eune" data-content="<img class='img-circle' src='img/regions/s3.png' width='20' height='20' alt='Europe Nordic & East Region' /> Europe Nordic & East"></option> 
                <option label="re-kr" value="kr" data-content="<img class='img-circle' src='img/regions/s5.png' width='20' height='20' alt='Korea Region' /> Korea"></option> 
                <option label="re-oce" value="oce" data-content="<img class='img-circle' src='img/regions/s9.png' width='20' height='20' alt='Oceania Region' /> Oceania"></option> 
                <option label="re-jp" value="jp" data-content="<img class='img-circle' src='img/regions/s4.png' width='20' height='20' alt='Japan Region' /> Japan"></option> 
                <option label="re-br" value="br" data-content="<img class='img-circle' src='img/regions/s1.png' width='20' height='20' alt='Brazil Region' /> Brazil"></option> 
                <option label="re-las" value="las" data-content="<img class='img-circle' src='img/regions/s7.png' width='20' height='20' alt='Latin America South Region' /> Latin America South"></option> 
                <option label="re-lan" value="lan" data-content="<img class='img-circle' src='img/regions/s8.png' width='20' height='20' alt='Latin America North Region' /> Latin America North"></option> 
                <option label="re-ru" value="ru" data-content="<img class='img-circle' src='img/regions/s10.png' width='20' height='20' alt='Russia Region' /> Russia"></option> 
                <option label="re-tr" value="tr" data-content="<img class='img-circle' src='img/regions/s11.png' width='20' height='20' alt='Turkey Region' /> Turkey"></option> 
              </select>
            </div>
            <div class="clear"></div>
            <div class="form-group" style="float:left;">
              <select title="Select Champion" name="summonerchampion" data-live-search="true" data-size="5" data-width="540px" class="selectpicker">
                <option class="bs-title-option" value="">Select Champion</option>
                <?php
                $selectchampions = $con->query("SELECT * FROM `champions`");
                foreach ($selectchampions as $key => $value){
                  ?>
                  <option label="<?php echo $value["champion_id"]; ?>" value="<?php echo $value["champion_id"]; ?>" data-content="<img class='img-circle' src='img/champion/<?php echo $value["champion_name"]; ?>.png' width='20' height='20' alt='<?php echo $value["champion_name"]; ?>' /> <?php echo $value["champion_name"]; ?>"></option> 
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="clear"></div>
            <div class="form-group" style="float:left;padding-right:10px;">
              <select title="Select Expert Player" name="expertplayer" data-live-search="true" data-size="5" data-width="330px" class="selectpicker">
                <option class="bs-title-option" value="">Select Expert Player</option>
                <?php
                $selectexperts = $con->query("SELECT * FROM `experts`");
                foreach ($selectexperts as $key => $value){
                  ?>
                  <option label="<?php echo $value["expert_name"]; ?>" value="<?php echo $value["expert_id"]; ?>" data-content="<img class='img-circle' src='img/profileimage/<?php echo $value["expert_image"]; ?>.png' width='20' height='20' alt='<?php echo $value["expert_name"]; ?> ' /> <?php echo $value["expert_name"]; ?>"></option> 
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group" style="float:left;">
              <select title="Select Language" name="language" data-live-search="true" data-size="5" data-width="200px" class="selectpicker">
                <option class="bs-title-option" value="">Select Language</option>
                <option label="la-en" value="en" data-content="<img class='img-circle' src='img/lang/r-3.png' width='20' height='20' alt='English Language' /> English"></option> 
                <option disabled label="la-ar" value="ar" data-content="<img class='img-circle' src='img/lang/r-1.png' width='20' height='20' alt='Arabic Language' /> Arabic"></option> 
                <option disabled label="la-sp" value="sp" data-content="<img class='img-circle' src='img/lang/r-2.png' width='20' height='20' alt='Spain Language' /> Spain"></option> 
                <option disabled label="la-fr" value="fr" data-content="<img class='img-circle' src='img/lang/r-7.png' width='20' height='20' alt='France Language' /> France"></option> 
                <option disabled label="la-ch" value="ch" data-content="<img class='img-circle' src='img/lang/r-4.png' width='20' height='20' alt='China Language' /> China"></option> 
                <option disabled label="la-ru" value="ru" data-content="<img class='img-circle' src='img/lang/r-5.png' width='20' height='20' alt='Russia Language' /> Russia"></option> 
              </select>
            </div>
            <?php echo $noob; ?>
            <div class="form-group" style="float:left;">
              <button type="submit" id="loadPagenew" class="btn btn-primary" name="send_data" style="width:540px;">Start</button>
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
