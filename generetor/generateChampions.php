<?php
 require('../connection.php');
  
  
 $file = file_get_contents('champion.json');
  
 $generate = json_decode($file,true);

 foreach ($generate["data"] as $key => $val){
	$champname = $val["id"];
 	$champid = $val["key"];
	$champtitle = $con->real_escape_string($val["title"]);
 	$insertquery = $con->query("INSERT INTO champions (champion_id,champion_name,champion_title) VALUES ('$champid','$champname','$champtitle')");
	var_dump("INSERT INTO champions (champion_id,champion_name,champion_title) VALUES ('$champid','$champname','$champtitle')");
 }
  
  ?>
