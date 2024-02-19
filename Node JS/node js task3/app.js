const express = require('express');
const { MongoClient } = require('mongodb');
const bodyParser = require('body-parser');
const cookieParser = require('cookie-parser');
const { v4: uuidv4 } = require('uuid');

const app = express();
const PORT = 8080;
const MONGO_URI = 'mongodb://localhost:27017';
const DB_NAME = 'nodejs';

app.use(bodyParser.urlencoded({ extended: true }));
app.use(cookieParser());

MongoClient.connect(MONGO_URI, { useUnifiedTopology: true })
    .then((client) => {
        const db = client.db(DB_NAME);

        app.get('/', (req, res) => {
            res.render('login.ejs');
        });

        app.post('/login', async (req, res) => {
            const { username, password } = req.body;

            const user = await db.collection('users').findOne({ username, password });

            if (user) {
                const sessionId = uuidv4();

                res.cookie('sessionId', sessionId);

                res.render('dashboard.ejs', { username: user.username });
            } else {
                res.render('login.ejs', { error: 'Not found, Please Sign Up!' });
            }
        });

        app.get('/dashboard', (req, res) => {
            if (req.cookies.sessionId) {
                res.render('dashboard.ejs');
            } else {
                res.redirect('/');
            }
        });

        app.listen(PORT, () => {
            console.log(`Server is running on http://localhost:${PORT}`);
        });
    })
    .catch((err) => {
        console.error('Error connecting to MongoDB:', err);
    });
