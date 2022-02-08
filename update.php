<?php

  if(count($_POST)>0){

    include 'cake.php';

    $sql = "UPDATE cakeProduct SET cakeName='" . $_POST['cakeName'] . "', cakeDesc='" . $_POST['cakeDesc'] . "', cakeDetail='" . $_POST['cakeDetail'] . "', cakePrice='" . $_POST['cakePrice'] . "', WHERE cakeID='" . $_POST['cakeID'] . "'"; // update form data from the database
    $result=mysqli_query($con,$sql);
    echo "Product updated successfully.";
  } else {
    echo "Failed to update product.";
    } 
?>