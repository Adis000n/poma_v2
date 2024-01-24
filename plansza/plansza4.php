<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mechaniczna Pomarańcza- Plansza 4-osobowa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
        <!-- <script src="admin.js"></script> -->
        <!-- <script src="pokaz.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- <scrip src="plansza.js"></script> -->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="stylkjg6.css">
      </head>
<script>
      document.addEventListener('DOMContentLoaded', () => {
    const ws = new WebSocket('ws://192.168.55.109:3000/ws');

    ws.onmessage = (event) => {
    const data = JSON.parse(event.data);

    if (data.team1 !== undefined || data.team2 !== undefined || data.team3 !== undefined || data.team4 !== undefined) {
        team1 = data.team1;
        team2 = data.team2;
        team3 = data.team3;
        team4 = data.team4;
        console.log('Received team data:', team1, team2, team3, team4);
        updateContent(team1, team2, team3, team4);
        pozycjonowanie1(team1);
        pozycjonowanie2(team2)
        pozycjonowanie3(team3)
        pozycjonowanie4(team4)

    }
    else if(data.nazwa_teamA !== undefined ||data.nazwa_teamB !== undefined ||data.nazwa_teamC !== undefined ||data.nazwa_teamD !== undefined){
        nazwa_teamA = data.nazwa_teamA;
        nazwa_teamB = data.nazwa_teamB;
        nazwa_teamC = data.nazwa_teamC;
        nazwa_teamD = data.nazwa_teamD;
      console.log('Received nazwy druzyn:',nazwa_teamA,nazwa_teamB,nazwa_teamC,nazwa_teamD);
        updateNazwyDruzyn(nazwa_teamA,nazwa_teamB,nazwa_teamC,nazwa_teamD)
  }


  }
});

  
function updateNazwyDruzyn(nazwa_teamA,nazwa_teamB,nazwa_teamC,nazwa_teamD){
  if(nazwa_teamC == undefined || nazwa_teamD == undefined){
    const contentDiv5 = document.getElementById('nazwa1');
        contentDiv5.innerHTML =  nazwa_teamA ;
        const contentDiv6 = document.getElementById('nazwa2');
        contentDiv6.innerHTML =  nazwa_teamB ;
    

  }else{
  const contentDiv5 = document.getElementById('nazwa1');
        contentDiv5.innerHTML =  nazwa_teamA ;
        const contentDiv6 = document.getElementById('nazwa2');
        contentDiv6.innerHTML =  nazwa_teamB ;
        const contentDiv7 = document.getElementById('nazwa3');
        contentDiv7.innerHTML =  nazwa_teamC ;
        const contentDiv8 = document.getElementById('nazwa4');
        contentDiv8.innerHTML =  nazwa_teamD ;

        }}
           



function updateContent(team1,team2,team3,team4) {

  

        const contentDiv = document.getElementById('score1');
        contentDiv.innerHTML =  team1 ;
        const contentDiv2 = document.getElementById('score2');
        contentDiv2.innerHTML = team2;
        const contentDiv3 = document.getElementById('score3');
        contentDiv3.innerHTML = team3;
        const contentDiv4 = document.getElementById('score4');
        contentDiv4.innerHTML = team4;
    }
   
    function setPosition(elementId, x, y) {
  const element = document.getElementById(elementId);
  element.style.left = x + 'px';
  element.style.top = y + 'px';}
  // Drużyna 1
      function pozycjonowanie1(team1){
        if(team1 ===0){
          setPosition('pawn1',392.5, -75);
        }
        else if(team1===1){
        setPosition('pawn1', 475.5, -75);
      }
        else  if(team1===2){
        setPosition('pawn1', 550.5, -75);
      }
      else  if(team1===3){
        setPosition('pawn1', 620.5, -75);
      }
      else  if(team1===4){
        setPosition('pawn1', 550, -75);
      }
      else  if(team1===5){
        setPosition('pawn1', 550, -75);
      }
      else  if(team1===6){
        setPosition('pawn1', 550, -75);
      }
      else  if(team1===7){
        setPosition('pawn1', 550, -75);
      }
      else  if(team1===8){
        setPosition('pawn1', 550, -75);
      }
      else  if(team1===9){
        setPosition('pawn1', 550, -75);
      }
      else  if(team1===10){
        setPosition('pawn1', 550, -75);
      }
      else  if(team1===11){
        setPosition('pawn1', 550, -75);
      }
    }
//druzyna 2
 function pozycjonowanie2(team2){       
if(team2 ===0){
          setPosition('pawn2',392.5, -75);
        }
        else if(team2===1){
        setPosition('pawn2', 475.5, -75);
      }
        else  if(team2===2){
        setPosition('pawn2', 550.5, -75);
      }
      else  if(team2===3){
        setPosition('pawn2', 620.5, -75);
      }
      else  if(team2===4){
        setPosition('pawn2', 550, -75);
      }
      else  if(team2===5){
        setPosition('pawn2', 550, -75);
      }
      else  if(team2===6){
        setPosition('pawn2', 550, -75);
      }
      else  if(team2===7){
        setPosition('pawn2', 550, -75);
      }
      else  if(team2===8){
        setPosition('pawn2', 550, -75);
      }
      else  if(team2===9){
        setPosition('pawn2', 550, -75);
      }
      else  if(team2===10){
        setPosition('pawn2', 550, -75);
      }
      else  if(team2===11){
        setPosition('pawn2', 550, -75);
      }}
      function pozycjonowanie3(team3){
        if(team3 ===0){
          setPosition('pawn3',392.5, -75);
        }
        else if(team3===1){
        setPosition('pawn3', 475.5, -75);
      }
        else  if(team3===2){
        setPosition('pawn3', 550.5, -75);
      }
      else  if(team3===3){
        setPosition('pawn3', 620.5, -75);
      }
      else  if(team3===4){
        setPosition('pawn3', 550, -75);
      }
      else  if(team3===5){
        setPosition('pawn3', 550, -75);
      }
      else  if(team3===6){
        setPosition('pawn3', 550, -75);
      }
      else  if(team3===7){
        setPosition('pawn3', 550, -75);
      }
      else  if(team3===8){
        setPosition('pawn3', 550, -75);
      }
      else  if(team3===9){
        setPosition('pawn3', 550, -75);
      }
      else  if(team3===10){
        setPosition('pawn3', 550, -75);
      }
      else  if(team3===11){
        setPosition('pawn3', 550, -75);
      }
      }
      function pozycjonowanie4(team4){
        if(team4 ===0){
          setPosition('pawn4',392.5, -75);
        }
        else if(team4===1){
        setPosition('pawn4', 475.5, -75);
      }
        else  if(team4===2){
        setPosition('pawn4', 550.5, -75);
      }
      else  if(team4===3){
        setPosition('pawn4', 620.5, -75);
      }
      else  if(team4===4){
        setPosition('pawn4', 550, -75);
      }
      else  if(team4===5){
        setPosition('pawn4', 550, -75);
      }
      else  if(team4===6){
        setPosition('pawn4', 550, -75);
      }
      else  if(team4===7){
        setPosition('pawn4', 550, -75);
      }
      else  if(team4===8){
        setPosition('pawn4', 550, -75);
      }
      else  if(team4===9){
        setPosition('pawn4', 550, -75);
      }
      else  if(team4===10){
        setPosition('pawn4', 550, -75);
      }
      else  if(team4===11){
        setPosition('pawn4', 550, -75);
      }
 
      }
            
        </script>
        
    <body>
    <img id="boardImg" src="../grafika/plansza.png" alt="bład ładowania planszy">
    <!-- <button id="ShowAdm" >
 
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
        <br> -->

    <!-- </div>  -->
     <div class="team" id="team1">
        <h2 id="nazwa1">Drużyna 1</h2>
        <p>ptk: <h3 id="score1">-</h3></p>
      </div>
      <div class="team" id="team2">
        <h2 id="nazwa2">Drużyna 2</h2>
        <p>ptk: <h3 id="score2">-</h3></p>
      </div>
      <div class="team" id="team3">
        <h2 id=nazwa3>Drużyna 3</h2>
        <p>ptk: <h3 id="score3">-</h3></p>
      </div>
      <div class="team" id="team4">
        <h2 id="nazwa4">Drużyna 4</h2>
        <p>ptk: <h3 id="score4">-</h3></p>
      </div> 
    <div id="board">
      <div class="pawn" id="pawn4"><img src="../grafika/pawn1.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>  <!-- Niebieski -->
      <div class="pawn" id="pawn3"><img src="../grafika/pawn2.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>  <!-- Zielony -->
      <div class="pawn" id="pawn1"><img src="../grafika/pawn3.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>  <!-- Czerwony -->
      <div class="pawn" id="pawn2"><img src="../grafika/pawn4.png" alt="debil AKA BRAKUJE ZDJĘĆ"></div>  <!-- Żólty -->
    </div>

</body>
</html>
