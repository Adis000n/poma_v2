<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mechaniczna Pomarańcza- Plansza 2-osobowa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
        <script src="admin.js"></script>
        <!-- <script src="pokaz.js"></script> -->
    </head>
    <body>
        
    <button id="ShowAdm" >
 
    </button>

    <div id='ADMIN'>
    <button id="test" type="button" class="btn btn-dark">TEST</button>
    <button id="hideMe" type="button" class="btn btn-dark">SCHOWAJ</button>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="yellow" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    ŻÓŁTY
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="green" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    ZIELONY
  </label>
</div>

        <br>
        <label for="customRange2" class="form-label">OŚ X</label>
<input type="range" class="form-range" min="1" max="200" value="50" id="myX">
        <br>
        <!-- <p id="wartoscSuwakaX"></p> -->
    `     <br>
        <label for="customRange2" class="form-label">OŚ Y</label>
<input type="range" class="form-range" min="1" max="200" value="50" id="myY">
        <br>
        <!-- <p>Wartość suwaka Y: <span id="wartoscSuwakaY"></span></p> -->

    </div>
    <style>
        #ADMIN{
            display: none;
            color: black;
            background-color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 40vw;
            height: 10vh;
            z-index: 1000;
        }

         #ShowAdm{  
    width: 96px;
    height: 96px;
    background-image: url('../grafika/gear100.png');
        }


    </style>
</body>
</html>
<!-- LINIA 11.50,56 MAJĄ BYĆ DO WYŚWIELANIA WARTOŚCI LECZ TA KURWA NIE DZIAŁA -->