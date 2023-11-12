<?php
session_start();
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
<style>
 
.container {
    width: 500px;
    padding: 50px;
    border: 2px solid white;
    background-color: rgba(0, 0, 0, 0.2); /* light frosted black */
    border-radius: 5px;
    color: white;
    margin: 0 auto;
    text-align: left;
}

/* Form header */
.container h3 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Input fields */
.Email, .Password {
    margin: 10px 0;
}

input {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: rgba(255, 255, 255, 0.9);
}

/* Error message */
.error-message {
    color: red;
    margin-top: 10px;
    text-align: center;
}

/* Login status */
.login-status {
    color: green;
    margin-top: 10px;
    text-align: center;
}

/* Button styling */
.button {
    margin-top: 10px;
    text-align: center;
}

button {
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    background-color: rgb(41, 38, 38);
}

/* Login as Admin and Sign Up links */
a.btn {
    display: block;
    background-color: rgb(41, 38, 38);
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    margin-top: 10px;
  
}

a.btn:hover {
    background-color: #FF0000; /* Red hover color */
}

/* Home button */
button[type="submit"] {
    background-color: #FF0000; /* Red color */
}

button[type="submit"]:hover {
    background-color: #FF6666; /* Light red hover color */
}

  </style>

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

<div class="home-container">
  <br></br>
  <br></br>
  <br></br>

</div>


<section class="about" id="about">
<br></br>
  <br></br>
  <br></br>

  <div class="container">
    <h3>Log In Admin</h3>
    <?php
       if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<p class="error-message">Fill in all fields!</p>';
        } elseif ($_GET['error'] == "sqlerror") {
            echo '<p class="error-message">SQL error occurred!</p>';
        } elseif ($_GET['error'] == "wrongpwd") {
            echo '<p class="error-message">Wrong password!</p>';
        } elseif ($_GET['error'] == "nouser") {
            echo '<p class="error-message">No user found!</p>';
        }
    }

    echo '</form>';
    if (isset($_SESSION['userId'])) {
        echo '<p class="login-status">You are logged in!</p>';
        echo '<form id="logout" action="includes/logout.inc.php" method="post">
        <div class="button">
            <button type="submit" name="logout-submit" id="logout">Log out</button>
        </div>
        </form>';
        echo '<div class="button">
        <button type = "submit" onclick="redirectToAnotherPage()">Home</button>
      </div>';

echo '<script>
      function redirectToAnotherPage() {
          window.location.href = "adminhomepage.php"; //
      }
      </script>';

    }
     else  {
        echo ' <form id="myForm" action="includes/login.inc.php" method="post">
        <div class="Email">
            <input type="text" name="mailuid" placeholder="Username or Email" id="email">
        </div>
        <div class="Password">
            <input type="password" name="pwd" placeholder="Password" id="password">
        </div>';

        echo '<div class="button">
        <a class="btn" href="adminhomepage.php">Submit</a>
    </div>';    
    echo '<div class="button">
        <a class="btn" href="header.php">Back</a>
    </div>';
    
        



        // Error handling
     
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
</body>
</html>
