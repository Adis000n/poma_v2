<?php
// Set the CORS headers to allow requests from your frontend application
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

// Rest of your PHP code
$con = mysqli_connect("localhost", "root", "", "poma");
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT nazwa, punkty FROM mvc_konkurs_druzyny";
$result = mysqli_query($con, $sql);

$rows = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}

mysqli_close($con);

// Send data as JSON
header('Content-Type: application/json');
echo json_encode($rows);
?>
