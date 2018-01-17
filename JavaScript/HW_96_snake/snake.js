(function () {
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        x = window.innerWidth / 2,
        y = window.innerHeight / 2,
        direction = '';

    const RIGHT = 'right',
        LEFT = 'left',
        UP = 'up',
        DOWN = 'down';




    function resizeCanvas() {
        canvas.width = window.innerWidth - 10;
        canvas.height = window.innerHeight - 10;
    }

    window.addEventListener('resize', resizeCanvas);

    resizeCanvas();

    var img = document.createElement('img');
    img.src = "images/snake.png";

    // setInterval(() => {
    //     context.clearRect(x, y, 100, 100);
    //     context.drawImage(img, x += 64, y += 64, 64, 64);

    // }, 1000);

    window.addEventListener('keydown', function (event) {
        context.clearRect(x, y, 100, 100);
        // in here if event.keyCode === 37 - it was a left arrow, etc..
        console.log(event.keyCode);
        switch (event.keyCode) {
            case 39:
                direction = RIGHT;
                break;
            case 37:
                direction = LEFT;
                break;
            case 38:
                direction = UP;
                break;
            case 40:
                direction = DOWN;
                break;
        }

        // set direction variable so we can move snake in proper direction
        switch (direction) {
            case RIGHT:
                x += 64;

                break;
            case LEFT:
                x -= 64;

                break;
            case UP:

                y -= 64;
                break;
            case DOWN:

                y += 64;
                break;
        }


        context.drawImage(img, x, y, 64, 64);

        console.log(x, y);
    });


    img.onload = function () {
        context.drawImage(img, x, y, 64, 64);
    };
}());