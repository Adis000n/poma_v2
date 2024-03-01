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
        <!-- <link rel="stylesheet" href="stylkjg6.css"> -->
        <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
      </head>
<script>
  tylko_dwie = false;
  tylko_trzy = false;
      document.addEventListener('DOMContentLoaded', () => {
      const ws = new WebSocket('ws://192.168.55.113:3000/ws');

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
         
        //  function wujekplay(team1,team2,team3,team4){
    if(team1 >= 11|| team2 >=11||team3 >=11||team4 >=11){
        // wujekSound.play();
        const duration = 15 * 1000,
  animationEnd = Date.now() + duration,
  defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

function randomInRange(min, max) {
  return Math.random() * (max - min) + min;
}

const interval = setInterval(function() {
  const timeLeft = animationEnd - Date.now();

  if (timeLeft <= 0) {
    return clearInterval(interval);
  }

  const particleCount = 50 * (timeLeft / duration);

  // since particles fall down, start a bit higher than random
  confetti(
    Object.assign({}, defaults, {
      particleCount,
      origin: { x: randomInRange(0.1, 0.5), y: Math.random() - 0.2 },
    })
  );
  confetti(
    Object.assign({}, defaults, {
      particleCount,
      origin: { x: randomInRange(0.5, 0.9), y: Math.random() - 0.2 },
    })
  );
}, 250);


        }

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
  if(nazwa_teamC == undefined){
    const contentDiv5 = document.getElementById('nazwa1');
        contentDiv5.innerHTML =  nazwa_teamA ;
        tylko_dwie = true;
        const contentDiv6 = document.getElementById('nazwa2');
        contentDiv6.innerHTML =  nazwa_teamB ;
  }
  if(nazwa_teamD == undefined){
    const contentDiv5 = document.getElementById('nazwa1');
        contentDiv5.innerHTML =  nazwa_teamA ;
        tylko_trzy = true;
        const contentDiv6 = document.getElementById('nazwa2');
        contentDiv6.innerHTML =  nazwa_teamB ;
        if(tylko_dwie == false){
        const contentDiv7 = document.getElementById('nazwa3');
        contentDiv7.innerHTML =  nazwa_teamC ;
        }
  }
  else{
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
    const boardWidth = document.getElementById('board').offsetWidth;
    const boardHeight = document.getElementById('board').offsetHeight;

    const percentageX = (x / boardWidth) * 100;
    const percentageY = (y / boardHeight) * 100;

    element.style.left = percentageX + '%';
    element.style.top = percentageY + '%';
}

        
  var team1=0;
      pozycjonowanie1(team1);
  // Drużyna 1
      function pozycjonowanie1(team1){
        if(team1 ===0){
          document.getElementById('pawn1').querySelector('img').removeAttribute('hidden');
          document.getElementById('pawn1').style.boxShadow = '0 0 10px 20px rgba(0, 0, 0, 0.363)';
          setPosition('pawn1', 330, 330);
        }
        else if(team1===1){
        setPosition('pawn1',240, 328 );
      }
        else  if(team1===2){
          setPosition('pawn1',163, 328 );
      }
      else  if(team1===3){
        setPosition('pawn1',86, 328 );
      }
      else  if(team1===4){
        setPosition('pawn1',86, 250 );
      }
      else  if(team1===5){
        setPosition('pawn1',86, 172 );
      }
      else  if(team1===6){
        setPosition('pawn1',164, 172 );
      }
      else  if(team1===7){
        setPosition('pawn1',242, 172 );
      }
      else  if(team1===8){
        setPosition('pawn1',242, 94 );
      }
      else  if(team1===9){
        setPosition('pawn1',242, 20 );
      }
      else  if(team1===10){
        setPosition('pawn1',164, 20 );
      }
      else  if(team1>=11){
        setPosition('pawn1',66, 20 );
      }
    }
//druzyna 2
 function pozycjonowanie2(team2){       
      if(team2 ===0){
        document.getElementById('pawn2').querySelector('img').removeAttribute('hidden');
        document.getElementById('pawn2').style.boxShadow = '0 0 10px 20px rgba(0, 0, 0, 0.363)';
        setPosition('pawn2',430,330);
      }
      else if(team2===1){
        setPosition('pawn2',520, 328 );
      }
      else  if(team2===2){
        setPosition('pawn2',598, 328 );
      }
      else  if(team2===3){
        setPosition('pawn2',675, 328 );
      }
      else  if(team2===4){
        setPosition('pawn2',675, 250 );
      }
      else  if(team2===5){
        setPosition('pawn2',675, 172 );
      }
      else  if(team2===6){
        setPosition('pawn2',597, 172 );
      }
      else  if(team2===7){
        setPosition('pawn2',519, 172 );
      }
      else  if(team2===8){
        setPosition('pawn2',519, 94 );
      }
      else  if(team2===9){
        setPosition('pawn2',520, 20 );
      }
      else  if(team2===10){
        setPosition('pawn2', 598, 20);
      }
      else  if(team2>=11){
        setPosition('pawn2', 696, 20);
      }}
      function pozycjonowanie3(team3){
        if(team3 ===0){
          if(tylko_dwie==false){
            document.getElementById('pawn3').querySelector('img').removeAttribute('hidden');
          document.getElementById('pawn3').style.boxShadow = '0 0 10px 20px rgba(0, 0, 0, 0.363)';
          setPosition('pawn3',330, 430 );
          }
        }
        else if(team3===1){
          setPosition('pawn3',240, 432 );
      }
        else  if(team3===2){
          setPosition('pawn3',163, 432 );
      }
      else  if(team3===3){
        setPosition('pawn3',86, 432 );
      }
      else  if(team3===4){
        setPosition('pawn3',86, 510 );
      }
      else  if(team3===5){
        setPosition('pawn3',86, 588 );
      }
      else  if(team3===6){
        setPosition('pawn3',164, 588 );
      }
      else  if(team3===7){
        setPosition('pawn3',242, 588 );
      }
      else  if(team3===8){
        setPosition('pawn3',242, 666 );
      }
      else  if(team3===9){
        setPosition('pawn3',242, 740 );
      }
      else  if(team3===10){
        setPosition('pawn3',164, 740 );
      }
      else  if(team3>=11){
        setPosition('pawn3',66, 740 );
      }
      }
      function pozycjonowanie4(team4){
        if(team4===0){
          if( tylko_trzy==false){
            document.getElementById('pawn4').querySelector('img').removeAttribute('hidden');
          document.getElementById('pawn4').style.boxShadow = '0 0 10px 20px rgba(0, 0, 0, 0.363)';
          setPosition('pawn4',430, 430 );
          }
        }
        else if(team4===1){
          setPosition('pawn4',520, 432 );
      }
        else if(team4===2){
          setPosition('pawn4',597, 432 );
      }
      else if(team4===3){
        setPosition('pawn4',675, 432 );
      }
      else if(team4===4){
        setPosition('pawn4',675, 510 );
      }
      else if(team4===5){
        setPosition('pawn4',675, 588 );
      }
      else if(team4===6){
        setPosition('pawn4',597, 588 );
      }
      else if(team4===7){
        setPosition('pawn4',519, 588 );
      }
      else if(team4===8){
        setPosition('pawn4',519, 664 );
      }
      else if(team4===9){
        setPosition('pawn4',519, 740 );
      }
      else if(team4===10){
        setPosition('pawn4',598, 740 );
      }
      else if(team4>=11){
        setPosition('pawn4',696, 740 );;
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
        <h2 class="highb" id="tytul1">Drużyna 1:</h2>
        <h2 class="highb" id="nazwa1" style="color:cyan">-</h2>
        <p>pkt: <h1 class="highb" id="score1">-</h1></p>
      </div>
      <div class="team" id="team2">
        <h2 class="highb" id="tytul2">Drużyna 2:</h2>
        <h2 class="highb" id="nazwa2" style="color:red">-</h2>
        <p>pkt: <h1 class="highb" id="score2">-</h1></p>
      </div>
      <div class="team" id="team3">
        <h2 class="highb" id="tytul3">Drużyna 3:</h2>
        <h2 class="highb" id=nazwa3 style="color:yellow">-</h2>
        <p>pkt: <h1 class="highb" id="score3">-</h1></p>
      </div>
      <div class="team" id="team4">
        <h2 class="highb" id="tytul4">Drużyna 4:</h2>
        <h2 class="highb" id="nazwa4" style="color:green">-</h2>
        <p>pkt: <h1 class="highb" id="score4">-</h1></p>
      </div> 
    <div id="board">
      <div class="pawn" id="pawn4"><img src="../grafika/orange.png" alt="debil AKA BRAKUJE ZDJĘĆ" hidden></div>  <!-- Niebieski -->
      <div class="pawn" id="pawn3"><img src="../grafika/orange.png" alt="debil AKA BRAKUJE ZDJĘĆ" hidden></div>  <!-- Zielony -->
      <div class="pawn" id="pawn1"><img src="../grafika/orange.png" alt="debil AKA BRAKUJE ZDJĘĆ" hidden></div>  <!-- Czerwony -->
      <div class="pawn" id="pawn2"><img src="../grafika/orange.png" alt="debil AKA BRAKUJE ZDJĘĆ" hidden></div>  <!-- Żólty -->
    </div>

</body>
</html>
