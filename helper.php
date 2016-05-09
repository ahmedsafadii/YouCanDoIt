<?php

function clearText($string){
	$string = base64_decode($string);
	$string = trim($string);
	$string = htmlspecialchars($string);
	$string = str_replace("'", "\'", $string);
	$string = str_replace('"', "\'", $string);
	return $string;
}