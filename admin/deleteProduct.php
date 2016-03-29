<?php 
require 'db.php';

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	
	$sql = "DELETE FROM `products` WHERE `products`.`product_id` = ".$id;

	$result = $conn->query($sql);
}

header("Location: ./index.php?message=productDeleted");
die();


?>
