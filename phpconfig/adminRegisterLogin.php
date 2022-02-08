<?php

	$dbhost = "localhost:3307";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "eats_treats_cake";

	if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
		die ("<script>alert('Connection failed!')<script/>");
	}

?>
