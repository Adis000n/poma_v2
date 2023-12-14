<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytania - Mechaniczna pomarańcza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
</head>
<?php
// stworzenie złączenia z bazą danych
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "poma");

// zapytanie o zdjęcie
$q = "SELECT * FROM mvc_konkurs_pytania WHERE uzyte = 0 ORDER BY RAND() LIMIT 1";
$result = mysqli_query($con, $q);

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        // Zaktualizuj pole 'uzyte' w bazie danych na true, aby oznaczyć obraz jako użyty
        $id = $row['id']; // Zakładam, że masz kolumnę 'id' w tabeli
        mysqli_query($con, "UPDATE mvc_konkurs_pytania SET uzyte = 1 WHERE id = $id");

        // Pobierz informacje o pytaniu
        $category = $row['kategoria'];
        $level = $row['poziom'];
        $imagePath = $row['img_pytania'];

        // Przypisz ścieżkę do pytania
        $query = "../baza_pytania/$category/$level/$imagePath";
    }
}
?>

<style>
        body, html {
    height: 100%;
    background-color: black;
    }

    * {
    box-sizing: border-box;
    }

    .bg-image {
    /* The image used */
    background-image: url("../grafika/logo_poma2.jpg");
    background-color: rgba(0, 0, 0, 0.8) ;
    /* Add the blur effect */
    filter: blur(10px);
    -webkit-filter: blur(10px);

    /* Full height */
    height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.35;
    }

    /* Position text in the middle of the page/image */
    .bg-text {
    background-color: rgb(255,255,255); /* Fallback color */ 
    color: orangered;
    font-weight: bold;
    border: 7px solid orange;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 85%;
    padding: 20px;
    text-align: center;
    border-radius: 5px;
    }
    #stats{
        display: flex;
        flex-direction: row;
        justify-content: center;
        justify-content: space-around;
    }
    h3{
        color: rgb(100, 100, 100);
    }
    #timer{
        border: 4px solid orangered;
        color: darkorange;
        margin-top: 20px !important;
        width: 30%;
        margin: auto;
        border-radius: 20px;
    }
    #time{
        color: rgb(70,70,70);
    }
</style>
<body>
    <div class="bg-image"></div>

    <div class="bg-text">
        <div id="stats">
            <div id="druzyna">
                <h2>Nr drużyny:</h2>
                <h3 id="druzyna-data">-</h3>
            </div>
            <hr class="border border-warning border-3 opacity-100">
            <div id="poziom">
                <h2>Poziom trudności:</h2>
                <h3 id="poziom-data">-</h3>
            </div>
            <hr class="border border-warning border-3 opacity-100">
            <div id="kategoria">
                <h2>Kategoria:</h2>
                <h3 id="kategoria-data">-</h3>
            </div>
        </div>
        <hr class="border border-warning border-3 opacity-100">
        <h1>Pytanie:</h1>
        <!-- wyswietlanie zdjecia pytania pobranego z bazy danych kod php do tego zaraz pod headem -->
        <img src="../<?php echo $query ?>" width="50%">
        <h1>Poprawna odpowiedź:</h1>
        <img src="../baza_pytania/chemia/1/co1.jpg" width="20%">
        <div id="timer">
            <h1>Pozostały czas:</h1>
            <h2 id="time">30</h2>
        </div>
  </div>
    </div>

</body>
<!-- Add this script at the end of the file -->
<script>
document.addEventListener('DOMContentLoaded', () => {
   const ws = new WebSocket('ws://192.168.253.91:3000/ws');

   ws.onmessage = (event) => {
      const data = JSON.parse(event.data);
      updateContent(data.subject, data.points);
   };

   function updateContent(subject, points) {
      const contentDiv = document.getElementById('kategoria-data');
      contentDiv.innerHTML = subject;
      const contentDiv2 = document.getElementById('poziom-data');
      contentDiv2.innerHTML = points;

      // Make an AJAX request to fetch the new image
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
         if (xhr.readyState === 4 && xhr.status === 200) {
            const imagePath = xhr.responseText;
            const imageElement = document.getElementById('pytanie-img');
            imageElement.src = imagePath;
         }
      };
      xhr.open('GET', `script.php?subject=${subject}&points=${points}`, true);
      xhr.send();
   }
});

</script>

</html>
