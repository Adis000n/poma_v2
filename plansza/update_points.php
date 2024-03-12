<?php
// Retrieve the JSON string sent via AJAX and decode it
$jsonString = file_get_contents('php://input');
$data = json_decode($jsonString, true);

// Database connection
$con = mysqli_connect("localhost", "root", "", "poma");
if (!$con) {
    die("Nie działa: " . mysqli_connect_error());
}

// Update team points in the database
$update_query = "UPDATE mvc_konkurs_druzyny SET punkty=? WHERE id=?";
$update_stmt = mysqli_prepare($con, $update_query);

if ($update_stmt === false) {
    die("Error preparing statement: " . mysqli_error($con));
}

$i = 1; // Counter for row index
foreach ($data as $points) {
    mysqli_stmt_bind_param($update_stmt, "ii", $points, $i);
    mysqli_stmt_execute($update_stmt);
    $i++; // Increment row index
}

mysqli_stmt_close($update_stmt);
mysqli_close($con);

echo "Team points updated successfully";
?>
