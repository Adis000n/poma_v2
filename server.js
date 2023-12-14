const express = require('express');
const expressWs = require('express-ws');
const path = require('path');
const childProcess = require('child_process');
const bodyParser = require('body-parser');
const WebSocket = require('ws');
const ws = new WebSocket('ws://192.168.253.91:3000/ws');

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

      // Broadcast the parsed data to all connected clients
      clients.forEach(client => {
        if (client.readyState === WebSocket.OPEN) {
          client.send(JSON.stringify(data));
        }
      });
    } catch (error) {
      console.error('Error parsing incoming message:', error);
    }
  });
});

// Serve PHP files using php-cgi
app.engine('php', (filePath, options, callback) => {
  const phpExecutable = 'D:/xampp/php/php-cgi.exe';
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
