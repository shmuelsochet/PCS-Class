(function () {
    /* jshint -W098*/
    "use strict";

    var startString = 'Start';
    var stopString = 'Stop';
    var intervalId;

    var startStopButton = document.getElementById("startStopButton");
    startStopButton.innerHTML = startString;

    startStopButton.addEventListener('click', function () {

        if (startStopButton.innerHTML === startString) {
            intervalId = setInterval(setColor2, 1000);
            startStopButton.innerHTML = stopString;

        } else {
            clearInterval(intervalId);
            startStopButton.innerHTML = startString;

        }
    });

    function setColor() {
        var array = [
            'blue',
            'black',
            'red',
            'green',
            'yellow',
            'brown',
            'purple',
            'orange'
        ];

        var colorNum = Math.round(Math.random() * 8);
        document.body.style.color = array[colorNum];

        var bgColorNum;
        do {
            bgColorNum = Math.round(Math.random() * 8);
        }
        while (bgColorNum === colorNum);
        //or this
        // {
        //     bgColorNum = Math.floor(Math.random() * 8);
        //     if (bgColorNum !== colorNum) {
        //         break;
        //     }
        // }

        document.body.style.backgroundColor = array[bgColorNum];

    }

    function setColor2() {

        var r = Math.floor(Math.random() * 256);
        var g = Math.floor(Math.random() * 256);
        var b = Math.floor(Math.random() * 256);
        document.body.style.color = "rgb(" + r + "," + g + "," + b + ")";

        var r2 = r;
        var g2 = g;
        var b2 = b;

        while (r === r2 && g === g2 && b === b2) {
            r2 = Math.floor(Math.random() * 256);
            g2 = Math.floor(Math.random() * 256);
            b2 = Math.floor(Math.random() * 256);
        }

        document.body.style.backgroundColor = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

    }



    //tried with looping colors couldn't get it to work, will go back later
    // colors();

    // function colors() {


    //     for (let i = 0; i < 10; i++) {
    //         for (let j = 0; j < 10; j++) {
    //             for (let k = 0; k < 10; k++) {
    //                 var id = setInterval(function () {
    //                     var r = 0;
    //                     var g = 0;
    //                     var b = 0;
    //                     var colors = '';

    //                     var r2 = 0;
    //                     var g2 = 0;
    //                     var b2 = 0;
    //                     var colors2 = '';
    //                     r = i;
    //                     g = j;
    //                     b = k;


}());
