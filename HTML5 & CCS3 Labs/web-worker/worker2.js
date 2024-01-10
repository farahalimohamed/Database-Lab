// worker2.js

onmessage = function (e) {
    const result = e.data * 2;
    postMessage(result);
};
