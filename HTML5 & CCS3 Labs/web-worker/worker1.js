// worker1.js

onmessage = function (e) {
    performHeavyOperation(e.data);
};

function performHeavyOperation(data) {
    // Simulating a heavy operation that takes 10 seconds
    setTimeout(function () {
        let result = 0;
        for (let i = 0; i < data * 1000000; i++) {
            result += Math.sin(i) * Math.cos(i);
        }
        postMessage(result);
    }, 3000); // 10 seconds delay
}
