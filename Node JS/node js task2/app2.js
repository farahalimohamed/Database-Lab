const express = require('express');
const path = require('path');
const app = express();

app.use(express.json());

const cars = [];

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});


app.get('/cars', (req, res) => {
    res.json(cars);
});

app.get('/cars/:id', (req, res) => {
    const carId = parseInt(req.params.id);
    const car = cars.find((c) => c.id === carId);

    if (car) {
        res.json(car);
    } else {
        res.status(404).send('Car not found');
    }
});

app.post('/cars', (req, res) => {
    const { model, licenseNumber } = req.body;
    const newCar = {
        id: cars.length + 1,
        model,
        licenseNumber,
    };

    cars.push(newCar);
    res.json(newCar);
});

app.delete('/cars/:id', (req, res) => {
    const carId = parseInt(req.params.id);
    const index = cars.findIndex((c) => c.id === carId);

    if (index !== -1) {
        cars.splice(index, 1);
        res.json('Car deleted successfully');
    } else {
        res.status(404).send('Car not found');
    }
});

app.listen(3000, () => {
    console.log(`Server is running on http://localhost:3000`);
});
