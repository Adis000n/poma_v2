<?php

error_reporting(E_ALL);

// Database connection
$con = mysqli_connect("localhost", "root", "", "poma");
if (!$con) {
    die("Nie działa: " . mysqli_connect_error());
}

// Prepare the update query
$update_query = "UPDATE `mvc_konkurs_batalia` SET 
                 `kategoria`='-',
                 `poziom`=?,
                 `nr_druzyny`=?,
                 `img_odpowiedzi`='',
                 `img_pytania`='',
                 `media`='',
                 `media_typ`='',
                 `stan`='clear'
                 WHERE id=1";

$update_stmt = mysqli_prepare($con, $update_query);
if (!$update_stmt) {
    die("Error preparing update statement: " . mysqli_error($con));
}

// Set parameter values
$poziom = NULL;
$nr_druzyny = NULL; // Set nr_druzyny to NULL

// Bind parameters
mysqli_stmt_bind_param($update_stmt, "ii", $poziom, $nr_druzyny);

// Execute the update query
if (!mysqli_stmt_execute($update_stmt)) {
    die("Error updating record: " . mysqli_stmt_error($update_stmt));
}

// Close the statement
mysqli_stmt_close($update_stmt);

// Close the database connection
mysqli_close($con);

echo "Content cleared successfully";
?>
