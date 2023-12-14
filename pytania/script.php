<?php
// Your database connection code here
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "poma");

if (isset($_GET['subject']) && isset($_GET['points'])) {
    $subject = $_GET['subject'];
    $points = $_GET['points'];

    $q = "SELECT * FROM mvc_konkurs_pytania WHERE kategoria = '$subject' AND poziom = '$points' AND uzyte = 0 ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($con, $q);

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            mysqli_query($con, "UPDATE mvc_konkurs_pytania SET uzyte = 1 WHERE id = $id");
            $imagePath = "../baza_pytania/$subject/$points/" . $row['img_pytania'];
            echo $imagePath;
        }
    }
}
?>
