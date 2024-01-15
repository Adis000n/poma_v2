<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Mechaniczna Pomarańcza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="panets.js"></script> -->
    <script>
    let flaga=0;
    let nr_druzyny = 1;
    var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.7.1.min.js'; // Check https://jquery.com/ for the current version
document.getElementsByTagName('head')[0].appendChild(script);
const druzyny=[]; //tablica druzyny

var eventstatus //TUTAJ JEST TENTEGES ŻE JEST FLAGA OD TEGO CZY JEST WŁĄCZONE - 1 CZY WYŁĄCZONE - 0 
function status1(){
  eventstatus=1;
}
function status0(){
  eventstatus=0;
}
startevent:function startevent() { //funkcja która działa po naciścięciu start konkursu

  if(eventstatus==1){
    alert("Konkurs już aktywny")
  }
else{
 // console.log(eventstatus)  
// alert("TWOJA DUPA W HANNOWERZE OPIERDALA 4 WIERZE"); //taki żarcik 😊
    ilosc_druzyn=Number(prompt("Podaj liczbe druzyn min 2 max 4)",4)) // PROMPT do podania liczby druzyn
    for(let i=1;i<=ilosc_druzyn;i++){                                 //Pentla od nazw drużyn
    druzyny.push(prompt("Podaj nazwę drużyny "+ i, "Drużyna " +i))    //wprowadza dane do tablicy
}   
console.log(druzyny)

if(confirm("Czy na pewno chcesz kontynuować?") == true ){
  eventstatus=1                 //przypisywanie do eventstatus jeden że konkurs aktywny
  let naz_druz1=druzyny[0];
  let naz_druz2=druzyny[1];
  let naz_druz3=druzyny[2];
  let naz_druz4=druzyny[3];
  const nazwy_druzyn = {
      nazwa_teamA: naz_druz1,
      nazwa_teamB: naz_druz2,
      nazwa_teamC: naz_druz3,
      nazwa_teamD: naz_druz4,}
     
      console.log('Form data:', nazwy_druzyn); // Log the data to the console

// Connect to WebSocket and send form data
const socket = new WebSocket('ws://localhost:3000/ws');

// Wait for the WebSocket connection to open
socket.onopen = () => {
    socket.send(JSON.stringify(nazwy_druzyn));
    console.log('WebSocket connection opened. Nazwy drużyn sent.');
};

// Handle socket errors if needed
socket.onerror = (error) => {
    console.error(`WebSocket Error: ${error}`);
};
				};
if(eventstatus==1){
  alert("Konkurs się rozpoczą")
}}
};
	




function stopevent(){
  if(eventstatus==1){
  if(confirm("Czy na pewno chcesz przerwać konkurs zakończyć konkurs")==true){ //Prosty if żeby nie było missclicków
  eventstatus=undefined;//USTAWIENIA NA undefined 
  druzyny.length = 0 // CZYSZCZENIE TABLICY
  nr_druzyny=1;
  $(document).ready(function() {
   // AJAX request to send data to PHP
    //  var url = 'admin.php?query=stopevent';
    //   var recordId =[1,2,3,4];
    //   $.ajax({
    //     url: url,
    //     type: 'POST',
    //     data: { ids: recordId },
    //     success: function(response) {
    //         console.log('Data sent successfully to PHP1');
    //     },
    //     error: function(xhr, status, error) {
    //         console.error('Error sending data to PHP');
    //     }
    // });
});

  
  alert("Udało Ci się zrestartować konkurs")} //alert sukces
  else{ 
    alert("Konkurs dalej trwa") // jęzeli ktoś nacinie anuluj
  }
}else{
  alert("Konkurs nie trwa (XD)") 
}
}
function sprawdzstan(){
  if(eventstatus==1){
    alert("Konkurs aktywny")
  }
  else{
    alert("Konkurs nie jest aktywny")
  }
}
     
        
        let timerInterval;
        let timerValue = 30; // Initialize timerValue
        let timerRunning = false;

        function submitForm() {
        // Perform basic form validation
        var selectedSubject = document.querySelector('input[name="subject"]:checked');
        var selectedPoints = document.querySelector('input[name="points"]:checked');
        var selectedTeam  = nr_druzyny;
        if (!selectedSubject || !selectedPoints) {
            alert('Please select both a subject and points');
            return;
        }

        // If validation passes, log the form data
        const formData = {
            subject: selectedSubject.value,
            points: selectedPoints.value,
            team:   selectedTeam,
        };
        nr_druzyny=nr_druzyny+1;
        if(nr_druzyny<ilosc_druzyn+1){
        }else{
            nr_druzyny=1;
        }
        console.log('Form data:', formData); // Log the data to the console

        // Connect to WebSocket and send form data
        const socket = new WebSocket('ws://localhost:3000/ws');

        // Wait for the WebSocket connection to open
        socket.onopen = () => {
            socket.send(JSON.stringify(formData));
            console.log('WebSocket connection opened. Form data sent.');
        };

        // Handle socket errors if needed
        socket.onerror = (error) => {

            console.error(`WebSocket Error: ${error}`);
        };
        showSecondaryBtn();
    }
    // console.log(nr_druzyny)
    function showAnswerButtons() {
    // Log that the secondary button is clicked
    console.log('Secondary button clicked');
    
    // You can send additional data or perform other actions here

    // Example: sending a message to the server
    const secondaryBtnData = {
        action: 'secondaryBtnClicked',
    };


        // Connect to WebSocket and send form data
        const socket = new WebSocket('ws://localhost:3000/ws');

        // Wait for the WebSocket connection to open
        socket.onopen = () => {
            socket.send(JSON.stringify(secondaryBtnData));
            console.log('WebSocket connection opened. Form data sent.');
        };

        // Handle socket errors if needed
        socket.onerror = (error) => {
            console.error(`WebSocket Error: ${error}`);
        };
    // Display the answer buttons container
    document.getElementById('answerButtons').style.display = 'block';
    document.getElementById('secondaryBtn').style.display = 'none';

    // Enable buttons
    document.getElementById('correctBtn').disabled = false;
    document.getElementById('incorrectBtn').disabled = false;
}


    function showSecondaryBtn() {
            document.getElementById('secondaryBtn').style.display = 'block';
           
            document.getElementById('mainBtn').disabled = true;
        }

        function sendTimerData(timerValue) {
            const formData2 = {
                timer: timerValue,
            };

            const socket = new WebSocket('ws://localhost:3000/ws');

            socket.onopen = () => {
                socket.send(JSON.stringify(formData2));
                console.log('WebSocket connection opened. Timer data sent.');
            };

            socket.onerror = (error) => {
                console.error(`WebSocket Error: ${error}`);
            };
        }

        function startTimer() {
            if (!timerRunning && timerValue > 0) {
                timerRunning = true;
                disableButtons(); // Disable buttons when the timer is running
                timerInterval = setInterval(() => {
                    if(flaga==1){timerValue=timerValue+16
                    flaga=flaga-1}
                    timerValue -= 1;
                    sendTimerData(timerValue);
                    
                    if (timerValue === 0) {
                        stopTimer();
                    }
                }, 1000);
            }
            document.getElementById('dodatkowyCzas').disabled = false;
        }

        function stopTimer() {
            clearInterval(timerInterval);
            timerRunning = false;
            enableButtons(); // Enable buttons when the timer is stopped
        }

        function resetTimer() {
            // document.getElementById('dodatkowyCzas').disabled=false;
            if (!timerRunning) {
                enableButtons(); // Enable buttons when the timer is reset
                sendTimerData(0);
                timerValue = 30;
                sendTimerData(timerValue);
            }
        }

        function disableButtons() {
            document.getElementById('startBtn').disabled = true;
            document.getElementById('stopBtn').disabled = false;
            document.getElementById('resetBtn').disabled = true;
        }

        function enableButtons() {
            document.getElementById('startBtn').disabled = false;
            document.getElementById('stopBtn').disabled = true;
            document.getElementById('resetBtn').disabled = false;
        }

        function handleAnswer(isCorrect) {
            console.log(isCorrect)
             // Log the answer to the console (you can send it to the server here)
    console.log('Answer:', isCorrect ? 'Correct' : 'Incorrect');

    // Disable buttons after the user makes a selection
    document.getElementById('correctBtn').disabled = true;
    document.getElementById('incorrectBtn').disabled = true;

    document.getElementById('answerButtons').style.display = 'none'; // Hide the buttons
    
    document.getElementById('mainBtn').disabled = false;

    // Send the answer to the server
    sendAnswer(isCorrect);
    punktyplansza(ilosc_druzyn,nr_druzyny,isCorrect);
}

function sendAnswer(isCorrect) {
    // You can send the answer data to the server here
    const answerData = {
        isCorrect: isCorrect,
    };

    const socket = new WebSocket('ws://localhost:3000/ws');

    socket.onopen = () => {
        socket.send(JSON.stringify(answerData));
        console.log('WebSocket connection opened. Answer data sent.');
    };
    
    socket.onerror = (error) => {
        console.error(`WebSocket Error: ${error}`);
    };
}
    let teamA=0;
    let teamB=0;
    let teamC=0;
    let teamD=0;
    </script>
</head>
<body>
<div id=panets>
<!-- DIV OD PANELU OD STARTU KONKUSU i KOŃCA KONKUSU -->
    <button type="button" class="btn btn-success" onclick="startevent()">Start konkursu</button><br><!-- Start konkursu możesz wpierdolić do panel sterowania JS tworzenie drużyn + zmiana eventstatus na 1 -->
    <button type="button" class="btn btn-danger" onclick="stopevent()">Stop konkurs (II tura,III tura,Restart Konkursu)</button> <br><!-- Stop,Restart JS ZEROWANIE DRUŻYN i evantstatus 0 -->
    <button type="button" class="btn btn-info" onclick="sprawdzstan()">Szybki teśki jaki stan konkursu</button> </br><!-- Przycisk test stanu eventstatus -->
<!-- Dwa moje przyciski - zbędne -->
    <button type="button" class="btn btn-dark" onclick="status1()">Ustawianie stutsu na włączony (gdyby jakiś debil nie wyłączył konkurs)</button> </br>
    <button type="button" class="btn btn-dark" onclick="status0()">Przycik ustawiający status na wyłączony</button>
 
</div>
    <form id="quizForm" method="post" action="/submitForm">
        <div class="form-group">
            <label for="subject"><b>Kategoria:</b></label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="chemia" name="subject" value="chemia">
                <label class="form-check-label" for="chemia">Chemia</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="informatyka" name="subject" value="informatyka">
                <label class="form-check-label" for="informatyka">Informatyka</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="fizyka" name="subject" value="fizyka">
                <label class="form-check-label" for="fizyka">Fizyka</label>
            </div>
            <div class="form-check">
            <input type="radio" class="form-check-input" id="matematyka" name="subject" value="matematyka">    
            <label class="form-check-label" for="matematyka">Matematyka</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="technika" name="subject" value="technika">
                <label class="form-check-label" for="technika">Technika</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="niespodzianka" name="subject" value="niespodzianka">
                <label class="form-check-label" for="niespodzianka">Niespodzianka</label>
            </div>
        </div>

        <div class="form-group">
            <label for="points"><b>Ilość punktów:</b></label>
            <div class="form-check alsoradio">
                <input type="radio" class="form-check-input" id="points1" name="points" value="1">
                <label class="form-check-label" for="points1">1</label>
            </div>
            <div class="form-check alsoradio">
                <input type="radio" class="form-check-input" id="points2" name="points" value="2">
                <label class="form-check-label" for="points2">2</label>
            </div>
        </div>
        <p>Timer:</p>
        <button type="button" id="startBtn" class="btn btn-success" onclick="startTimer()">Start</button>
        <button type="button" id="stopBtn" class="btn btn-danger" onclick="stopTimer()" disabled>Stop</button>
        <button type="button" id="resetBtn" class="btn btn-warning" onclick="resetTimer()">Reset</button>
        <button type="button" class="btn btn-info" id="dodatkowyCzas"  onclick="dodatkowyczas()"  disabled>Dodatkowy Czas</button>
        <br>
        <hr>
        <button type="button" class="btn btn-primary" id="mainBtn" onclick="submitForm(nr_druzyny)">Wyświetl</button>
        <br><br>
        <button type="button" class="btn btn-secondary" id="secondaryBtn" style="display: none;" onclick="showAnswerButtons()">Pokaż odpowiedź</button>

        <br><br>
        <div id="answerButtons" style="display: none;">
            <button type="button" id="correctBtn" class="btn btn-success"   onclick="handleAnswer(true)">Dobra odpowiedź</button>
            <button type="button" id="incorrectBtn" class="btn btn-danger" onclick="handleAnswer(false)">Zła odpowiedź</button>
        </div>
    </form>
    

    <div id="response"></div>

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: black;
        }

        form {
            margin-top: 2%;
            padding: 2%;
            width: 90%;
            border: 1.5px solid lightgray;
            border-radius: 10px;
        }

        .alsoradio {
            margin-top: 10px;
        }
    </style>
    <script>

// var myButton = document.getElementById('correctBtn');

// // Dodaj nasłuchiwanie zdarzenia kliknięcia
// // myButton.onclick = handleAnswer(isCorrect);
// myButton.onclick = function(){
//     // handleAnswer();
//     punktyplansza(ilosc_druzyn,nr_druzyny)
// }

function punktyplansza(ilosc_druzyn,nr_druzyny,isCorrect)
{

    var selectedPoints = document.querySelector('input[name="points"]:checked');
  var points = Number(selectedPoints.value); console.log(points)
  var numer_druzyny=nr_druzyny;
if(ilosc_druzyn==2 && isCorrect==true)
  {
    if(numer_druzyny==2){
      teamA=teamA+points}
      if(numer_druzyny==1){
      teamB=teamB+points}
  }
  
  
  
  
  
  if(isCorrect==true && ilosc_druzyn==4){
         if(numer_druzyny==2){
      teamA=teamA+points}  
        if(numer_druzyny==3){
      teamB=teamB+points}
        if(numer_druzyny==4){
      teamC=teamC+points;}
        if(numer_druzyny==1){
      teamD=teamD+points}
}
    wysylanie();

//   console.log("ilość punktów wybrana:"+points+", numer druzyny:"+numer_druzyny)
  console.log("ILOŚĆ PUNKTÓW KAŻDY TEAM")
  console.log("DRUŻYNA 1:"+teamA)
  console.log("DRUŻYNA 2:"+teamB)
  console.log("DRUŻYNA 3:"+teamC)
  console.log("DRUŻYNA 4:"+teamD)

}
    function wysylanie(){
        const punkty = {
      team1: teamA,
      team2: teamB,
      team3: teamC,
      team4: teamD,};
      
      console.log('Punkty:', punkty); // Log the data to the console

// Connect to WebSocket and send form data
const socket = new WebSocket('ws://localhost:3000/ws');

// Wait for the WebSocket connection to open
socket.onopen = () => {
    socket.send(JSON.stringify(punkty));
    console.log('JEST TO WYSŁANE DO CHUJ WIE CZEGO.');
};

// Handle socket errors if needed
socket.onerror = (error) => {
    console.error(`WebSocket Error: ${error}`);
};
    
    }
    function dodatkowyczas(){
document.getElementById('dodatkowyCzas').disabled=true;
flaga=1;
const flaga1 = {
      flaga1: flaga,};
      
      console.log('flaga:', flaga1); // Log the data to the console

// Connect to WebSocket and send form data
const socket = new WebSocket('ws://localhost:3000/ws');

// Wait for the WebSocket connection to open
socket.onopen = () => {
    socket.send(JSON.stringify(flaga1));
    console.log('Dodatkowy Czas send to server');
};

// Handle socket errors if needed
socket.onerror = (error) => {
    console.error(`WebSocket Error: ${error}`);
};
 

}

    </script>
</body>
</html>