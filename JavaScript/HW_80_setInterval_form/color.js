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

    // with array
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


    // with 255 colors    
    function setColor2() {

        var r = Math.floor(Math.random() * 256);
        var g = Math.floor(Math.random() * 256);
        var b = Math.floor(Math.random() * 256);

        var rgb = document.body.style.color = "rgb(" + r + "," + g + "," + b + ")";
        console.log(rgb);

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

    function setColor3() {

        var rLoop = 0;
        var gLoop = rLoop++;
        var bLoop = gLoop++;

        document.body.style.color = "rgb(" + rLoop + "," + rLoop + "," + rLoop + ")";

        var r2Loop = rLoop;
        var g2Loop = gLoop;
        var b2Loop = bLoop;

        while (rLoop === r2Loop && gLoop === g2Loop && bLoop === b2Loop) {
            r2Loop = Math.floor(Math.random() * 256);
            g2Loop = Math.floor(Math.random() * 256);
            b2Loop = Math.floor(Math.random() * 256);
        }

        document.body.style.backgroundColor = "rgb(" + r2Loop + "," + g2Loop + "," + b2Loop + ")";

    }

    // with loop
    // var r = -1;
    // var g = 0;
    // var b = 0;
    // var increment = 25;

    // setInterval(function () {
    //     r++;
    //     if (r > 255) {
    //         r = 0;
    //         //g++;
    //         // or 
    //         g += increment;
    //     }
    //     if (g > 255) {
    //         g = 0;
    //         //b++;
    //         b += increment;
    //     }
    //     if (b > 255) {
    //         b = 0;
    //         // r++;
    //     }
    //     document.body.style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")";
    //     console.log(document.body.style.backgroundColor);
    // }, 1);


}());
