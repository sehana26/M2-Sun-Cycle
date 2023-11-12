<?php
// Include the database connection file
require_once("productdb.php");

// Get the "number" parameter value from the URL
$number = isset($_GET['number']) ? $_GET['number'] : null;

if ($number === null) {
    // Handle the case when the "number" parameter is missing or invalid.
    echo "Invalid or missing 'number' parameter.";
} else {
    // Delete the row from the database table
    $result = mysqli_query($mysqli, "DELETE FROM list WHERE number = $number");

    if ($result) {
        // Redirect to the main display page (try.php) after a successful deletion.
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=try.php">';
    } else {
        echo "Error deleting the record: " . mysqli_error($mysqli);
    }
}
?>
