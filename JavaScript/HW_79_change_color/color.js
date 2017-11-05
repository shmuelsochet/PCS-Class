(function () {
    "use strict";
    //var theButton = document.getElementById("theButton");
    //var body = document.getElementById("body");

    // you can get the dom elements once and then in the function get the value
    var backgroundPicker = document.getElementById("backgroundColor");
    var colorPicker = document.getElementById("textColor");

    //helper function for dom element
    function get(id) {
        return document.getElementById(id);
    }

    //css helper function
    function setCss(element, property, value) {

        //this won't work because you can't pass the value of property on style.property
        //it creates a property aon stye and sets it to value

        //element.style.property = value;

        //rather do this
        element.style[property] = value;
    }
    //this was originally
    // theButton.addEventListener...
    get('theButton').addEventListener('click', function () {

        // body.style.backgroundColor = colorPicker.value;
        // body.style.color = backgroundPicker.value;
        setCss(get('body'), 'color', colorPicker.value);
        setCss(document.body, 'backgroundColor', backgroundPicker.value);
    });

}());
