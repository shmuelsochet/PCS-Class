(function () {
    "use strict";

    var startString = 'Start';
    var stopString = 'Stop';
    var resetButton = createElement('button');
    var startStopButton = createElement('button');
    var startTime;
    var elapsedSec = 0;
    var elapsedMin = 0;
    var elapsedHr = 0;
    var elapsedMilli = 0;
    var intervalId;
    var timerStarted = false;
    var containerDiv = createElement('div');
    var jumboTronDiv = createElement('div');
    var h1Title = createElement('h1');
    var buttonDiv = createElement('div');
    var h1StartTime = createElement('h1');
    var h2Time = createElement('h2');

    startStopButton.id = 'startStopButton';
    startStopButton.className = 'btn btn-success';
    startStopButton.innerHTML = startString;

    resetButton.id = 'resetButton';
    resetButton.className = 'btn btn-primary';
    resetButton.innerHTML = 'Reset';

    //var elapsedTimeInMilliSec;

    containerDiv.className = 'container';
    jumboTronDiv.className = 'jumbotron';
    h1Title.className = 'text-center';
    buttonDiv.className = 'container';
    h1StartTime.className = 'text-center';
    h2Time.className = 'text-center';

    h1Title.innerHTML = 'StopWatch';
    h2Time.innerHTML = "Time: " + elapsedHr + ":" + elapsedMin + ":" + elapsedSec +
        ":" + elapsedMilli;

    document.body.appendChild(containerDiv);
    containerDiv.appendChild(jumboTronDiv);
    jumboTronDiv.appendChild(h1Title);
    containerDiv.appendChild(buttonDiv);
    buttonDiv.appendChild(startStopButton);
    buttonDiv.appendChild(resetButton);
    buttonDiv.appendChild(h1StartTime);
    buttonDiv.appendChild(h2Time);


    function createElement(type) {
        return document.createElement(type);
    }

    function reset() {
        clearInterval(intervalId);
        elapsedSec = 0;
        elapsedMin = 0;
        elapsedHr = 0;
        elapsedMilli = 0;
        startStopButton.innerHTML = startString;
        h1StartTime.innerHTML = '';
        h2Time.innerHTML = '';
        startStopButton.className = 'btn btn-success';
        timerStarted = false;

    }

    function writeTimeToScreen() {

        elapsedMilli++;
        if (elapsedMilli === 100) {
            elapsedSec++;
            elapsedMilli = 0;
        }
        if (elapsedSec === 60) {
            elapsedMin++;
            elapsedSec = 0;
        }
        if (elapsedMin === 60) {
            elapsedHr++;
            elapsedMin = 0;
        }
        h2Time.innerHTML = "Time: " + elapsedHr + ":" + elapsedMin + ":" + elapsedSec +
            ":" + elapsedMilli;

    }

    function startStopString() {
        if (startStopButton.innerHTML === startString) {
            if (!timerStarted) {
                timerStarted = true;
                startTime = new Date();
                h1StartTime.innerHTML = "Start Time: " + startTime.getHours() + ':' + startTime.getMinutes() +
                    ':' + startTime.getSeconds() + ':' + startTime.getMilliseconds();
            }

            startStopButton.innerHTML = stopString;
            startStopButton.className = 'btn btn-danger';
            intervalId = setInterval(writeTimeToScreen, 10);

        } else {

            // elapsedTimeInMilliSec = new Date() - startTime;
            // elapsedMilli = elapsedTimeInMilliSec % 1000;
            // elapsedSec = Math.floor(elapsedTimeInMilliSec / 1000);
            // elapsedMin = Math.floor(elapsedSec / 60);
            // elapsedHr = Math.floor(elapsedMin / 60);
            clearInterval(intervalId);

            startStopButton.innerHTML = startString;
            startStopButton.className = 'btn btn-success';

        }
    }

    startStopButton.addEventListener('click', startStopString);
    resetButton.addEventListener('click', reset);

}());