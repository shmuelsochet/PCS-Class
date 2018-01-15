(function () {
    /* jshint -W104, -W119 */
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        addButton = document.getElementById("addButton"),
        context = canvas.getContext('2d'),
        colorPicker = document.getElementById('color'),
        amountOfAnts = document.getElementById('amount'),
        ants = [],
        canvasLeft = canvas.offsetLeft,
        canvasTop = canvas.offsetTop,
        index = 0
        //yOverBoard = 0 || canvas.
        ;

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

            if (this.timesInThisDirection === 0) {

                //this.timesInThisDirection = this.getRandomNumberBetween(5, 10);

                this.xDirection = this.getRandomNumberBetween(-2, 2);

                this.yDirection = this.getRandomNumberBetween(-2, 2);

                this.x += this.xDirection * 10;
                this.y += this.yDirection * 10;
            }
            else {
                this.x += this.xDirection * 10;
                this.y += this.yDirection * 10;

                this.timesInThisDirection--;
            }

            context.fillStyle = 'green';
            context.fillRect(this.x - 1, this.y - 1, 2, 2);
            context.fillRect(this.x + 7, this.y - 1, 2, 2);

            context.fillRect(this.x, this.y + 7, 2, 2);
            context.fillRect(this.x, this.y + 8, 2, 2);
            context.fillRect(this.x, this.y + 9, 2, 2);
            context.fillRect(this.x, this.y + 10, 2, 2);
            context.fillRect(this.x - 1, this.y + 11, 2, 2);

            context.fillRect(this.x + 6, this.y + 7, 2, 2);
            context.fillRect(this.x + 6, this.y + 8, 2, 2);
            context.fillRect(this.x + 6, this.y + 9, 2, 2);
            context.fillRect(this.x + 6, this.y + 10, 2, 2);
            context.fillRect(this.x + 7, this.y + 11, 2, 2);

            context.fillRect(this.x, this.y, 8, 8);

        }

    }

    canvas.addEventListener('click', function (event) {
        var x = event.pageX - canvasLeft,
            y = event.pageY - canvasTop;

        // ants.forEach(function (element) {
        //if (y > element.y && y < element.y + 8 &&
        // x > element.x && x < element.x + 8) {
        for (var i = 0; i < 100; i++) {

            ants.push(new Ant(colorPicker.value));

        }
        // }
        //   });
    });

    addButton.addEventListener('click', () => {
        for (var i = 0; i < amountOfAnts.value; i++) {
            ants.push(new Ant(colorPicker.value));

        }

        console.log(ants);
    });

    for (var i = 0; i < 1; i++) {
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