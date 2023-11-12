<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['userId'])) {
    // Redirect to the login page or take any appropriate action
    header("Location: header.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sun Cycle PH</title>
    <link rel="icon" type="image/x-icon" href="images/1.png">

    <link rel="stylesheet" href="css/rentalstyle.css">
    <script src="js/rentaljava.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>

<!-- header section starts  -->

<header>

    <section class="flex">

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo"><span><img src="images/1.png" alt="logot" style ="width:40px;height:40px;"> </span>Sun Cycle</a> 

        <nav class="navbar">

        </nav>

        <div class="icons">
            <a href="index.php" class="fa-solid fa-house"></a>
            <br></br>
            <div id="cart-icon" class="cart-icon"> 
            <a href="#" class="fa-solid fa-cart-shopping"></a>
         <span id="cart-item-count">0</span>
        </div>

            
        </div>
     

        

    </section>
    <div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" id="modal-close">&times;</span>
        <h2>Selected Bikes</h2>
        <div id="selected-bikes">
            
        </div>
        <h2>Total Amount</h2>
        <p id="total-amount">$0</p>
    <button id="proceedButton" class="proceed-button">Proceed</button>


      

    </div>
</div>

</header>

<div class="home-container">
  <br></br>
  <br></br>
  <br></br>

</div>


<section class="about" id="about">
   
    </div>
    <div id="rental-bar" float="center">
        <label for="city">City Selection</label>
        <select id="city">
            <option value="">Select a City</option>
            <option value="Metro">Metro Manila</option>
            <option value="QC">Quezon City</option>
            <option value="Cebu">Cebu</option>
            <option value="Dvo">Davao</option>
        </select>
        <label for="start">Start Date and Time</label>
        <input type="date" id="start-date" placeholder="Start Date">
        <input type="time" id="start-time" placeholder="Start Time">
        <label for="end">End Date and Time</label>
        <input type="date" id="end-date" placeholder="End Date">
        <input type="time" id="end-time" placeholder="End Time">
    </div>
    
    <div class="container">
        <div class="sidebar">
            <div class="filter">
                <h2>Filter by Bike Type</h2>
                <select id="bike-type-filter">
                    <option value="all"> All </option>
                    <option value="mountain">Mountain Bike</option>
                    <option value="road">Road Bike</option>
                    <option value="electric">Electric Bike</option>
                    <option value="premium">Premium Bike</option>
                    <option value="city">City Bike</option>
                    <option value="trail">Trail Bike</option>
                </select>
                
            </div>
        </div>
    
        
        <div class="product-container">
    <?php
    // Include the database connection file
    require_once("productdb.php");

    // Fetch data in descendmysqliing order (latest entry first)
    $result = mysqli_query($mysqli, "SELECT * FROM `list` ORDER BY `number` DESC");

    if ($result === false) {
        die("Error in SQL query: " . mysqli_error($conn));
    }

    // Loop through the fetched data and display each bike listing
    while ($res = mysqli_fetch_assoc($result)) {
        echo "<div class='product' data-type='" . $res['type'] . "' data-src='" . $res['image'] . "'>";
        echo "<img src='" . $res['image'] . "' alt='" . $res['image'] . "'>";
        echo "<h2>" . $res['name'] . "</h2>";
        echo "<p class='quantity'>Available:" . $res['quantity'] . "</p>";
        echo "<p class='description'>" . $res['details'] . "</p>";
        echo "<p class='price'>$" . $res['price'] . "/day</p>";
        echo "<button class='rent-button' data-product-id=". $res['number'].">Rent Now</button>
        ";
        echo "</div>";
    }
    ?>
</div>
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
   
  <form id="checkoutForm" action="checkout.php" method="post"></form>

</body>

</html>

