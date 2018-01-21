/* jshint -W104 */
(function () {
    "use strict";

    const LEFT = 37,
        UP = 38,
        RIGHT = 39,
        DOWN = 40,
        BALL_SIZE = 64;

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        crashSound = document.getElementById("crash"),
        direction = RIGHT,
        score = 0,
        timeout,
        speed = 1;


    class Circle {
        constructor(x, y, radius, startAngle, endAngle) {
            this.x = x;
            this.y = y;
            this.startAngle = startAngle;
            this.endAngle = endAngle;
            this.radius = radius;

        }

    }
    var circle = new Circle(75, 75, 50, 0, 2 * Math.PI);

    function resizeCanvas() {
        var width = window.innerWidth - 10;
        var height = window.innerHeight - 10;

        canvas.width = width - width % BALL_SIZE;
        canvas.height = height - height % BALL_SIZE;
    }

    window.addEventListener('resize', resizeCanvas);

    resizeCanvas();

    function renderScore() {
        context.font = '48px cursive';
        if (score > 0) {
            context.fillStyle = 'white';
            context.fillText((score - 1).toString(), canvas.width - 100, 50);
        }
        context.fillStyle = 'black';
        context.fillText(score.toString(), canvas.width - 100, 50);
    }

    function gameLoop() {
        timeout = setTimeout(() => {

            switch (direction) {
                case LEFT:
                    circle.x--;
                    break;
                case UP:
                    circle.y--;
                    break;
                case RIGHT:
                    circle.x++;
                    break;
                case DOWN:
                    circle.y++;
                    break;
            }

            if (circle.x - circle.radius < 0 || circle.y - circle.radius < 0 || circle.x + circle.radius >= canvas.width || circle.y + circle.radius >= canvas.height) {
                crashSound.currentTime = 0;
                crashSound.play(); // should be a crash sound
                score++;
                switch (direction) {
                    case LEFT:
                        direction = RIGHT;
                        break;
                    case UP:
                        direction = DOWN;
                        break;
                    case RIGHT:
                        direction = LEFT;
                        break;
                    case DOWN:
                        direction = UP;
                        break;
                }


            }

            context.clearRect(circle.x - circle.radius - 2, circle.y - circle.radius - 2, circle.radius * 2 + 4, circle.radius * 2 + 4);

            context.beginPath();
            context.arc(circle.x, circle.y, circle.radius, circle.startAngle, circle.endAngle);
            context.stroke();


            renderScore();

            gameLoop();
        }, speed);
    }

    renderScore();

    window.addEventListener('keydown', function (event) {
        switch (event.keyCode) {
            case LEFT:
                if (direction !== RIGHT) {
                    direction = LEFT;
                }
                break;
            case UP:
                if (direction !== DOWN) {
                    direction = UP;
                }
                break;
            case RIGHT:
                if (direction !== LEFT) {
                    direction = RIGHT;
                }
                break;
            case DOWN:
                if (direction !== UP) {
                    direction = DOWN;
                }
                break;
        }
    });
    gameLoop();
}());