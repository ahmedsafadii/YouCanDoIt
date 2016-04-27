<?php
require('../connection.php');


$insertquery = $con->query("SELECT * FROM `champions`");

var_dump($insertquery);

?>