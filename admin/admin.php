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
    nr_druzyny = 1;
    flaga69 = 2;
    backup_if = false;
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
    var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/projekty/poma_v2/poma_v2/admin/update_ilosc_druzyn.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText); // Log the response from the backend
            }
        };
        xhr.send('ilosc_druzyn=' + ilosc_druzyn); // Send the team value as POST data
    for(let i=1;i<=ilosc_druzyn;i++){                                 //Pentla od nazw drużyn
    druzyny.push(prompt("Podaj nazwę drużyny "+ i, "Drużyna " +i))    //wprowadza dane do tablicy
}   
console.log(druzyny);
team = nr_druzyny;
var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/projekty/poma_v2/poma_v2/pytania/update_nr_druzyny.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Log the response from the backend
        }
    };
    xhr.send('team=' + team); // Send the team value as POST data

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
      nazwa_teamD: naz_druz4,
      flaga69:flaga69,}
     
      console.log('Form data:', nazwy_druzyn); // Log the data to the console

// Connect to WebSocket and send form data
const socket = new WebSocket('ws://localhost:3000/ws');

// Wait for the WebSocket connection to open
socket.onopen = () => {
    socket.send(JSON.stringify(nazwy_druzyn));
    console.log('WebSocket connection opened. Nazwy drużyn sent.');
    wysylaniezero();
};

// Handle socket errors if needed
socket.onerror = (error) => {
    console.error(`WebSocket Error: ${error}`);
    
};
				};
if(eventstatus==1){
  alert("Konkurs się rozpoczął")
}}
};
	
function wysylaniezero(){
    const punkty = {
      team1: 0,
      team2: 0,
      team3: 0,
      team4: 0,};
      const socket = new WebSocket('ws://localhost:3000/ws');
      socket.onopen = () => {
    socket.send(JSON.stringify(punkty));
    console.log('ZERÓWKI SEND');

};
}



function stopevent(){
  if(eventstatus==1){
  if(confirm("Czy na pewno chcesz przerwać konkurs zakończyć konkurs")==true){ //Prosty if żeby nie było missclicków
  eventstatus=undefined;//USTAWIENIA NA undefined 
  druzyny.length = 0 // CZYSZCZENIE TABLICY
  nr_druzyny=1;
teamA=0;
teamB=0;
teamC=0;
teamD=0;
flagaA3=0;
flagaB3=0;
flagaC3=0;
flagaD3=0;
 

  
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
            stopTimer();
        console.log('Clearing now');
        timerValue = 30;
        sendTimerData(timerValue);
        // Perform basic form validation
        if (backup_if == true){
            console.log("backup, punkty i kategoria");
            backup_if = false;
        }
        else{
            selectedSubject = document.querySelector('input[name="subject"]:checked');
            selectedPoints = document.querySelector('input[name="points"]:checked');
        }

        selectedTeam  = nr_druzyny;
            
        var punkty234=0;
            
            
        // console.log(selectedSubject.value)
        if(selectedSubject.value=='bonus'){
            punkty234 = 3; //takie coś że jak jest bunus to jest cacy
            if(nr_druzyny==1){
                nr_druzyny =ilosc_druzyn;
            }
            else{
                nr_druzyny=nr_druzyny-1;
            }   
            selectedTeam  = nr_druzyny;
          
            console.log(punkty234)
        }
        if(selectedSubject.value !== 'bonus'){
                if (backup_if == true){
                    punkty234=selectedPoints;
                    backup_if = false;
                }
                else{
                    punkty234=selectedPoints.value;
                }
            }
        console.log(punkty234)
        if (!selectedSubject || !punkty234) {  // ten if nie działa bo coś popsulem XD
            alert('Please select both a subject and points');
            return;
        }

        // If validation passes, log the form data
        const formData = {
            subject: selectedSubject.value,
            points: punkty234,
            team:   selectedTeam,
        }
        console.log("nr_druzyny_przed: " + nr_druzyny);
        nr_druzyny=nr_druzyny+1;
        
        if(nr_druzyny<ilosc_druzyn+1){
        }else{
            nr_druzyny=1;
        }
        console.log("nr_druzyny_po: " + nr_druzyny);
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
    function backup(){
        eventstatus = 1;
        const backupData = {
        action: 'backup',
    };
        // Connect to WebSocket and send form data
        const socket = new WebSocket('ws://localhost:3000/ws');

        // Wait for the WebSocket connection to open
        socket.onopen = () => {
            socket.send(JSON.stringify(backupData));
            console.log('WebSocket connection opened. Form data sent.');
        };

        // Handle socket errors if needed
        socket.onerror = (error) => {
            console.error(`WebSocket Error: ${error}`);
        };
        var xhr2 = new XMLHttpRequest();
        xhr2.onreadystatechange = function() {
            if (xhr2.readyState == 4 && xhr2.status == 200) {
                var data = JSON.parse(xhr2.responseText);
                // Handle the received data here
                data.forEach(function(row) {
                    console.log("Kategoria: " + row.kategoria);
                    console.log("Poziom: " + row.poziom);
                    console.log("Ilosc druzyn: " + row.ilosc_druzyn); 
                    console.log("Nr Druzyny: " + row.nr_druzyny);
                    console.log("Img Odpowiedzi: " + row.img_odpowiedzi);
                    console.log("Img Pytania: " + row.img_pytania);
                    console.log("Media: " + row.media);
                    console.log("Media Typ: " + row.media_typ);
                    console.log("Stan: " + row.stan);
                    console.log("\n");
                    nr_druzyny = parseInt(row.nr_druzyny);
                    points = parseInt(row.poziom);
                    ilosc_druzyn = parseInt(row.ilosc_druzyn);
                    selectedPoints = points;
                    selectedSubject = row.kategoria;
                    if (row.stan == "clear"){
                        nr_druzyny ++;
                        if(nr_druzyny<ilosc_druzyn+1){
                        }else{
                            nr_druzyny=1;
                        }
                        document.getElementById('correctBtn').disabled = true;
                        document.getElementById('incorrectBtn').disabled = true;

                        document.getElementById('answerButtons').style.display = 'none'; // Hide the buttons
                        
                        document.getElementById('mainBtn').disabled = false;
                    }
                    else if (row.stan == "pytanie"){
                        backup_if = true;
                        showSecondaryBtn();
                    }
                    else if (row.stan == "odpowiedz"){
                        backup_if = true;
                        document.getElementById('answerButtons').style.display = 'block';
                        document.getElementById('secondaryBtn').style.display = 'none';

                        // Enable buttons
                        document.getElementById('correctBtn').disabled = false;
                        document.getElementById('incorrectBtn').disabled = false;
                    }
                    else if (row.stan == "done"){
                        nr_druzyny ++;
                        if(nr_druzyny<ilosc_druzyn+1){
                        }else{
                            nr_druzyny=1;
                        }
                        document.getElementById('correctBtn').disabled = true;
                        document.getElementById('incorrectBtn').disabled = true;

                        document.getElementById('answerButtons').style.display = 'none'; // Hide the buttons
                        
                        document.getElementById('mainBtn').disabled = false;
                    }
                });
            }
        };
        xhr2.open("GET", "http://localhost/projekty/poma_v2/poma_v2/pytania/get_data.php", true);
        xhr2.send();

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);

                // Define the object containing all the variables
                const nazwy_druzyn = {
                    nazwa_teamA: data[0] ? (data[0].nazwa !== null && data[0].nazwa.trim() !== "" ? data[0].nazwa : undefined) : '-', // Check if data[0] exists
                    nazwa_teamB: data[1] ? (data[1].nazwa !== null && data[1].nazwa.trim() !== "" ? data[1].nazwa : undefined) : '-', // Check if data[1] exists
                    nazwa_teamC: data[2] ? (data[2].nazwa !== null && data[2].nazwa.trim() !== "" ? data[2].nazwa : undefined) : '-', // Check if data[2] exists
                    nazwa_teamD: data[3] ? (data[3].nazwa !== null && data[3].nazwa.trim() !== "" ? data[3].nazwa : undefined) : '-'  // Check if data[3] exists
                };



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

                teamA = parseInt(data[0].punkty);
                teamB = parseInt(data[1].punkty);
                teamC = parseInt(data[2].punkty);
                teamD = parseInt(data[3].punkty);
                flagaA3=0;
                flagaB3=0;
                flagaC3=0;
                flagaD3=0;

                wysylanie(0,0,0,0,flagaA3,flagaB3,flagaC3,flagaD3); 
                wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3); }
        };
        xhr.open("GET", "http://localhost/projekty/poma_v2/poma_v2/admin/get_data2.php", true);
        xhr.send();
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

function clearAll() {
    // Log that the secondary button is clicked
    stopTimer();
    console.log('Clearing now');
    timerValue = 30;
    sendTimerData(timerValue);
    
    const clearBtnData = {
        action: 'clearAll',
    };

        // Connect to WebSocket and send form data
        const socket = new WebSocket('ws://localhost:3000/ws');

        // Wait for the WebSocket connection to open
        socket.onopen = () => {
            socket.send(JSON.stringify(clearBtnData));
            console.log('WebSocket connection opened. Form data sent.');
        };

        // Handle socket errors if needed
        socket.onerror = (error) => {
            console.error(`WebSocket Error: ${error}`);
        };
}

function playMedia() {
    const playMedia = {
        action: 'playMedia',
    };

        // Connect to WebSocket and send form data
        const socket = new WebSocket('ws://localhost:3000/ws');

        // Wait for the WebSocket connection to open
        socket.onopen = () => {
            socket.send(JSON.stringify(playMedia));
            console.log('WebSocket connection opened. Form data sent.');
        };

        // Handle socket errors if needed
        socket.onerror = (error) => {
            console.error(`WebSocket Error: ${error}`);
        };
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
            console.log(isCorrect);
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
<!-- Styls -->
<style>
        body {
            height: 100%;
            /* background-color: black; */
            background-image: url("../grafika/spikes.jpg");
            /* color: white; Set the default text color to white */
            overflow: hidden;
            /* font-family: jah; */
            /* font-size: 16pt; */
            display: flex;
        }
        #panets {
            display: flex;
            width: 40%;
            align-items: center;
            flex-direction: column;
            margin-top: 30vh;
        }
        #panets button {
            margin-top: 1vh;
        }
        form {
            margin-top: 2%;
            margin-bottom: 2%;
            padding: 2%;
            background-color: whitesmoke;
            height: 96vh;
            width: 50%;
            margin: 1%;
            border: 1.5px solid lightgray;
            border-radius: 10px;
        }

        .alsoradio {
            margin-top: 10px;
        }
        
        .delblur {
            filter: blur(0px);
            -webkit-filter: blur(0px);
        }
    </style>
<body>
    <style>
        #tekscik{
            font-size: 100px;
            color: #C44B6C;
            font-weight: bold;

        }
    </style>
<div id=panets>
<!-- DIV OD PANELU OD STARTU KONKUSU i KOŃCA KONKUSU -->
<button type="button" class="btn btn-success" onclick="startevent()">Start konkursu</button><br><!-- Start konkursu możesz wpierdolić do panel sterowania JS tworzenie drużyn + zmiana eventstatus na 1 -->
    <button type="button" class="btn btn-danger" onclick="stopevent()">Stop konkurs (II tura,III tura,Restart Konkursu)</button> <br><!-- Stop,Restart JS ZEROWANIE DRUŻYN i evantstatus 0 -->
    <button type="button" class="btn btn-info" onclick="sprawdzstan()">Szybki teśki jaki stan konkursu</button> </br><!-- Przycisk test stanu eventstatus -->
    <button type="button" class="btn btn-danger" onclick="punktyOT()">overtime go punkty</button> <br>
    <button type="button" class="btn btn-warning" onclick="jaktonazwac()">USTAWIANIE OVERTIMAJM NA PYTANIACH !!!!!!!!!!!! TRZEBA DAĆ TO PRZED WYSŁANIEM DRUŻYN !!!!!!!!!!!!!!! </button>
    <button type="button" class="btn btn-info" onclick="chcetoskonczyc()" >ZEROWANIE TEGO SYFIKU(CENZURA BO TAK NIE WOLNO) (BONUSY DZIAŁAJĄ)!!!!!!!!!!!!! TRZEBA DAĆ TO PRZEDDDD WYSŁANIEM DRUŻYN !!!!!!!!!!!!!!!</button><br>
    <button type="button" class="btn btn-warning" onclick="backup()">BACKUP</button>

<!-- Dwa moje przyciski - zbędne -->
    <!-- <button type="button" class="btn btn-dark" onclick="status1()">Ustawianie stutsu na włączony (gdyby jakiś debil nie wyłączył konkurs)</button> </br> -->
    <!-- <button type="button" class="btn btn-dark" onclick="status0()">Przycik ustawiający status na wyłączony</button> -->
 
</div>
<script>
function chcetoskonczyc(){ //mental 100 fikoł
//projekt nie życie 😎😎😥😥🤣💀❤️😊😁😁😁😢😢👍👍👍😍😥😢😢🤣(^///^)☆*: .｡. o(≧▽≦)o .｡.:*☆☆*: .｡. o(≧▽≦)o .｡.:*☆):☆*: .｡. o(≧▽≦)o .｡.:*☆☆*: .｡. o(≧▽≦)o .｡.:*☆^_^^_^:-()
flaga69=0
}</script>
<script>

    function jaktonazwac(){
        flaga69=1
    }
</script>
<script>
 function  wysputot(){ // overtajm drużyny go

 }
 function punktyOT(){
    const pozdrowWuja = {

punktyA: teamA,
punktyB: teamB,

                    };
  
  console.log('punkty do OT:', pozdrowWuja,"PISZE to na pbd"); // Log the data to the console

// Connect to WebSocket and send form data
const socket = new WebSocket('ws://localhost:3000/ws');

// Wait for the WebSocket connection to open
socket.onopen = () => {
socket.send(JSON.stringify(pozdrowWuja));
console.log('POZDRÓW KUSTOSZA W HAŁCNOWIE i JEDNORENKIEGO BANDYTE'); // kustosz- ranka proboszcza parafii
};

// Handle socket errors if needed
socket.onerror = (error) => {
console.error(`WebSocket Error: ${error}`);
};


 }
</script>
<!-- frms -->
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
            <div class="form-check">
                <input type="radio" class="form-check-input" id="bonus" name="subject" value="bonus">
                <label class="form-check-label" for="bonus">bonus</label>
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
        <!-- <div class="form-group">
        <label for="points"><b>Ilość punktów:</b></label>
        <div class="btn-group" role="group">
            <div class="form-check">
  <input class="form-check-input" type="checkbox" id="points1" name="points" value="1">
  <label class="form-check-label" for="flexCheckDefault">
    1
  </label>
            </div>

            <div class="form-check">
  <input class="form-check-input" type="checkbox" id="points2" name="points" value="2">
  <label class="form-check-label" for="flexCheckDefault">
    2
  </label>
            </div>
</div>
</div> -->
<hr>
<div>
    
    <!-- <p>JEŚLI CHCESZ WYSŁAĆ DOBRZE TO MUSISZ DAĆ TEAM KOLEJNOŚCIĄ ROSNĄCĄ!!!!! np. Team 2,Team 4<p>
</div>
<label for="cars">Wybierz team 1 do dogrywki:</label>
  <select name="cars" id="team">
    <option value="1">TEAM 1 </option>
    <option value="2"> TEAM 2 </option>
    <option value="3"> TEAM 3 </option>
    <option value="4"> TEAM 4 </option>

  </select>
  <br><br>

  <label for="cars">Wybierz team 2 do dogrywki:</label>
  <select name="cars" id="team2">
    <option value="1">TEAM 1 </option>
    <option value="2"> TEAM 2 </option>
    <option value="3"> TEAM 3 </option>
    <option value="4"> TEAM 4 </option>

  </select> -->
  <!-- <br><br> -->
        
<button type="button" class="btn btn-light" onclick="pozdrowkustosza()">Rozpocznij dogrywkę </button>
<hr>
<p>Timer :</p>
        <button type="button" id="startBtn" class="btn btn-success" onclick="startTimer()">Start</button>
        <button type="button" id="stopBtn" class="btn btn-danger" onclick="stopTimer()" disabled>Stop</button>
        <button type="button" id="resetBtn" class="btn btn-warning" onclick="resetTimer()">Reset</button>
        <button type="button" class="btn btn-info" id="dodatkowyCzas"  onclick="dodatkowyczas()"  disabled>Dodatkowy Czas</button>
        <br>
        <hr>
        <button type="button" class="btn btn-primary" id="mainBtn" onclick="submitForm(nr_druzyny)">Wyświetl</button>
        <button type="button" class="btn btn-dark" id="clearBtn" onclick="clearAll()">Wyczyść wszystko</button>
        <button type="button" class="btn btn-secondary" id="playBtn" onclick="playMedia()">Start/Stop media</button>
        <br><br>
        <button type="button" class="btn btn-secondary" id="secondaryBtn" style="display: none;" onclick="showAnswerButtons()">Pokaż odpowiedź</button>

        <br><br>
        <div id="answerButtons" style="display: none;">
            <button type="button" id="correctBtn" class="btn btn-success"   onclick="handleAnswer(true)">Dobra odpowiedź</button>
            <button type="button" id="incorrectBtn" class="btn btn-danger" onclick="handleAnswer(false)">Zła odpowiedź</button>
        </div>
    </form>
    


    <div id="response"></div>

    <script>

// var myButton = document.getElementById('correctBtn');

// // Dodaj nasłuchiwanie zdarzenia kliknięcia
// // myButton.onclick = handleAnswer(isCorrect);
// myButton.onclick = function(){
//     // handleAnswer();
//     punktyplansza(ilosc_druzyn,nr_druzyny)
// }
function pozdrowkustosza(){

    nazwaA=druzyny[0]
    nazwaB=druzyny[1]
    console.log(nazwaA,nazwaB)
    wysylawieovertime(nazwaA,nazwaB)
}
function wysylawieovertime(nazwaA,nazwaB){
            const nazwy = {

    nazwaA: nazwaA,
    nazwaB: nazwaB,
 
                        };
      
      console.log('nazwy:', nazwy,"*"); // Log the data to the console

// Connect to WebSocket and send form data
const socket = new WebSocket('ws://localhost:3000/ws');

// Wait for the WebSocket connection to open
socket.onopen = () => {
    socket.send(JSON.stringify(nazwy));
    console.log('POZDRÓW KUSTOSZA W HAŁCNOWIE');
};

// Handle socket errors if needed
socket.onerror = (error) => {
    console.error(`WebSocket Error: ${error}`);
};
        }






function punktyplansza(ilosc_druzyn,nr_druzyny,isCorrect)
{

if (backup_if == true){
        console.log("backup, punkty i kategoria");
        if(selectedSubject.value =='bonus'){
        points=3;
        }else{
            points = selectedPoints;
        }
    }
    else{
        selectedSubject = document.querySelector('input[name="subject"]:checked');
        selectedPoints = document.querySelector('input[name="points"]:checked');
        if(selectedSubject.value =='bonus'){
        points=3;
        }else{
            points = Number(selectedPoints.value);
        }
    }

    
    
    console.log(backup_if);
    if(backup_if == true){
        nr_druzyny=nr_druzyny+1;
        if(nr_druzyny<ilosc_druzyn+1){
        }else{
            nr_druzyny=1;
        }
        numer_druzyny=nr_druzyny;
        console.log("backup activated for nr_druzyny");
        backup_if = false;
    }
    else{
        numer_druzyny=nr_druzyny;
        console.log("backup NOT activated for nr_druzyny");
    }
    console.log("Pooints:",points);
  
  
if(ilosc_druzyn==2 && isCorrect==true)
  {
    if(numer_druzyny==2){
      teamA=teamA+points}
      if(numer_druzyny==1){
      teamB=teamB+points}
  }
  else if(ilosc_druzyn==2 && nr_druzyny==1&& isCorrect==true && punkty234==3){
    teamB=teamB+3;
  }
  
  if (isCorrect == true && ilosc_druzyn == 3) {
        if (numer_druzyny == 2) {
            teamA = teamA + points
        }
        if (numer_druzyny == 3) {
            teamB = teamB + points
        }
        if (numer_druzyny == 1) {
            teamC = teamC + points
        }
    }
  
  if(isCorrect==true && ilosc_druzyn==4){
         if(numer_druzyny==2){
      teamA=teamA+points}  
        if(numer_druzyny==3){
      teamB=teamB+points}
        if(numer_druzyny==4){
      teamC=teamC+points;}
        if(numer_druzyny==1){
      teamD=teamD+points}}

            if(teamA==8 ){
                wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
                setTimeout(() => {
                    teamA++;
                flagaA3++;
                 wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
}, 5000); 

            }
          else if(teamB==8 ){
            wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
                setTimeout(() => {
                    teamB++;
                flagaB3++;
                 wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
}, 5000); 
            }
       else    if(teamC==8){
        wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
                setTimeout(() => {
                    teamC++;
                flagaC3++;
                 wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
}, 5000); 
            }
      else    if(teamD==8){
        wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
                setTimeout(() => {
                    teamD++;
                flagaD3++;
                 wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3) 
}, 5000); 
                
            }

            punktyOT()
                wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3)


    // wysylanie(teamA,teamB,teamC,teamD);
    // wysylanie2(team1,team2,team3,team4);
    // powerup(teamA,teamB,teamC,teamD)

  console.log("ilość punktów wybrana:"+points+", numer druzyny:"+numer_druzyny)
  console.log("ILOŚĆ PUNKTÓW KAŻDY TEAM")
  console.log("DRUŻYNA 1:"+teamA)
  console.log("DRUŻYNA 2:"+teamB)
  console.log("DRUŻYNA 3:"+teamC)
  console.log("DRUŻYNA 4:"+teamD)

}
    var flagaA3=0;
    var flagaB3=0;
    var flagaC3=0;
    var flagaD3=0;
    function powerup(teamA,teamB,teamC,teamD){
            if(teamA==8 ){
                teamA++;
                flagaA3++;
                // wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3)
            }
           if(teamB==8 ){
                teamB++
                flagaB3++;
                // wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3)
            
            }
           if(teamC==8){
                teamC++
                flagaC3++;
                // wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3)
            }
          if(teamD==8){
                teamD++;
                flagaD3++;
                // wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3)
                
            }
       
                wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3)
                
            
//             console.log("ILOŚĆ PUNKTÓW KAŻDY TEAM")
//   console.log("DRUŻYNA 1:"+teamA)
//   console.log("DRUŻYNA 2:"+teamB)
//   console.log("DRUŻYNA 3:"+teamC)
//   console.log("DRUŻYNA 4:"+teamD)
        
        }
     
        
        function wysylanie(teamA,teamB,teamC,teamD,flagaA3,flagaB3,flagaC3,flagaD3){
            const punkty = {
    team1: teamA,
    team2: teamB,
    team3: teamC,
    team4: teamD,
    flagaA3:flagaA3,
    flagaB3:flagaB3,
    flagaC3:flagaC3,
    flagaD3:flagaD3,

                        };
      
      console.log('Punkty:', punkty); // Log the data to the console

// Connect to WebSocket and send form data
const socket = new WebSocket('ws://localhost:3000/ws');

// Wait for the WebSocket connection to open
socket.onopen = () => {
    socket.send(JSON.stringify(punkty));
    console.log('przesłane do serwera punkty');
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