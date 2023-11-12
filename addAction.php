<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("productdb.php");

if (isset($_POST['submit'])) {
    // Escape special characters in string for use in SQL statement	
	$image = mysqli_real_escape_string($mysqli, $_POST['image']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$type = mysqli_real_escape_string($mysqli, $_POST['type']);
    $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
    $details = mysqli_real_escape_string($mysqli, $_POST['details']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    
    // Check for empty fields
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
        
        // Show a link to the previous page
        echo "<br/><a href='addaction.php();'>Go Back</a>";
    } else { 
        // If all the fields are filled (not empty) 

        // Insert data into the database
        $insert_query = "INSERT INTO list (`image`, `name`, `type`, `quantity`, `details`, `price`) VALUES ('$image', '$name','$type', '$quantity', '$details', '$price')";
        if (mysqli_query($mysqli, $insert_query)) {
            // Display success message
            echo "<p><font color='green'>Data added successfully!</font></p>";
            echo "<a href='try.php'>View Result</a>";
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($mysqli);
        }
    }
}

// Close the database connection
mysqli_close($mysqli);
?>
</body>
</html>
