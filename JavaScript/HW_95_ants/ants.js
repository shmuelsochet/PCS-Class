(function () {
    /* jshint -W104, -W119 */
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        addButton = document.getElementById("addButton"),
        context = canvas.getContext('2d'),
        colorPicker = document.getElementById('color'),
        amountOfAnts = document.getElementById('amount'),
        ants = [],
        index = 0;

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    class Ant {

        constructor(color) {
            this.number = index++;
            this.x = canvas.width / 2;
            this.y = canvas.height / 2;
            this.yDirection = 0;
            this.xDirection = 0;
            this.timesInThisDirection = 0;
            this.color = color;
        }

        getRandomNumberBetween(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }


        move(color) {
            //context.clearRect(this.x - 1, this.y - 1, 4, 4);
            if (this.timesInThisDirection > 0) {
                this.x += this.xDirection;
                this.y += this.yDirection;

                this.timesInThisDirection--;
            }

            if (this.timesInThisDirection === 0) {

                this.timesInThisDirection = this.getRandomNumberBetween(5, 10);
                this.xDirection = this.getRandomNumberBetween(-2, 2);
                this.yDirection = this.getRandomNumberBetween(-2, 2);
                this.x += this.xDirection;
                this.y += this.yDirection;

            }

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

    for (var i = 0; i < 100; i++) {
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