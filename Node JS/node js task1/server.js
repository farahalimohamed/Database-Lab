const express = require('express');
const bodyParser = require('body-parser');

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/form.html');
});

app.post('/register', (req, res) => {
    const { name, email, password } = req.body;

    if (password.length < 8) {
        res.send('Error: Password is less than 8 characters.');
    } else {
        res.send('Registration success!');
    }
});

app.listen(3000, () => {
    console.log(`Server listening at http://localhost:3000`);
});
