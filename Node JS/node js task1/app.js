const express = require('express');
const app = express();

app.use(express.static('pages'));

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/pages/index.html');
});

app.get('/about', (req, res) => {
  res.sendFile(__dirname + '/pages/about.html');
});

app.get('/contact', (req, res) => {
  res.sendFile(__dirname + '/pages/contact.html');
});

app.listen(3000, () => {
  console.log(`I'm listening`);
});
