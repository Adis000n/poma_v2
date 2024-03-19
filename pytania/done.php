<?php
error_reporting(E_ALL);

// Database connection
$con = mysqli_connect("localhost", "root", "", "poma");
if (!$con) {
    die("Nie działa: " . mysqli_connect_error());
}

// Prepare the update query
$update_query = "UPDATE `mvc_konkurs_batalia` SET `stan`='done' WHERE id=1";

// Execute the update query
if (!mysqli_query($con, $update_query)) {
    die("Error updating record: " . mysqli_error($con));
}

// Close the database connection
mysqli_close($con);

echo "Content cleared successfully";
?>
