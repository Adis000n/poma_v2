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
    </head>
    <body>
        
    <button id="ShowAdm" >
 
    </button>

    <div id='ADMIN'>
        <button id='TEST'>TEST</button>
        <button id='hideMe' style='color: black;'>HIDE</button>
        <input type="radio" class='pawns' name='pawn'  value='yellow'>yellow
        <input type="radio" class='pawns' name='pawn' value='green'>green

        <br>
        <button class='buttonSlider'>-</button> <input type="range" min="1" max="200" value="50"  class="slider" id="myX"><button class='buttonSlider'>+</button>
        <br>
        <button class='buttonSlider'>-</button> <input type="range" min="1" max="200" value="50"  class="slider" id="myY"><button class='buttonSlider'>+</button>
        <br>

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

        .slider{
            display: inline-block !important;
            width: 80% !important;
            color:lightblue;
        }
        #TEST{
            color: black;
        }
         #ShowAdm{  
    width: 96px;
    height: 96px;
    background-image: url('../grafika/gear100.png');
        }


    </style>
</body>
</html>