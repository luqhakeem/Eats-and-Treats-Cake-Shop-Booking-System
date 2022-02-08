<?php
	include 'cake.php';
	$sql = "SELECT * FROM cakeproduct WHERE cakeID='" . $_GET["cakeID"] . "'"; // Fetch data from the table customers using id
	$result=mysqli_query($con,$sql);
	$customer = mysqli_fetch_assoc($result);
?>
