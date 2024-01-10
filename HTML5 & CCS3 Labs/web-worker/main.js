// main.js

const output1 = document.getElementById('output1');
const output2 = document.getElementById('output2');
const runWorker1Button = document.getElementById('runWorker1');
const runWorker2Button = document.getElementById('runWorker2');

const worker1 = new Worker('worker1.js');
const worker2 = new Worker('worker2.js');

const inputData = 5; // Example input data

// Button click event for Worker 1
runWorker1Button.addEventListener('click', function () {
    worker1.postMessage(inputData);
});

// Worker 1
worker1.onmessage = function (e) {
    output1.innerHTML = `Result from Worker 1: ${e.data}`;
};

// Button click event for Worker 2
runWorker2Button.addEventListener('click', function () {
    worker2.postMessage(inputData);
});

// Worker 2
worker2.onmessage = function (e) {
    output2.innerHTML = `Result from Worker 2: ${e.data}`;
};
