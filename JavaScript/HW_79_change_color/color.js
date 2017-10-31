(function () {
    "use strict";
    var theButton = document.getElementById("theButton");
    var body = document.getElementById("body");

    theButton.addEventListener('click', function () {

        var backgroundColor = document.getElementById("backgroundColor").value;
        var textColor = document.getElementById("textColor").value;
        body.style.backgroundColor = backgroundColor;
        body.style.color = textColor;
    });

}());
