<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$con = mysqli_connect("localhost", "root", "", "poma");
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT kategoria, poziom, ilosc_druzyn, nr_druzyny, img_odpowiedzi, img_pytania, media, media_typ, stan FROM mvc_konkurs_batalia";
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
