<?php
require('../connection.php');


$file = file_get_contents('champion.json');

$generate = json_decode($file,true);

$id = 1;



?>