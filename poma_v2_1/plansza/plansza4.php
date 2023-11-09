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
        <!-- <script src="pokaz.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="pozycje.js"></script>
    </head>
    <body>

    <button id="ShowAdm"  >
 
    </button>
    <!-- POCZĄTEK PANELU ADMINA -->
    <div id='ADMIN'>
    <button id="test" type="button" class="btn btn-dark" onclick="runTest()">TEST</button>
    <button id="hideMe" type="button" class="btn btn-dark">SCHOWAJ</button>
    <audio id="audio" src="../grafika/favicon/super1.mp3"></audio>

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

   <?php
   $score3=10;
   ?>
      </div>      
    <!-- KOŃCZY SIĘ PANEL ADMINA -->
      <div class="team" id="team1">
        <h2>Drużyna 1</h2>
        <p>ptk: <span class="score1"></span></p>
      </div>
      <div class="team" id="team2">
        <h2>Drużyna 2</h2>
        <p>ptk: <span class="score2"></span></p>
      </div>
      <div class="team" id="team3">
        <h2>Drużyna 3</h2>
        <p>ptk: <span class="score3"></span></p>
      </div>
      <div class="team" id="team4">
        <h2>Drużyna 4</h2>
        <p>ptk: <span class="score4"></span></p>
      </div>
    <div id="pionki">
      <div class="yellow pawn"><img src="../grafika/pawn1.png" alt="debil"></div>
      <div class="red pawn"><img src="../grafika/pawn2.png" alt="debil"></div>
      <div class="blue pawn"><img src="../grafika/pawn3.png" alt="debil"></div>
      <div class="green pawn"><img src="../grafika/pawn4.png" alt="debil"></div>


    </div>

    <style>
        #ADMIN{
            display: none;
            color: black;
            background-color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 400px;
            height: 400px;
            z-index: 1000;
        }


         #ShowAdm{  
    width: 15px;
    height: 15px;
    background-image: url('../grafika/gear100.png');
        }
      body{
        background-image:url('../grafika/pseudoplansza.png') ; 

      }
      #team1{
        color:red;
        position: absolute;
        bottom:auto;
        left: 10%;
        top: 10%;
        right: auto;
      }
      #team2{
        color:yellowgreen;
        position: absolute;
        bottom:auto;
        left: 80%;
        top: 10%;
        right: auto;
      }
      #team3{
        color: red;
        position: absolute;
        bottom:auto;
        left: 10%;
        top: 90%;
        right: auto;
      }
      #team4{
        color:yellowgreen;
        position: absolute;
        bottom:auto;
        left: 80%;
        top: 90%;
        right: auto;
      }
      #pionki{
        scale: 0.05;
      }
      h2{
        font-size: 25px;
      }
      p{
        font-size: 15px
      }

    </style>
</body>
</html>
