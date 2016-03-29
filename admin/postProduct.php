<?php 
require 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
	
	$id = isset($_POST["id"]) ? $_POST["id"] : null;
	$title = isset($_POST["title"]) ? $_POST["title"] : null;
	if(isset($_POST["photolink"]) && trim($_POST["photolink"])!="" ){
		$photolink = $_POST["photolink"];
	}else{
		$photolink = 'images/books/book-cover-not-available.gif';
	};
	
	$description = isset($_POST["description"]) ? $_POST["description"] : null;
	$price = isset($_POST["price"]) ? $_POST["price"] : null;
	$discountprice = isset($_POST["discountprice"]) ? $_POST["discountprice"] : null;
	$quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : null;

	if( isset($_GET['action']) && $_GET['action'] == "update"){
		$sql = "UPDATE `products` SET `title` = '".$title."',`photo_url` = '".$photolink."',  `description` = '".$description."', `price` = '".$price."', `discount_price` = '".$discountprice."', `quantity` = '".$quantity."' WHERE `products`.`product_id` = ".$id;
		$result = $conn->query($sql);
		
		header("Location: ./index.php?message=productEdited");
		
	}else{

		$sql = "INSERT INTO products (product_id, category_id, title, photo_url, description, price, discount_price, status, quantity) 
		VALUES (NULL, 1,'".$title."','".$photolink."','".$description."',".$price.",".$discountprice.", 1,".$quantity.")";
		
		$result = $conn->query($sql);

		header("Location: ./index.php?message=productCreated");

	}
}
else{

	echo "Direct access is not allowed!";
}

die();


?>
