<?php
// Include the database connection file
require_once("productdb.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM `list` ORDER BY `number` DESC");

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($conn));
}

?>

<html>
<head> 
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sun Cycle PH</title>
    <link rel="icon" type="image/x-icon" href="images/1.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">   
    <title>Admin Page</title>
	<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

</head>

<body>
<header>

<section class="flex">

	<input type="checkbox" name="" id="toggler">
	<label for="toggler" class="fas fa-bars"></label>

	<a href="#" class="logo"><span><img src="images/1.png" alt="logot" style ="width:40px;height:40px;"> </span>Sun Cycle</a> 

	<nav class="navbar">

	</nav>

	<div class="icons">
		<a href="adminhomepage.php" class="fa-solid fa-house"></a>

	</div>
</section>
</header>

<div class="home-container">
<br></br>
<br></br>
<br></br>

</div>
<section class="about" id="about">
    <h2>Admin Page</h2>
    
	<p>
    
	<br></br>
	<a class= "btn" href="add.php">Add New Bike Listing</a> <a class= "btn" href="display.php">View Messages</a> <a class= "btn" href="newsignups.php">New User</a> 
	
    </p>
	<br></br>
    <table>
    <tr>
        <th>Image</th>
        <th>Bike Model</th>
        <th>Type</th>
        <th>Quantity</th>
        <th>Details</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php
    // Fetch the next row of a result set as an associative array
    while ($res = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><img src='" . $res['image'] . "' alt='Bike Image' style='width: 100px; height: 100px;'></td>";
        echo "<td>" . $res['name'] . "</td>";
        echo "<td>" . $res['type'] . "</td>";
        echo "<td>" . $res['quantity'] . "</td>";
        echo "<td>" . $res['details'] . "</td>";
        echo "<td>" . $res['price'] . "</td>";
        echo "<td><a href=\"edit.php?number=" . $res['number'] . "\">Edit</a> | 
            <a href=\"delete.php?number=" . $res['number'] . "\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>

	<a class= "btn" href="rentalsadmin.php">View Catalogue Display</a>
	</section>

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick links</h3>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Products</a>
            <a href="#">Review</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>Extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorite</a>
        </div>

        <div class="box">
            <h3>Locations</h3>
            <a href="#">Davao</a>
            <a href="#">Manila</a>
            <a href="#">Cebu</a>
            <a href="#">Cagayan De Oro</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">suncylePH@gmail.com</a>
            <a href="#">Davao, Philippines - 8100</a>
            <img src="images/payment.png" alt="">
        </div>

    </div>

    <div class="credit"> All rights reserved <span>  Sun Cycle PH </span> 20233 </div>

</section>
</body>
</html>
