document.addEventListener('DOMContentLoaded', function () {
    const canvasContainer = document.getElementById('canvas-container');
    const canvas = document.getElementById('animatedCanvas');
    const ctx = canvas.getContext('2d');

    canvas.width = canvasContainer.offsetWidth;
    canvas.height = canvasContainer.offsetHeight;

    const canvasBorderColor = '#a9a9a9';

    const lineWidth = 5;
    const lineColor = '#800080'; 
    const borderColor = '#808080'; 
    const speed = 2; 

    let lineLength = 0; 

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        ctx.strokeStyle = canvasBorderColor;
        ctx.lineWidth = lineWidth * 2;
        ctx.strokeRect(0, 0, canvas.width, canvas.height);

        ctx.beginPath();
        ctx.moveTo(0, canvas.height / 2);
        ctx.lineTo(lineLength, canvas.height / 2);
        ctx.strokeStyle = lineColor;
        ctx.lineWidth = lineWidth;
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(lineLength - lineWidth, 0);
        ctx.lineTo(lineLength - lineWidth, canvas.height);
        ctx.strokeStyle = borderColor;
        ctx.lineWidth = lineWidth;

        lineLength += speed;

        if (lineLength > canvas.width) {
            canvas.width = canvasContainer.offsetWidth;
            lineLength = 0;
        }

        requestAnimationFrame(draw);
    }

    draw();
});
