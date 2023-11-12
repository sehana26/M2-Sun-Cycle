

<?php
session_start();

// Retrieve selected values from the URL parameters
$selectedCity = isset($_GET['city']) ? $_GET['city'] : '';
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$startTime = isset($_GET['start_time']) ? $_GET['start_time'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$endTime = isset($_GET['end_time']) ? $_GET['end_time'] : '';

$selectedBikes = isset($_POST['selectedBikes']) ? json_decode($_POST['selectedBikes'], true) : [];

// Calculate total amount
$totalAmount = calculateTotalAmount($selectedBikes);

// Function to calculate total amount
function calculateTotalAmount($selectedBikes) {
    $totalAmount = 0;
    foreach ($selectedBikes as $bike) {
        $totalAmount += $bike['price'];
    }
    return $totalAmount;
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>

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
        </div>

            
        </div>
     

        

    </section>
  

</header>
<style>


  h3 {
    color: #333; /* Set the heading color */
    font-size: 28px; /* Set the heading font size */
  }
  <style>
  .about {
    padding: 50px 0; /* Adjust the padding as needed */
    background-color: #f8f8f8; /* Set a background color */
    text-align: center;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
  }

  h3 {
    color: #333; /* Set the heading color */
    font-size: 28px; /* Set the heading font size */
  }

  .check {
    background-color: #fff; /* Set a background color for the content area */
    padding: 20px;
    margin-top: 20px; /* Add space between the heading and the content */
    border-radius: 8px; /* Add rounded corners to the content area */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    flex-direction: column;
    align-items: center; /* Center horizontally */
    justify-content: center; /* Center vertically */
  }

  h2 {
    color: red; /* Set the color for the section titles */
    margin-top: 20px; /* Add space between items */
  }

  ul {
    list-style: none;
    padding: 0;
    margin: 10px 0;
  }

  li {
    margin: 5px 0;
  }

  label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
  }

  input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button {
    background-color: #28a745; /* Set a green background color for the button */
    color: #fff; /* Set the text color for the button */
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  button:hover {
    background-color: red; /* Darken the background color on hover */
  }
  .video-container {
    max-width: 800px; 
    margin: 20px auto; 
    overflow: hidden; 
    box-shadow: 0 0 10px rgba(0, 0, 0.1, 0.1); /* Add a subtle box shadow */
  }

  video {
    width: 100%; /* Make the video fill its container */
    height: auto; /* Maintain the video's aspect ratio */
    display: block; /* Remove extra spacing below the video */
  }
</style>




<div class="home-container">
  <br></br>
  <br></br>
  <br></br>

</div>


<section class="about" id="about">
  <br>
  <br>
  <br>

  <div class="container">
    <div class="check">
      <h3>Checkout Summary</h3>
      <h2>Selected City: </h2>
      <li> Metro Manila</li>
      <h2>Rental Period:</h2>
      <li> 11/12/2023 3:50 PM to 11/12/2023 4:00 PM</li>

      <h2>Selected Bikes:</h2>
      <ul>
        <?php foreach ($selectedBikes as $bike): ?>
          <li><?php echo $bike['name']; ?> - $<?php echo $bike['price']; ?></li>
        <?php endforeach; ?>
      </ul>

      <h2>Total Amount: $<?php echo $totalAmount; ?></h2>

      <!-- Payment details form -->
      <form id="paymentForm" method="post">
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required>

        <label for="expirationDate">Expiration Date:</label>
        <input type="text" id="expirationDate" name="expirationDate" placeholder="MM/YYYY" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <br></br>
        <button type="submit">Complete Payment</button>
      </form>

      <!-- Thank you form -->
      <form id="thankYouForm" style="display: none;">
        <h2>Thank you for renting!</h2>
        <p>Your payment has been received.</p>
      </form>
    </div>

    <div class="video-container">
      <video src="images/signup.mp4" loop autoplay muted></video>
    </div>
  </div>

  <form id="checkoutForm" action="checkout.php" method="post"></form>
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

</body>
<script>
  document.getElementById('paymentForm').addEventListener('submit', function (event) {
    event.preventDefault();
    document.getElementById('paymentForm').style.display = 'none';
    document.getElementById('thankYouForm').style.display = 'block';
  });
</script>
</script>
</html>
