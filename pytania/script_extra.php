<?php
// script.php

if (isset($_GET['subject']) && isset($_GET['points'])) {
    $subject = $_GET['subject'];
    $points = $_GET['points'];

    // Construct the path to the image based on the provided subject and points
    $mediaPath = getRandomMedia($subject, $points);

    echo $mediaPath;
} else {
    echo "Invalid parameters";
}

function getRandomMedia($subject, $points) {
    // Modify this function to retrieve a random media path from your database
    // based on the subject, points, and unused status.

    // Example:
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "poma");
    
    // Select a random, unused media from the database
    $result = mysqli_query($con, "SELECT * FROM mvc_konkurs_pytania WHERE kategoria='$subject' AND poziom=$points AND (YEAR(CURDATE())-uzyte)>=5 LIMIT 1;");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $mediaPath = '';


        if ($row['media_typ'] == 'wideo') {
            // If media type is 'wideo', use the path from the 'media' column
            $mediaPath = "../" . $row['media'];
        } 
        else {
            $mediaPath = "";
        }
        return $mediaPath;
    }

    // If no media is found, you can return a default path or handle it accordingly.
    return "";
}
?>
