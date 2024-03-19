<?php
// update_nr_druzyny.php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

if (isset($_POST['team'])) {
    $team = $_POST['team'];

    // Update the nr_druzyny column in the database where the ID is 1
    $con = mysqli_connect("localhost", "root", "", "poma");
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $update_query = "UPDATE mvc_konkurs_batalia SET nr_druzyny=? WHERE id=1";

    $update_stmt = mysqli_prepare($con, $update_query);
    if (!$update_stmt) {
        die("Error preparing update statement: " . mysqli_error($con));
    }

    // Bind parameters
    mysqli_stmt_bind_param($update_stmt, "i", $team); // Assuming nr_druzyny is an integer

    // Execute the update query
    if (!mysqli_stmt_execute($update_stmt)) {
        die("Error updating record: " . mysqli_stmt_error($update_stmt));
    }

    // Close the statement
    mysqli_stmt_close($update_stmt);

    // Close the database connection
    mysqli_close($con);

    echo "Successfully updated nr_druzyny to $team";
} else {
    echo "Invalid request";
}
?>
