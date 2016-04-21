<?php 
require '../db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
	
	$id = isset($_POST["id"]) ? $_POST["id"] : null;
	$title = isset($_POST["title"]) ? $_POST["title"] : null;
	$parent = isset($_POST["parent"]) ? $_POST["parent"] : 1;
	$description = isset($_POST["description"]) ? $_POST["description"] : null;

	if( isset($_GET['action']) && $_GET['action'] == "update"){
		$sql = "UPDATE  `categories` SET  `name` = '".$conn->real_escape_string($title)."', `description` =  '" . $conn->real_escape_string($description) . "', `parent`= ".$parent." WHERE  `categories`.`category_id` =".$id;
		// var_dump($sql);
		// die();
		$result = $conn->query($sql);
		header("Location: ../categories.php?message=categoryEdited");
		
	}else{

		$sql = "INSERT INTO `categories` (`category_id`, `name`, `parent`, `description`, `position`) VALUES (NULL, '".$conn->real_escape_string($title)."', '". $conn->real_escape_string($parent) ."', '" . $conn->real_escape_string($description) . "', '0');";
		
		$result = $conn->query($sql);

		header("Location: ../categories.php?message=categoryCreated");

	}
}
else{

	echo "Direct access is not allowed!";
}

die();


?>
