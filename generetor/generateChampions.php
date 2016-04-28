<?php
require('../connection.php');


$file = file_get_contents('champion.json');

$generate = json_decode($file,true);



foreach ($generate["data"] as $key => $val){
	$champname = $val["key"];
	$champid = $val["id"];
	$champtitle = $val["title"];
	$insertquery = $con->query("INSERT INTO champions (champion_id,champion_name,champion_title) VALUES ($champname,'$champid','$champtitle')");
	var_dump($insertquery);
}

?>