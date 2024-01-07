<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Mechaniczna Pomarańcza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="panets.js"></script>
    <script>
        let timerInterval;
        let timerValue = 30; // Initialize timerValue
        let timerRunning = false;

        function submitForm() {
        // Perform basic form validation
        var selectedSubject = document.querySelector('input[name="subject"]:checked');
        var selectedPoints = document.querySelector('input[name="points"]:checked');

        if (!selectedSubject || !selectedPoints) {
            alert('Please select both a subject and points');
            return;
        }

        // If validation passes, log the form data
        const formData = {
            subject: selectedSubject.value,
            points: selectedPoints.value,
        };

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
                    timerValue -= 1;
                    sendTimerData(timerValue);

                    if (timerValue === 0) {
                        stopTimer();
                    }
                }, 1000);
            }
        }

        function stopTimer() {
            clearInterval(timerInterval);
            timerRunning = false;
            enableButtons(); // Enable buttons when the timer is stopped
        }

        function resetTimer() {
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
    // Log the answer to the console (you can send it to the server here)
    console.log('Answer:', isCorrect ? 'Correct' : 'Incorrect');

    // Disable buttons after the user makes a selection
    document.getElementById('correctBtn').disabled = true;
    document.getElementById('incorrectBtn').disabled = true;

    document.getElementById('answerButtons').style.display = 'none'; // Hide the buttons
    
    document.getElementById('mainBtn').disabled = false;

    // Send the answer to the server
    sendAnswer(isCorrect);
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

    </script>
</head>
<body>
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
        <br>
        <hr>
        <button type="button" class="btn btn-primary" id="mainBtn" onclick="submitForm()">Wyświetl</button>
        <br><br>
        <button type="button" class="btn btn-secondary" id="secondaryBtn" style="display: none;" onclick="showAnswerButtons()">Pokaż odpowiedź</button>
        <br><br>
        <div id="answerButtons" style="display: none;">
            <button type="button" id="correctBtn" class="btn btn-success" onclick="handleAnswer(true)">Dobra odpowiedź</button>
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
</body>
</html>