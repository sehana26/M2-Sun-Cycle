<?php
require_once 'includes/productdb.php';

// Fetch the count of users
$countResult = mysqli_query($mysqli, "SELECT COUNT(*) AS userCount FROM users");
$userCount = 0;

if ($countResult) {
    $countRow = mysqli_fetch_assoc($countResult);
    $userCount = $countRow['userCount'];
}

$result = mysqli_query($mysqli, "SELECT uidUsers, emailUsers FROM users");
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
            margin-top: 20px;
            font-size: 16px;
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
        .welcome-message {
        font-size: 30px;
        margin-bottom: 20px;
        color: red;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        transition: color 0.3s;
    }

    /* Add a hover effect */
    .welcome-message:hover {
        color: black; /* Change the text color on hover */
        transform: scale(1.1); /* Enlarge the text on hover */
    }
    </style>
</head>
<body>
<header>
    <section class="flex">
        <input type="checkbox" name="" id="toggler">
        <label for "toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">
            <span><img src="images/1.png" alt="logot" style="width:40px;height:40px;"></span>
            Sun Cycle
        </a>
        <nav class="navbar"></nav>
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
    <br></br>
    <p class="welcome-message">Welcome, Admin!<span>  <?php echo $userCount; ?></span> users have signed up.</p>

    <p>
        <br></br>
        <a class="btn" href="try.php">Return</a>
    </p>

    <br></br>
    <table>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <tr>
            <th><strong>Username (uid)</strong></th>
            <th><strong>Email (mail)</strong></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['uidUsers'] . "</td>";
            echo "<td>" . $row['emailUsers'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
    <!-- Close the database connection -->
    <?php mysqli_close($mysqli); ?>
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
        <div class= "box">
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
