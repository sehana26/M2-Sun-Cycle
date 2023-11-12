<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sun Cycle PH</title>
    <link rel="icon" type="image/x-icon" href="images/1.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">   
	<title>Add Data</title>
	<style>
		table {
            width: 100%;
            border-collapse: collapse;
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

<br></br>
	<p>
		<a class="btn" href="try.php">Return</a>
	</p>
	<br></br>

	<form action="addAction.php" method="post" name="add">
		<table width="25%" ,border="0">
			<tr> 
				<td>Image filename</td>
				<td><input type="text" name="image"></td>
			</tr>
			<tr> 
				<td>Bike Model</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Bike Type</td>
				<td><input type="text" name="type"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="int" name="quantity"></td>
			</tr>
			<tr> 
				<td>Details</td>
				<td><input type="text" name="details"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="int" name="price"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class= "btn" type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
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

    <div class="credit"> All rights reserved <span>  Sun Cycle PH </span> 2023 </div>

</section>
</body>
</html>

