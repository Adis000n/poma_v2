const express = require('express');
const expressWs = require('express-ws');
const path = require('path');
const childProcess = require('child_process');
const bodyParser = require('body-parser');
const WebSocket = require('ws');
const ws = new WebSocket('ws://192.168.55.113:3000/ws');
const app = express();
expressWs(app);
app.use(bodyParser.urlencoded({ extended: true }));

// Enable CORS
app.use((req, res, next) => {
  res.header('Access-Control-Allow-Origin', '*');
  res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
  next();
});

// Store WebSocket connections
const clients = [];

// Inside the '/ws' WebSocket route
// Inside the '/ws' WebSocket route
app.ws('/ws', (ws, req) => {
  clients.push(ws);

  ws.on('close', () => {
    // Remove closed WebSocket connection
    clients.splice(clients.indexOf(ws), 1);
  });

  ws.on('message', (message) => {
    // Handle incoming messages from WebSocket clients
    console.log('Received message:', message);

    // Parse the JSON message
    try {
      const data = JSON.parse(message);

      if (data.subject && data.points) {
        // Broadcast the parsed subject and points data to all connected clients
        broadcast(JSON.stringify(data));
      } else if (data.timer) {
        // Broadcast the parsed timer data to all connected clients
        broadcast(JSON.stringify(data));
      } else if (data.isCorrect !== undefined) {
        // Handle the correct/incorrect answer data
        console.log(`Received answer data: ${data.isCorrect ? 'Correct' : 'Incorrect'}`);
        broadcast(JSON.stringify(data));
      } else if (data.action === 'secondaryBtnClicked') {
        // Broadcast the secondary button click information
        broadcast(JSON.stringify({ action: 'secondaryBtnClicked' }));
      } else if (data.action === 'clearAll') {
        // Broadcast the secondary button click information
        broadcast(JSON.stringify({ action: 'clearAll' }));
      }else if (data.action === 'playMedia'){
        broadcast(JSON.stringify({ action: 'playMedia' }));
      } 
      else if (data.team1 !== undefined || data.team2 !== undefined || data.team3 !== undefined || data.team4 !== undefined) {
        // Broadcast only the team information
        broadcast(JSON.stringify({
            team1: data.team1,
            team2: data.team2,
            team3: data.team3,
            team4: data.team4,
            flagaA3:data.flagaA3,
            flagaB3: data.flagaB3,
            flagaC3: data.flagaC3,
            flagaD3: data.flagaD3
        }));
    }
    else if(data.nazwa_teamA !== undefined ||data.nazwa_teamB !== undefined ||data.nazwa_teamC !== undefined ||data.nazwa_teamD !== undefined){
      broadcast(JSON.stringify({
        nazwa_teamA: data.nazwa_teamA,
        nazwa_teamB: data.nazwa_teamB,
        nazwa_teamC: data.nazwa_teamC,
        nazwa_teamD: data.nazwa_teamD
      }))
    }
    
    else if(data.nazwaA!== undefined||data.nazwaB!== undefined){
      broadcast(JSON.stringify({
  nazwaA: data.nazwaA,
  nazwaB: data.nazwaB
      }))
    }
    else if(data.punktyA!== undefined ||data.punktyB==undefined ){
      broadcast(JSON.stringify({
        punktyA:data.punktyA,
        punktyB:data.punktyB
      }))
    }
    else if(data.flaga69!== undefined){
      broadcast(JSON.stringify({
        flaga69:data.flaga69
      }))
    }
    else if(data.flaga1 !==0){
      broadcast(JSON.stringify({
        flaga: data.flaga1,
      }))
    }
  //   else if(data.nazwaA!== undefined||data.nazwaB!== undefined){
  //     broadcast(JSON.stringify({
  // nazwaA: data.nazwaA,
  // nazwaB: data.nazwaB
  //     }))
  //   }
    // else if(data.punktyA!== undefined ||data.punktyB==undefined ){
    //   broadcast(JSON.stringify({
    //     punktyA:data.punktyA,
    //     punktyB:data.punktyB
    //   }))
    // }

  
  } catch (error) {
      console.error('Error parsing incoming message:', error);
    }
  });

  // Function to broadcast messages to all connected clients
  function broadcast(message) {
    clients.forEach(client => {
      if (client.readyState === WebSocket.OPEN) {
        client.send(message);
      }
    });
  }
});


// Serve PHP files using php-cgi
app.engine('php', (filePath, options, callback) => {
  const phpExecutable = 'C:/xampp/php/php-cgi.exe';
  const scriptPath = path.resolve(filePath);
  const cmd = `"${phpExecutable}" -f "${scriptPath}"`;

  childProcess.exec(cmd, (error, stdout, stderr) => {
    if (error) {
      console.error(`Error executing PHP: ${stderr}`);
      return callback(error);
    }

    if (stderr) {
      console.error(`PHP Warning/Notice: ${stderr}`);
    }

    callback(null, stdout);
  });
});

app.set('view engine', 'php');
app.set('views', path.join(__dirname, ''));

// Example route rendering a PHP file
app.get('/', (req, res) => {
  res.render('admin/admin');
});

app.post('/submitForm', (req, res) => {
  const { subject, points } = req.body;

  console.log('Form submitted:', { subject, points });

  // Broadcast form data to all connected clients
  clients.forEach(client => {
    if (client.readyState === WebSocket.OPEN) {
      client.send(JSON.stringify({ subject, points }));
    }
  });

  // Respond with a simple message
  res.send('Form submitted successfully');
});

const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
