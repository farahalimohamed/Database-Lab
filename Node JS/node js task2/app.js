const express = require('express');
const bodyParser = require('body-parser');

const app = express();

app.set('view engine', 'ejs');

app.use(bodyParser.urlencoded({ extended: true }));

app.use(express.static('public'));

const users = [];

app.get('/register', (req, res) => {
    res.render('registration', { errorMessage: '' });
});

app.post('/register', (req, res) => {
    const { name, email, password } = req.body;

    if (password.length < 8) {
        res.render('registration', { errorMessage: 'Error: Password is less than 8 characters' });
    } else {
        const newUser = { name, email, password };
        users.push(newUser);

        res.render('registration', { errorMessage: 'Registration success' });
    }
});

app.get('/users', (req, res) => {
    res.json(users);
});

app.listen(3000, () => {
    console.log(`Server is running on http://localhost:3000`);
});
