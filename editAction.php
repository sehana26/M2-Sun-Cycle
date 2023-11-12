<?php
// Include the database connection file
require_once("productdb.php");

if (isset($_POST['update'])) { 
	// Escape special characters in a string for use in an SQL statement
	$number = mysqli_real_escape_string($mysqli, $_POST['number']);
	$image = mysqli_real_escape_string($mysqli, $_POST['image']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$type = mysqli_real_escape_string($mysqli, $_POST['type']);
    $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
    $details = mysqli_real_escape_string($mysqli, $_POST['details']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']); // Define $number

	// Check for empty fields
	if (empty($name) || empty($quantity) || empty($details) || empty($price)) {
		if (empty($name) ||  empty($quantity)|| empty($image) || empty($details) || empty($type) || empty($price)) {
			if (empty($name)) {
				echo "<font color='red'>Product should be labeled</font><br/>";
			}
			if (empty($image)) {
				echo "<font color='red'>Provide product photo</font><br/>";
			}
			
			
			if (empty($quantity)) {
				echo "<font color='red'>Quantity must be specified.</font><br/>";
			}
			if (empty($type)) {
				echo "<font color='red'>Input bike type</font><br/>";
			}
			
			
			if (empty($details)) {
				echo "<font color='red'>Details are empty.</font><br/>";
			}
			if (empty($price)) {
				echo "<font color='red'>No price.</font><br/>";
			}
			
	}
}
	 else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE list SET `image` = '$image', `name` = '$name', `type` = '$type', `quantity` = '$quantity', `details` = '$details', `price` = '$price' WHERE `number` = '$number'");

		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='try.php'>View Result</a>";
	}
}
?>

