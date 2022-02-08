<?php
	
	session_start();
	unset($_SESSION["shopping_cart"]);
	echo '<script type="text/javascript">
	location.replace("index.php"); </script>';
?>
