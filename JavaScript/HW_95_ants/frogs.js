(function () {
    /* jshint -W104, -W119 */
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        addButton = document.getElementById("addButton"),
        context = canvas.getContext('2d'),
        colorPicker = document.getElementById('color'),
        amountOfFrogs = document.getElementById('amount'),
        frogs = [],
        canvasLeft = canvas.offsetLeft,
        canvasTop = canvas.offsetTop,
        index = 0,
        first = 1;

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    class frog {

        constructor(color) {
            // if (first === 1) {
            this.first = 1;
            //}

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

                this.timesInThisDirection = this.getRandomNumberBetween(5, 10);

                this.xDirection = this.getRandomNumberBetween(-2, 2);

                this.yDirection = this.getRandomNumberBetween(-2, 2);

                this.x += this.xDirection * 2;
                this.y += this.yDirection * 2;
            }
            else {
                this.x += this.xDirection * 2;
                this.y += this.yDirection * 2;

                this.timesInThisDirection--;
            }

            // if (this.first === 1) {
            //     context.fillRect(this.x, this.y, 30, 30);
            //     first++;
            // }
            //  else {
            context.fillRect(this.x, this.y, 8, 8);
            // }
            context.fillStyle = color;
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



        }

    }

    canvas.addEventListener('click', function (event) {
        //use this to have event on frog but not working yet.
        // var x = event.pageX - canvasLeft,
        //     y = event.pageY - canvasTop;

        // frogs.forEach(function (element) {
        //     if (y > element.y - 2 && y < element.y + 15 &&
        //         x > element.x - 2 && x < element.x + 15) {

        for (var i = 0; i < 100; i++) {

            frogs.push(new frog(colorPicker.value));

        }
        // }
        // });
    });

    addButton.addEventListener('click', () => {
        for (var i = 0; i < amountOfFrogs.value; i++) {
            frogs.push(new frog(colorPicker.value));

        }

        console.log(frogs);
    });

    for (var i = 0; i < 1; i++) {
        frogs.push(new frog('green'));
    }

    console.log(frogs);

    setInterval(() => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        frogs.forEach(frog => {

            frog.move(frog.color);

        });
    }, 100);
}());