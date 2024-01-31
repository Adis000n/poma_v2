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
<style>
    body, html {
        height: 100%;
        background-color: black;
        color: white; /* Set the default text color to white */
        overflow: hidden;
    }

    * {
        box-sizing: border-box;
    }

    .bg-image {
        background-image: url("../grafika/logo_poma2.jpg");
        background-color: rgba(0, 0, 0, 0.8);
        filter: blur(10px);
        -webkit-filter: blur(10px);
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.35;
    }

    .bg-text {
        background-color: rgba(255, 255, 255, 1); /* Set the background color to a semi-transparent white */
        color: orangered;
        font-weight: bold;
        border: 7px solid orange;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 85%;
        height: 80%;
        padding: 20px;
        text-align: center;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
    }
    .stats_container{
        display: flex;
        flex-direction: column;
        /* justify-content: space-between  ; */
        align-items: center;
        margin-top: 20%;
        margin-bottom: 20%;
    }

    #stats {
        display: flex;
        flex-direction: column;
        width: 20%;
        margin 0;
        border-left: 5px solid orange;
        /* background-color: blue; */
        /* justify-content: space-between; */
        
    }
    #pyt-css {
        /* display: flex; */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 79%;
        height: 100%;
        /* padding: 40px; */
        margin 0;
        /* background-color: red; */

    }
    

    h3 {
        color: rgb(100, 100, 100);
    }

    #timer {
        border: 4px solid orangered;
        color: darkorange;
        margin-top: 20px !important;
        width: 30%;
        margin: 0;
        margin-bottom: 1%;
        align-self: center;
        border-radius: 20px;

    }

    #time {
        color: rgb(70, 70, 70);
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
        font-size: xx-large;
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
</style>


<body>
    <div class="bg-image"></div>

    <div class="bg-text">
        <div id="pyt-css">
            <h1>Pytanie:</h1>
            <img id="pytanie-img" src="../baza_pytania/chemia/1/c1.jpg" width="30%">
            <br>
            <video width="700" height="480" controls hidden id="film" >
                <source src="" type="video/mp4" id="film_src">
                Coś poszło nie tak lub twoja przeglądarka nie wspiera wyswietlania filmów.
            </video>
            <br>
            <audio controls id="dzwiek" hidden>
                <source src="" type="audio/mpeg" id="dzwiek_src">
                Coś poszło nie tak lub twoja przeglądarka nie wspiera wyswietlania filmów.
            </audio>
            <h1 id="odp-text"></h1>
            <div id="bg-text"></div>
            <img id="odpowiedz-img" src=""  width="25%">
            <div id="timer">
                <h2>Pozostały czas:</h2>
                <h1 id="time">30</h1>
            </div>
        </div>
        <div id="stats">
            <div id="druzyna" class="stats_container">
                <h2>Nr drużyny:</h2>
                <h3 id="druzyna-data">-</h3>
            </div>
            <hr class="border border-warning border-3 opacity-100">
            <div id="poziom" class="stats_container">
                <h2>Poziom trudności:</h2>
                <h3 id="poziom-data">-</h3>
            </div>
            <hr class="border border-warning border-3 opacity-100">
            <div id="kategoria" class="stats_container">
                <h2>Kategoria:</h2>
                <h3 id="kategoria-data">-</h3>
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
</body>

<script>
       var flaga=0;
       document.addEventListener('DOMContentLoaded', () => {

        const ws = new WebSocket('ws://172.26.0.1:3000/ws');


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
        const ws = new WebSocket('ws://192.168.1.113:3000/ws');

        ws.onmessage = (event) => {
            const data = JSON.parse(event.data);
            if (data.action === 'secondaryBtnClicked') {
                updateImage2(data.subject, data.points);
            }
        };


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
                    }
                };
                xhr.open('GET', `script2.php?subject=${subject}&points=${points}`, true);
                xhr.send();
            }
        });
    </script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const ws = new WebSocket('ws://192.168.1.113:3000/ws');
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
            updateImage2(subject, points);
        } else if (data.action === 'clearAll') {
            clearAllContent();
        } else if (data.isCorrect !== undefined) {
            handleAnswer(data.isCorrect);
        } 
        else if (data.flaga !==0)
            flaga=data.flaga
        console.log(flaga)
            if(flaga==1) { 
        komunikat();
                flaga=0; }
    };

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
    const videoElement = document.getElementById('film');
    const audioElement = document.getElementById('dzwiek');
    videoElement.hidden = true;
    audioElement.hidden = true;

    // Set placeholders for category, points, and team number
    const contentDiv = document.getElementById('kategoria-data');
    contentDiv.innerHTML = '-';
    const contentDiv2 = document.getElementById('poziom-data');
    contentDiv2.innerHTML = '-';
    const contentDiv3 = document.getElementById('druzyna-data');
    contentDiv3.innerHTML = '-';
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
        contentDiv2.innerHTML = points;
        const contentDiv3 = document.getElementById('druzyna-data');
        contentDiv3.innerHTML = team;
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
    function handleAnswer(isCorrect) {
        const bgText = document.getElementById('bg-text');
        const odp = document.getElementById('odpowiedz-img');
        if (isCorrect) {
            bgText.innerHTML = "Podana odpowiedź była poprawna";
            bgText.style.color = 'green';
            odp.style.border = 'solid 5px #00bd13';
            correctSound.play();
        } else {
            bgText.innerHTML = "Podana odpowiedź nie była poprawna";
            bgText.style.color = '#f0002c';
            odp.style.border = 'solid 5px #bd0000';
            wrongSound.play();
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
    var wujekSound = new Audio('../audio/wygranabeta.mp3');
    wujekSound.muted = false;
    wujekSound.volume = 1;

    var powerup = new Audio('../audio/powerup.mp3');
    wujekSound.muted = false;
    wujekSound.volume = 1;
      
    document.addEventListener('DOMContentLoaded', () => {
    const ws = new WebSocket('ws://192.168.1.113:3000/ws');

    ws.onmessage = (event) => {
    const data = JSON.parse(event.data);

    if (data.team1 !== undefined || data.team2 !== undefined || data.team3 !== undefined || data.team4 !== undefined) {
        team1 = data.team1;
        team2 = data.team2;
        team3 = data.team3;
        team4 = data.team4;
    
        // console.log('Received team data:', team1, team2, team3, team4);
    wujekplay(team1,team2,team3,team4)
    palerap2(team1,team2,team3,team4)
    palerap6(team1,team2,team3,team4)
    palerap8(team1,team2,team3,team4)
}}
        
    function wujekplay(team1,team2,team3,team4){
    if(team1 >= 11|| team2 >=11||team3 >=11||team4 >=11){
        wujekSound.play();
        }}
    function palerap2(team1,team2,team3,team4){
        if(team1 == 2|| team2 ==2 ||team3 ==2||team4 ==2){
           
        powerup.play()
        showFullscreenMessage("DODANO POWERUPA +1 punkt");
        setTimeout(function() {
        hideFullscreenMessage();
    }, 8000);

        }}
        function palerap6(team1,team2,team3,team4){
            if(team1 == 6|| team2 ==6 ||team3 ==6||team4 ==6){
            
            powerup.play();
            showFullscreenMessage("DODANO POWERUPA +1 punkt");
            setTimeout(function() {
        hideFullscreenMessage();
    }, 8000);

        }
    }
    function palerap8(team1,team2,team3,team4){
            if(team1 == 8|| team2 ==8 ||team3 ==9||team4 ==9){
            
            powerup.play();
            showFullscreenMessage("DODANO POWERUPA +1 punkt");
            setTimeout(function() {
        hideFullscreenMessage();
    }, 8000);

        }
    }
    

})
</script>
<style>        
        #fullscreen-message1 {
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

    // Example: Show the fullscreen message after 3 seconds




    // Example: Hide the fullscreen message after 6 seconds

        </script>
</html>
