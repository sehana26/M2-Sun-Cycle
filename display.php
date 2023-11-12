<?php
require_once("database.php");

// Retrieve data from the "users" table
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sun Cycle PH</title>
    <link rel="icon" type="image/x-icon" href="images/1.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">   
    <title>User Messages</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px; /* Adjust the font size here */
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
<h3> hhhhh</h3>
<h3> hhhhh</h3>
<h3> hhhhh</h3>

</div>
<section class="about" id="about">

    <p>
    
	<br></br>
	 <a class= "btn" href="try.php">Return</a>
	
    </p>
	<br></br>
    
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table >
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Message</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['S.no']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Contact']; ?></td>
                    <td><?php echo $row['Message']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>

    <!-- Close the database connection -->
    <?php mysqli_close($conn); ?>
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
