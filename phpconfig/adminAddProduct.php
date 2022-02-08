<?php

	include 'phpconfig/cake.php';

    session_start();

    error_reporting(0);

	if (isset($_POST['save'])) {
		$cakeID = $_POST['cakeID'];
		$cakeName = $_POST['cakeName'];
		$cakeDetails = $_POST['cakeDetails'];
		$cakePrice = $_POST['cakePrice'];
		$cakePicture = $_POST['cakePicture'];

		//MySQL query that look up for cake ID that similar that have been entered in the form
        $sql = "SELECT * FROM cake WHERE cakeID = '$cakeID'";
        $result = mysqli_query($con, $sql);

        if (!$result->num_rows > 0){            
            $query = "INSERT INTO cake (cakeID, cakeName, cakeDetails, cakePrice, cakePicture) 
                  VALUES ('$cakeID', '$cakeName', '$cakeDetails', '$cakePrice', '$cakePicture')";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Product added.')</script>";
                header("Location: adminHome.php");
            } else {
                echo "<script>alert('Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Product already exists.')</script>";
        }
	}

?>