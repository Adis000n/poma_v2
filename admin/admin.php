<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechaniczna Pomarańcza - ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="panets.js"></script>
</head>
<?php
// stworzenie złączenia z bazą daych
//tutaj jakis zakomentowany kod php był do testów i nie ma znczenia
$con = mysqli_connect("localhost", "root","");
// print_r($con);
mysqli_select_db($con, "poma");
//zapytanie o zdjęcie
// $q = "SELECT * FROM mvc_konkurs_pytania group by img_pytania desc limit 1";
// $result = mysqli_query($con, $q);
// print_r($result);
// if ($result){
//     while($row = mysqli_fetch_array($result)){
// print_r($row);
//query jako sciezka do pytania
//     $query =  $row["img_pytania"];
//     }
// }
// else {
//echo "nie działa";
//}
?>
    <body>
        <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
            <button type="button" class="btn btn-primary" id="kategoria_chemia">Chemia</button>
            <button type="button" class="btn btn-primary" id="kategoria_informatyka">Informatyka</button>
            <button type="button" class="btn btn-primary" id="kategoria_fizyka">Fizyka</button>
            <button type="button" class="btn btn-primary" id="kategoria_matematyka">Matematyka</button>
            <button type="button" class="btn btn-primary" id="kategoria_technika">Technika</button>
            <button type="button" class="btn btn-primary" id="kategoria_niespodzianka">Niespodzianka</button>
        </div>
        <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
            <button type="button" class="btn btn-primary" id="za_1">za 2 punkty</button>
            <button type="button" class="btn btn-primary" id="za_2">za 1 punkt</button>
        </div>
<!-- <div id=panets>
DIV OD PANELU OD STARTU KONKUSU i KOŃCA KONKUSU
<button type="button" class="btn btn-success" onclick="startevent()">Start konkursu</button>
</div>  -->
<div id="response"></div>
</body>
<script src="wyswietlanie_pytan.js"></script>
</html>
