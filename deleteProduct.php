<?php

    include 'phpconfig/cake.php';

    $sql = "DELETE FROM cakeproduct where cakeID='".$_GET["cakeID"]."'";
    $delete = mysqli_query($con, $sql);

    if($delete) {
        echo "<script>alert('Product deleted successfully.')</script>";
        header("Location: adminHome.php");
    } else {
        echo "<script>alert('Failed to delete product.')</script>";
        header("Location: adminHome.php");
    }

    ?>
