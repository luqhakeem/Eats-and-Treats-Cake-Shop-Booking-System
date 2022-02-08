<?php

	$dbhost = "localhost:3307";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "eats_treats_cake";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if(!$con){
		die ("<script>alert('Connection failed!')<script/>");
	}

?>
