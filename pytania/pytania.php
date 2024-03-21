<?php
$con = mysqli_connect("localhost", "root", "", "poma");
if (!$con) {
    die("Nie działa: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytania - Mechaniczna pomarańcza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
</head>
<style>
    @font-face {
        font-family: jah;
        src: url(../JustAnotherHand-Regular.ttf);
    }
    body, html {
        height: 100%;
        background-color: black;
        color: white; /* Set the default text color to white */
        overflow: hidden;
        font-family: jah;
        font-size: 16pt;
    }


    * {
        box-sizing: border-box;
    }

    .bg-image {
        background-image: url("../grafika/logo_poma2.jpg");
        background-color: rgba(0, 0, 0, 0.7);
        filter: blur(7px);
        -webkit-filter: blur(7px);
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.35;
    }

    .bg-text {
        background-color: rgba(255, 255, 255, 0.75); /* Set the background color to a semi-transparent white */
        color: #cd4100;
        font-weight: bold;
        border: 7px solid orangered;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 0;
        width: 78%;
        height: 90%;
        padding: 5px;
        text-align: center;
        border-radius: 10px;
        display: flex;
    }
    .confetti{
        opacity: 1;
        z-index: 9999;
    }
    .stats_container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 16%;
    margin-bottom: 16%;
    height: 33%; /* Set a fixed height for each stats container */
    }

    #stats {
        display: flex;
        flex-direction: column;
        width: 20%;
        margin: 0;
        border-left: 5px solid orangered;
    }

    #druzyna,
    #poziom,
    #kategoria {
        flex: 1; /* Make each stats container grow to fill the available space */
    }

    #druzyna h2,
    #poziom h2,
    #kategoria h2 {
        margin: 0; /* Remove any default margin for consistency */
    }

    #druzyna-data,
    #poziom-data,
    #kategoria-data {
        margin: 5px 0; /* Adjust margin as needed */
    }


    #pyt-css {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start; /* Align items to the top */
    position: relative;
    width: 79%;
    height: 100%;
    margin: 0;
    margin-bottom: 7px;
}


#pytanie-img {
    margin-top: 5px; /* Add margin-top to pytanie-img */
}

#dzwiek, #film {
    margin-top: 5px; /* Add margin-top to audio and video elements */
}


#odp-text {
    margin-top: 0; /* Remove margin-top for "Poprawna odpowiedź" */
    margin-bottom: 7px; /* Keep margin-bottom as it is */
}


    h3 {
        color: rgb(50, 50, 50);
    }

    #timer {
        position: absolute;
        display: flex;
        flex-direction: row;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border: 4px solid #AA0000;
        color: #cd4100;
        width: 25%;
        height: 10%;
        align-self: center;
        border-radius: 80px;
        justify-content:flex-start;
        padding-left: 2.5%;
        align-items: center;
    }
    #time-text{
        font-size:4.5vh;
        margin-bottom: 0;
    }

    #time {
        margin-left: 4%;
        margin-top: 10% !important;
        color: rgb(50, 50, 50);
        font-size:6.7vh;
    }


    #overlay {
        display: flex;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black background */
        backdrop-filter: blur(15px); /* Blur effect */
        justify-content: center;
        align-items: center;
        z-index: 999;
        transition: 0,5s;
    }

    #overlay-content {
        color: white;
        font-size: 10rem !important;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000; /* Place it above other content */
        transition: 0.5s;
    }
    #bg-text{
        font-weight: bolder;
        font-size: x-large;
    }
    #fullscreen-message {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-size: 54px;
            z-index: 999;
            display: none;
        }
    .poprawka{
        font-size: 50px;
    }
</style>


<body>
    <div class="bg-image"></div>

    <div class="bg-text">
        <div id="pyt-css" style="position: relative;">
        <h2 style="margin-bottom: 0px;">Pytanie:</h2>
            <img id="pytanie-img" src="" width="90%">
            <video width="50%"  controls hidden id="film" >
                <source src="" type="video/mp4" id="film_src">
                Coś poszło nie tak lub twoja przeglądarka nie wspiera wyswietlania filmów.
            </video>
            <audio controls id="dzwiek" hidden>
                <source src="" type="audio/mpeg" id="dzwiek_src">
                Coś poszło nie tak lub twoja przeglądarka nie wspiera wyswietlania filmów.
            </audio>
            <h2 id="odp-text"></h2>
            <div id="bg-text"></div>
            <img id="odpowiedz-img" src=""  width="90%">
            <div id="timer">
                <h2 id="time-text">Pozostały czas: </h2>
                <h1 id="time">30</h1>
            </div>
        </div>
        <div id="stats">
            <div id="druzyna" class="stats_container">
                <h2>Nr drużyny:</h2>
                <h3 class="poprawka" id="druzyna-data">-</h3>
            </div>
            <hr class="border border-3 opacity-100" style="border-color: orangered !important; ">
            <div id="poziom" class="stats_container">
                <h2>Pytanie za:</h2>
                <h3 class="poprawka" id="poziom-data">-</h3>
            </div>
            <hr class="border border-3 opacity-100" style="border-color: orangered !important; ">
            <div id="kategoria" class="stats_container">
                <h2>Kategoria:</h2>
                <h3 class="poprawka" id="kategoria-data">-</h3>
            </div>
        </div>
        <!-- <hr class="border border-warning border-3 opacity-100"> -->
        
    </div>
    

    <div id="overlay" style="display: none;">
        <div id="overlay-content">
            <h1>Koniec czasu!</h1>
        </div>
    </div>
    <audio id="tickSound" src="../audio/clock-tick-long.mp3" autoplay muted></audio>
    <audio id="tickSound" src="../audio/clock-tick-long.mp3" autoplay muted></audio>

    <div id="fullscreen-message">
    <p>UŻYTO POWERUPA DODATKOWY CZAS</p>
</div>
<div id="fullscreen-message1">
    <p><p>
</div>
<canvas class="confetti" id="canvas"></canvas>
</body>

<script>
       var flaga=0;
       wystartowane = false; 
       document.addEventListener('DOMContentLoaded', () => {
        const ws = new WebSocket('ws://192.168.55.104:3000/ws');


        ws.onmessage = (event) => {
            const data = JSON.parse(event.data);

            if (data.subject && data.points) {
                updateImage(data.subject, data.points);
                updateExtra(data.subject, data.points);
                updateExtra2(data.subject, data.points);
            } 
        };

            function updateImage(subject, points) {
                // Make an AJAX request to fetch the new image
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const imagePath = xhr.responseText;
                        const imageElement = document.getElementById('pytanie-img');
                        imageElement.src = imagePath;
                        console.log(imagePath);
                    }
                };
                xhr.open('GET', `script.php?subject=${subject}&points=${points}`, true);
                xhr.send();
            }
            function updateExtra(subject, points) {
                // Make an AJAX request to fetch the new image
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const mediaPath = xhr.responseText;
                        const imageElement = document.getElementById('film_src');
                        imageElement.src = mediaPath;
                        console.log(mediaPath);

                        const isVideo =  mediaPath !== '';
                        const videoElement = document.getElementById('film');
                        videoElement.hidden = !isVideo; 
                        if (isVideo) {
                            videoElement.src = mediaPath;
                        }
                    }
                };
                xhr.open('GET', `script_extra.php?subject=${subject}&points=${points}`, true);
                xhr.send();
            }
            function updateExtra2(subject, points) {
                // Make an AJAX request to fetch the new image
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const mediaPath = xhr.responseText;
                        const imageElement = document.getElementById('dzwiek_src');
                        imageElement.src = mediaPath;
                        console.log(mediaPath);

                        const isAudio =  mediaPath !== '';
                        const audioElement = document.getElementById('dzwiek');
                        audioElement.hidden = !isAudio; 
                        if (isAudio) {
                            audioElement.src = mediaPath;
                        }
                    }
                };
                xhr.open('GET', `script_extra2.php?subject=${subject}&points=${points}`, true);
                xhr.send();
            }
        });
    </script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const ws = new WebSocket('ws://192.168.55.104:3000/ws');
    var tickSound = new Audio('../audio/clock-tick-long.mp3');
    tickSound.muted = false;
    tickSound.volume = 0.3;

    var ringSound = new Audio('../audio/bell-ring.mp3');
    ringSound.muted = false;
    ringSound.volume = 0.4;

    var correctSound = new Audio('../audio/correct.mp3');
    correctSound.muted = false;
    correctSound.volume = 0.65;

    var wrongSound = new Audio('../audio/wrong.mp3');
    wrongSound.muted = false;
    wrongSound.volume = 0.2;


    ws.onmessage = (event) => {
        const data = JSON.parse(event.data);

        if (data.subject && data.points) {
            subject = data.subject;
            points = data.points;
            team   = data.team;
            console.log(subject, points,team);
            updateContent(data.subject, data.points, data.team);
        } else if (data.timer !== undefined) {
            updateTimer(data.timer);
        } else if (data.action === 'secondaryBtnClicked') {
            console.log(subject, points);
            console.log("numero uno");
            updateImage2(subject, points);
        } else if (data.action === 'clearAll') {
            clearAllContent();
        } else if (data.action === 'playMedia') {
            playMedia();
        } 
        else if (data.action === 'backup') {
            backup();
        } 
        else if (data.isCorrect !== undefined) {
            handleAnswer(data.isCorrect);
        } 
        else if (data.flaga !==0){
            flaga=data.flaga
            console.log(flaga)
            if(flaga==1) { 
                komunikat();
                flaga=0; }
            }
    };
    function backup() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            // Handle the received data here
            data.forEach(function(row) {
                console.log("Kategoria: " + row.kategoria);
                console.log("Poziom: " + row.poziom);
                console.log("Nr Druzyny: " + row.nr_druzyny);
                console.log("Img Odpowiedzi: " + row.img_odpowiedzi);
                console.log("Img Pytania: " + row.img_pytania);
                console.log("Media: " + row.media);
                console.log("Media Typ: " + row.media_typ);
                console.log("Stan: " + row.stan);
                console.log("\n");
                subject = row.kategoria;
                points = parseInt(row.poziom);
                team   = parseInt(row.nr_druzyny);
                if (row.stan == "clear"){
                    clearAllContent();
                }
                else if (row.stan == "pytanie"){
                    const contentDiv = document.getElementById('kategoria-data');
                    contentDiv.innerHTML = subject;
                    const contentDiv2 = document.getElementById('poziom-data');
                    if (points == 1){
                        contentDiv2.innerHTML = "Jeden punkt";
                    } 
                    else if (points == 2){
                        contentDiv2.innerHTML = "Dwa punkty";
                    }
                    else if (points == 3){
                        contentDiv2.innerHTML = "Trzy punkty";
                    }
                    const contentDiv3 = document.getElementById('druzyna-data');
                    contentDiv3.innerHTML = team;
                const image2Element = document.getElementById('pytanie-img');
                    image2Element.src = row.img_pytania;
                    if(row.media_typ == "wideo"){
                        const imageElement = document.getElementById('film_src');
                        imageElement.src = row.media;
                        console.log(row.media);

                        const isVideo =  row.media !== '';
                        const videoElement = document.getElementById('film');
                        videoElement.hidden = !isVideo; 
                        if (isVideo) {
                            videoElement.src = row.media;
                        }
                    }
                    else if(row.media_typ == "audio"){
                        const imageElement = document.getElementById('dzwiek_src');
                        imageElement.src = row.media;
                        console.log(row.media);

                        const isAudio =  row.media !== '';
                        const audioElement = document.getElementById('dzwiek');
                        audioElement.hidden = !isAudio; 
                        if (isAudio) {
                            audioElement.src = row.media;
                        }
                    }
                }
                else if (row.stan == "odpowiedz"){
                    const contentDiv = document.getElementById('kategoria-data');
                    contentDiv.innerHTML = subject;
                    const contentDiv2 = document.getElementById('poziom-data');
                    if (points == 1){
                        contentDiv2.innerHTML = "Jeden punkt";
                    } 
                    else if (points == 2){
                        contentDiv2.innerHTML = "Dwa punkty";
                    }
                    else if (points == 3){
                        contentDiv2.innerHTML = "Trzy punkty";
                    }
                    const contentDiv3 = document.getElementById('druzyna-data');
                    contentDiv3.innerHTML = team;
                const image4Element = document.getElementById('pytanie-img');
                    image4Element.src = row.img_pytania;
                    if(row.media_typ == "wideo"){
                        const imageElement = document.getElementById('film_src');
                        imageElement.src = row.media;
                        console.log(row.media);

                        const isVideo =  row.media !== '';
                        const videoElement = document.getElementById('film');
                        videoElement.hidden = !isVideo; 
                        if (isVideo) {
                            videoElement.src = row.media;
                        }
                    }
                    else if(row.media_typ == "audio"){
                        const imageElement = document.getElementById('dzwiek_src');
                        imageElement.src = row.media;
                        console.log(row.media);

                        const isAudio =  row.media !== '';
                        const audioElement = document.getElementById('dzwiek');
                        audioElement.hidden = !isAudio; 
                        if (isAudio) {
                            audioElement.src = row.media;
                        }
                    }
                const image2Element = document.getElementById('odpowiedz-img');
                image2Element.src = row.img_odpowiedzi;
                const odpText = document.getElementById('odp-text')
                odpText.innerHTML = "Poprawna odpowiedź:";
                }
                else if (row.stan == "done"){
                    const contentDiv = document.getElementById('kategoria-data');
                    contentDiv.innerHTML = subject;
                    const contentDiv2 = document.getElementById('poziom-data');
                    if (points == 1){
                        contentDiv2.innerHTML = "Jeden punkt";
                    } 
                    else if (points == 2){
                        contentDiv2.innerHTML = "Dwa punkty";
                    }
                    else if (points == 3){
                        contentDiv2.innerHTML = "Trzy punkty";
                    }
                    const contentDiv3 = document.getElementById('druzyna-data');
                    contentDiv3.innerHTML = team;
                const image3Element = document.getElementById('pytanie-img');
                    image3Element.src = row.img_pytania;
                    if(row.media_typ == "wideo"){
                        const imageElement = document.getElementById('film_src');
                        imageElement.src = row.media;
                        console.log(row.media);

                        const isVideo =  row.media !== '';
                        const videoElement = document.getElementById('film');
                        videoElement.hidden = !isVideo; 
                        if (isVideo) {
                            videoElement.src = row.media;
                        }
                    }
                    else if(row.media_typ == "audio"){
                        const imageElement = document.getElementById('dzwiek_src');
                        imageElement.src = row.media;
                        console.log(row.media);

                        const isAudio =  row.media !== '';
                        const audioElement = document.getElementById('dzwiek');
                        audioElement.hidden = !isAudio; 
                        if (isAudio) {
                            audioElement.src = row.media;
                        }
                    }
                const imageElement = document.getElementById('odpowiedz-img');
                imageElement.src = row.img_odpowiedzi;
                const odpText = document.getElementById('odp-text')
                odpText.innerHTML = "Poprawna odpowiedź:";
                }
            });
        }
    };
    xhr.open("GET", "get_data.php", true);
    xhr.send();
}


    function handleAnswer(isCorrect) {
        var xhr = new XMLHttpRequest();
    xhr.open("GET", "done.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send();
    }


    function clearAllContent() {
    const pyt = document.getElementById('pytanie-img');
    pyt.src = '';
    const bgText = document.getElementById('bg-text');
    bgText.innerHTML = "";
    const odp = document.getElementById('odpowiedz-img');
    odp.style.border = 'none';
    odp.src = '';
    const odpText = document.getElementById('odp-text');
    odpText.innerHTML = "";
    
    // Set placeholders for category, points, and team number
    const contentDiv = document.getElementById('kategoria-data');
    contentDiv.innerHTML = '-';
    const contentDiv2 = document.getElementById('poziom-data');
    contentDiv2.innerHTML = '-';
    const contentDiv3 = document.getElementById('druzyna-data');
    contentDiv3.innerHTML = '-';
    const videoElement = document.getElementById('film');
    const audioElement = document.getElementById('dzwiek');
    videoElement.hidden = true;
    audioElement.hidden = true;
    audioElement.src = " ";
    videoElement.src = " ";

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "clear_content.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send();
}
    function playMedia() {
        const videoElement = document.getElementById('film');
            const audioElement = document.getElementById('dzwiek');
        if (wystartowane == false){
            videoElement.play();
            audioElement.play();
            wystartowane = true;
        }
        else if((wystartowane == true)){
            videoElement.pause();
            audioElement.pause();
            wystartowane = false;
        }
    }

    function updateImage2(subject, points) {
        // Make an AJAX request to fetch the new image
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const imagePath = xhr.responseText;
                const imageElement = document.getElementById('odpowiedz-img');
                imageElement.src = imagePath;
                const odpText = document.getElementById('odp-text')
                odpText.innerHTML = "Poprawna odpowiedź:";
                console.log(imagePath);
                console.log("numero dos");
            }
        };
        xhr.open('GET', `script2.php?subject=${subject}&points=${points}`, true);
        xhr.send();
    }


    function updateContent(subject, points,team) {
        const bgText = document.getElementById('bg-text');
        bgText.innerHTML = "";
        const odp = document.getElementById('odpowiedz-img');
        odp.style.border = 'none';
        odp.src = '';
        const odpText = document.getElementById('odp-text')
        odpText.innerHTML = "";
        const contentDiv = document.getElementById('kategoria-data');
        contentDiv.innerHTML = subject;
        const contentDiv2 = document.getElementById('poziom-data');
        if (points == 1){
            contentDiv2.innerHTML = "Jeden punkt";
        } 
        else if (points == 2){
            contentDiv2.innerHTML = "Dwa punkty";
        }
        else if (points == 3){
            contentDiv2.innerHTML = "Trzy punkty";
        }
        const contentDiv3 = document.getElementById('druzyna-data');
        contentDiv3.innerHTML = team;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_nr_druzyny.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText); // Log the response from the backend
            }
        };
        xhr.send('team=' + team); // Send the team value as POST data
        const videoElement = document.getElementById('film');
        const audioElement = document.getElementById('dzwiek');
        videoElement.hidden = true;
        audioElement.hidden = true;
        audioElement.src = " ";
        videoElement.src = " ";
    }

    function showEndOfTimeOverlay() {
        const overlay = document.getElementById('overlay');
        const overlayContent = document.getElementById('overlay-content');
        ringSound.play();
        overlay.style.display = 'flex';
        overlayContent.innerHTML = '<h1">Koniec czasu!</h1>';

        // Darken the background
        document.body.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';

        // Hide the overlay after 2 seconds
        setTimeout(() => {
            overlay.style.display = 'none';
            document.body.style.backgroundColor = ''; // Reset background color
        }, 5500);
    }

    function updateTimer(timerValue) {
        const timerElement = document.getElementById('time');
        timerElement.innerHTML = timerValue;

        if (timerValue == 5) {
            tickSound.play();
        }

        if (timerValue == 1) {
            setTimeout(() => {
                timerElement.innerHTML = 0;
                showEndOfTimeOverlay();
            }, 1100);
        }
    }
});
    function komunikat(){
                // Function to show the fullscreen message
    function showFullscreenMessage(message) {
        var fullscreenMessage = document.getElementById('fullscreen-message');
        fullscreenMessage.innerHTML = '<p>' + message + '</p>';
        fullscreenMessage.style.display = 'flex';
    }

    // Function to hide the fullscreen message
    function hideFullscreenMessage() {
        var fullscreenMessage = document.getElementById('fullscreen-message');
        fullscreenMessage.style.display = 'none';
    }

        showFullscreenMessage('UŻYTO POWERUPA DODATKOWY CZAS!');


    // Example: Hide the fullscreen message after 6 seconds
    setTimeout(function() {
        hideFullscreenMessage();
    }, 4000);
    }
</script>
<script>
    flaga69=0;
    var wujekSound = new Audio('../audio/wygranabeta.mp3');
    wujekSound.muted = false;
    wujekSound.volume = 1;

    var powerup = new Audio('../audio/powerup.mp3');
    wujekSound.muted = false;
    wujekSound.volume = 1;
      
    document.addEventListener('DOMContentLoaded', () => {
    const ws = new WebSocket('ws://192.168.55.104:3000/ws');

    ws.onmessage = (event) => {
        console.log('Received message:', event.data);
        const data = JSON.parse(event.data);
        if(data.flaga69!== undefined){
            flaga69=data.flaga69 
            // console.log("DZIAJJJJJ URWA")
            console.log(flaga69)
        }
    else if (data.team1 !== undefined || data.team2 !== undefined || data.team3 !== undefined || data.team4 !== undefined) {
        team1 = data.team1;
        team2 = data.team2;
        team3 = data.team3;
        team4 = data.team4;
        flagaA3=data.flagaA3;
        flagaB3=data.flagaB3;
        flagaC3=data.flagaC3;
        flagaD3=data.flagaD3;
        
    
        // console.log('Received team data:', team1, team2, team3, team4);
         console.log(flagaA3,flagaB3,flagaC3,flagaD3);
            if(flaga69!=1){
         wujekplay(team1,team2,team3,team4) // dziwęk + fanfara
    palerap2(team1,team2,team3,team4)
    palerap6(team1,team2,team3,team4)
    palerap8(team1,team2,team3,team4)}
}}
        
    function wujekplay(team1,team2,team3,team4){
    if(team1 >= 11|| team2 >=11||team3 >=11||team4 >=11){
        wujekSound.play();
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


        }}
        var flagaA=0
        var flagaB=0
        var flagaC=0
        var flagaD=0   
        var flagaA2=0;
        var flagaB2=0;
        var flagaC2=0;
        var flagaD2=0;  
        function palerap2(team1,team2,team3,team4){
        if(team1 == 2 && flagaA==0 ){
           
        powerup.play()
        showFullscreenMessage("OTRZYMANO BONUS:<br> PODPOWIEDŹ PUBLICZNOŚĆI");
        setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
        flagaA++;}
    else if(team2== 2 && flagaB==0){
        powerup.play()
        showFullscreenMessage("OTRZYMANO BONUS:<br> PODPOWIEDŹ PUBLICZNOŚĆI");
        setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
    flagaB++

    }
    else if(team3== 2 && flagaC==0){
        powerup.play()
        showFullscreenMessage("OTRZYMANO BONUS:<br> PODPOWIEDŹ PUBLICZNOŚĆI");
        setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
    flagaC++
    }
    else if(team4== 2 && flagaD==0){
        powerup.play()
        showFullscreenMessage("OTRZYMANO BONUS:<br> PODPOWIEDŹ PUBLICZNOŚĆI");
        setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
    flagaD++
    }

        }
        function palerap6(team1,team2,team3,team4){
            if(team1 == 6&& flagaA2==0){
            
            powerup.play();
            showFullscreenMessage("OTRZYMANO BONUS:<br> PYTANIE BONUSOWE");
            setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
    flagaA2++;
}
    else if(team2==6&&flagaB2==0){
        powerup.play();
             showFullscreenMessage("OTRZYMANO BONUS:<br> PYTANIE BONUSOWE");
            setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
    flagaB2++;

    }
    else if(team3==6&&flagaC2==0){
        powerup.play();
            showFullscreenMessage("OTRZYMANO BONUS:<br> PYTANIE BONUSOWE");
            setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
    flagaC2++;

    }
    else if(team4==6&&flagaD2==0){
        powerup.play();
            showFullscreenMessage("OTRZYMANO BONUS:<br> PYTANIE BONUSOWE");
            setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);
    flagaD2++;

    }

        
    }
    function palerap8(team1,team2,team3,team4){
            if(team1 == 8|| team2 ==8 ||team3 ==8||team4 ==8){
            
            powerup.play();
            showFullscreenMessage("OTRZYMANO BONUS:<br> +1 punkt");
            // plus1punkt(team1,team2,team3,team4);
            setTimeout(function() {
        hideFullscreenMessage();
    }, 5000);

        }
    }
    

})
</script>
<style>        
        #fullscreen-message1 {
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(15px);
            color: white;
            font-size: 70px;
            z-index: 999;
            display: none;
        }</style>
        <script>
              function showFullscreenMessage(message) {
        var fullscreenMessage = document.getElementById('fullscreen-message1');
        fullscreenMessage.innerHTML = '<p>' + message + '</p>';
        fullscreenMessage.style.display = 'flex';
    }

    // Function to hide the fullscreen message
    function hideFullscreenMessage() {
        var fullscreenMessage = document.getElementById('fullscreen-message1');
        fullscreenMessage.style.display = 'none';
    }

        </script>

</html>
