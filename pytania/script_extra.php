<?php
// script.php

if (isset($_GET['subject']) && isset($_GET['points'])) {
    $subject = $_GET['subject'];
    $points = $_GET['points'];
    $pytanie_path = $_GET['pytanie_path'];

    // Construct the path to the image based on the provided subject and points
    $mediaPath = getRandomMedia($subject, $points, $pytanie_path);

    echo $mediaPath;
} else {
    echo "Invalid parameters";
}

function getRandomMedia($subject, $points, $pytanie_path) {
    // Modify this function to retrieve a random media path from your database
    // based on the subject, points, and unused status.

    // Example:
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "poma");
    
    // Select a random, unused media from the database
    $result = mysqli_query($con, "SELECT * FROM mvc_konkurs_pytania WHERE kategoria='$subject' AND poziom=$points AND img_pytania='$pytanie_path' AND (YEAR(CURDATE())-rok_uzycia)>=5 LIMIT 1;");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $mediaPath = '';


        if ($row['media_typ'] == 'wideo') {
            // If media type is 'wideo', use the path from the 'media' column
            $mediaPath = "../" . $row['media'];

            $con = mysqli_connect("localhost", "root", "", "poma");
            if (!$con) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            // Prepare the update query
            $update_query = "UPDATE `mvc_konkurs_batalia` SET `media`=?, `media_typ`='wideo' WHERE `id`=1";

            $update_stmt = mysqli_prepare($con, $update_query);
            if (!$update_stmt) {
                die("Error preparing update statement: " . mysqli_error($con));
            }

            // Bind parameters
            mysqli_stmt_bind_param($update_stmt, "s", $mediaPath);

            // Execute the update query
            if (!mysqli_stmt_execute($update_stmt)) {
                die("Error updating record: " . mysqli_stmt_error($update_stmt));
            }

            // Close the statement
            mysqli_stmt_close($update_stmt);

            // Close the database connection
            mysqli_close($con);

            return $mediaPath;
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
