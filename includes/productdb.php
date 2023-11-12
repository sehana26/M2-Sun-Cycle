<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "product";

    $mysqli= mysqli_connect($host, $user, $pass, $dbname);

    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
