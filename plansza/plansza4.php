<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mechaniczna Pomarańcza- Plansza 4-osobowa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
        <script src="admin.js"></script>
        <script src="pokaz.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      </head>
      <script>
          document.addEventListener('DOMContentLoaded', () => {
        const ws = new WebSocket('ws://172.26.0.1:3000/ws');
          });
        </script>
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
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="red" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    CZERWONY
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="blue" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    NIEBIESKI
  </label>
</div>
        <br>
       <form method="post">
        <label for="customRange2" class="form-label">OŚ X</label>
<input type="range" class="form-range" name="myX"  min="1" max="200" step="1" id="myX" value="50">
        <br>

        </form>
             <br>

        <label for="customRange2" class="form-label">OŚ Y</label>
<input type="range" class="form-range" min="1" max="200" value="50" id="myY">
        <br>

    </div>
    <div class="team" id="team1">
        <h2>Drużyna 1</h2>
        <p>ptk: <h3 id="score1">-</h3></p>
      </div>
      <div class="team" id="team2">
        <h2>Drużyna 2</h2>
        <p>ptk: <h3 id="score1">-</h3></p>
      </div>
      <div class="team" id="team3">
        <h2>Drużyna 3</h2>
        <p>ptk: <h3 id="score1">-</h3></p>
      </div>
      <div class="team" id="team4">
        <h2>Drużyna 4</h2>
        <p>ptk: <h3 id="score1">-</h3></p>
      </div>
    <div id="pionki">
      <div class="yellow_pawn"><img src="../grafika/pawn1.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>
      <div class="red_pawn"><img src="../grafika/pawn2.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>
      <div class="blue_pawn"><img src="../grafika/pawn3.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>
      <div class="green_pawn"><img src="../grafika/pawn4.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>
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
