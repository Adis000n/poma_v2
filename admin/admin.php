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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="przesyl.js"></script>
</head>
    <body>
<div id=panets>
<!-- DIV OD PANELU OD STARTU KONKUSU i KOŃCA KONKUSU -->
<button type="button" class="btn btn-success" onclick="startevent()">Start konkursu</button><br><!-- Start konkursu możesz wpierdolić do panel sterowania JS tworzenie drużyn + zmiana eventstatus na 1 -->
<button type="button" class="btn btn-danger" onclick="stopevent()">Stop konkurs (II tura,III tura,Restart Konkursu)</button> <br><!-- Stop,Restart JS ZEROWANIE DRUŻYN i evantstatus 0 --><audio id="audio" src="../grafika/favicon/super1.mp3"></audio>
<button type="button" class="btn btn-info" onclick="sprawdzstan()">Szybki teśki jaki stan konkursu</button> <!-- Przycisk test stanu eventstatus -->

</div> 
</body>
</html>