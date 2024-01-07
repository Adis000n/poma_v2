<?php
// script.php

if (isset($_GET['subject']) && isset($_GET['points'])) {
    $subject = $_GET['subject'];
    $points = $_GET['points'];

    // Construct the path to the image based on the provided subject and points
    $imagePath = getRandomImage($subject, $points);

    echo $imagePath;
} else {
    echo "Invalid parameters";
}

function getRandomImage($subject, $points) {
    // Modify this function to retrieve a random image path from your database
    // based on the subject, points, and unused status.

    // Example:
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "poma");
    // Select a random, unused image from the database
    $result = mysqli_query($con, "SELECT * FROM mvc_konkurs_pytania WHERE kategoria='$subject' AND poziom=$points AND uzyte=0 LIMIT 1");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $imagePath = $row['img_odpowiedzi'];

        // Update the 'uzyte' column to mark the image as used
        mysqli_query($con, "UPDATE mvc_konkurs_pytania SET uzyte=1 WHERE id=$id");

        return "../$imagePath";
    }

    // If no image is found, you can return a default image path or handle it accordingly.
    return "../grafika/logo_poma.jpg";
}
?>
