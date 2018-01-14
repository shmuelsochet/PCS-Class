(function () {
    /* jshint -W104, -W119 */
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        addButton = document.getElementById("addButton"),
        context = canvas.getContext('2d'),
        colorPicker = document.getElementById('color'),
        amountOfAnts = document.getElementById('amount'),
        ants = [];

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    class Ant {

        constructor(color) {
            this.x = canvas.width / 2;
            this.y = canvas.height / 2;
            this.color = color;
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
        for (var i = 0; i < amountOfAnts.value; i++) {
            ants.push(new Ant(colorPicker.value));

        }

        console.log(ants);
    });

    /*var ant = new Ant();
    setInterval(() => {
        ant.move();
    }, 100);*/

    for (var i = 0; i < 10000; i++) {
        ants.push(new Ant('black'));
    }

    console.log(ants);

    setInterval(() => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        ants.forEach(ant => {

            ant.move(ant.color);

        });
    }, 100);
}());