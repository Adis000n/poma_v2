<?php
// scrip2.php

if (isset($_GET['subject']) && isset($_GET['points'])) {
    $subject = $_GET['subject'];
    $points = $_GET['points'];
    $pytanie_path = $_GET['pytanie_path'];

    // Construct the path to the image based on the provided subject and points
    $imagePath = getRandomImage($subject, $points, $pytanie_path);

    // Database connection
    $con = mysqli_connect("localhost", "root", "", "poma");
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare the update query
    $update_query = "UPDATE `mvc_konkurs_batalia` SET `img_odpowiedzi`=?, `stan`='odpowiedz' WHERE `id`=1";

    $update_stmt = mysqli_prepare($con, $update_query);
    if (!$update_stmt) {
        die("Error preparing update statement: " . mysqli_error($con));
    }

    // Bind parameters
    mysqli_stmt_bind_param($update_stmt, "s", $imagePath);

    // Execute the update query
    if (!mysqli_stmt_execute($update_stmt)) {
        die("Error updating record: " . mysqli_stmt_error($update_stmt));
    }

    // Close the statement
    mysqli_stmt_close($update_stmt);

    // Close the database connection
    mysqli_close($con);

    echo $imagePath;
} else {
    echo "Invalid parameters";
}

function getRandomImage($subject, $points, $pytanie_path) {
    // Modify this function to retrieve a random image path from your database
    // based on the subject, points, and unused status.

    // Example:
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "poma");
    // Select a random, unused image from the database
    $result = mysqli_query($con, "SELECT * FROM mvc_konkurs_pytania WHERE kategoria='$subject' AND poziom=$points AND img_pytania='$pytanie_path' AND (YEAR(CURDATE())-rok_uzycia)>=5 LIMIT 1;");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $imagePath = $row['img_odpowiedzi'];

        // Update the 'uzyte' column to mark the image as used
        mysqli_query($con, "UPDATE mvc_konkurs_pytania SET rok_uzycia=YEAR(CURDATE()) WHERE id=$id");

        return "../$imagePath";
    }

    // If no image is found, you can return a default image path or handle it accordingly.
    return "../grafika/logo_poma.jpg";
}
?>
