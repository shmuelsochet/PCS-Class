(function () {
    /* jshint -W104, -W119 */
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        addButton = document.getElementById("addButton"),
        context = canvas.getContext('2d'),
        ants = [];

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    class Ant {

        constructor() {
            this.x = canvas.width / 2;
            this.y = canvas.height / 2;
        }

        getRandomNumberBetween(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }


        move(color) {
            //context.clearRect(this.x - 1, this.y - 1, 4, 4);

            this.x += this.getRandomNumberBetween(-2, 2);
            this.y += this.getRandomNumberBetween(-2, 2);

            context.fillStyle = color;
            context.fillRect(this.x, this.y, 2, 2);
        }

    }

    addButton.addEventListener('click', () => {
        for (var i = 0; i < 1000; i++) {
            ants.push(new Ant());
        }

        console.log(ants);
    });

    /*var ant = new Ant();
    setInterval(() => {
        ant.move();
    }, 100);*/

    for (var i = 0; i < 10000; i++) {
        ants.push(new Ant());
    }

    console.log(ants);

    setInterval(() => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        ants.forEach((ant, index) => {
            if (index < 10000)
                ant.move('black')
            else
                ant.move('red');
        });
    }, 100);
}());